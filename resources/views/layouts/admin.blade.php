@php
$menuMap = [
    'dashboard' => [
        'subMenu' => [
            'dashboard' => []
        ],
    ],
    'school' => [
        'subMenu' => [
            'students' => [],
            'supervisors' => [],
        ],
    ],
    'company' => [
        'subMenu' => [
            'companies' => [],
            'companyStaff' => [],
        ],
    ],
    'internship' => [
        'subMenu' => [
            'internships' => [],
            'internshipApplications' => [],
        ],
    ],
    'communication' => [
        'subMenu' => [
            'communicationContactHistories' => [],
            'communicationGiftHistories' => [],
        ],
    ],
];
$subMenuMap = [];
foreach (array_keys($menuMap) as $menuName) {
    $menuMap[$menuName]['open'] = '';
    $menuMap[$menuName]['active'] = '';
    foreach (array_keys($menuMap[$menuName]['subMenu']) as $subMenuName) {
        $menuMap[$menuName]['subMenu'][$subMenuName]['active'] = '';
        $subMenuMap[$subMenuName] = $menuName;
    }
}

$parts = explode('.', Route::currentRouteName());
switch ($parts[0]) {
case 'myaccount':
    break;

default:
    $subMenu = $parts[1];
    $menu = $subMenuMap[$subMenu] ?? $subMenuMap[$subMenu];

    $menuMap[$menu]['open'] = 'open';
    $menuMap[$menu]['active'] = 'active';
    $menuMap[$menu]['subMenu'][$subMenu]['active'] = 'active';

    break;
}

@endphp
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>{{ config('app.name', 'Internship Management System') }}</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <!-- Place favicon.ico in the root directory -->
        <link rel="stylesheet" href="{{ asset("modular-admin/css/vendor.css") }}">
        <!-- Theme initialization -->
        <link rel="stylesheet" id="theme-style" href="{{ asset("modular-admin/css/app.css") }}">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

    </head>
    <body>
        <div class="main-wrapper">
            <div class="app" id="app">
                <header class="header">
                    <div class="header-block header-block-collapse d-lg-none d-xl-none">
                        <button class="collapse-btn" id="sidebar-collapse-btn">
                            <i class="fa fa-bars"></i>
                        </button>
                    </div>
                    <div class="header-block header-block-nav">
                        <ul class="nav-profile">
                            <li class="profile dropdown">
                                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                                    <span class="name"> {{ Auth::user()->email }} </span>
                                </a>
                                <div class="dropdown-menu profile-dropdown-menu" aria-labelledby="dropdownMenu1">
                                    <a class="dropdown-item" href="{{ route('myaccount.password.edit') }}">
                                        <i class="fa fa-user icon"></i> Password </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="javascript:logout.submit()">
                                        <i class="fa fa-power-off icon"></i> Logout </a>
<form style="display:inline" id="logout" action="{{ route('logout') }}" method="post">
@csrf
</form>
                                </div>
                            </li>
                        </ul>
                    </div>
                </header>
                <aside class="sidebar">
                    <div class="sidebar-container">
                        <div class="sidebar-header">
                            <div class="brand">
                                <small><a href="{{ route('top') }}" style="color: #FFFFFF; text-decoration: none;">{{ config('app.name', 'Internship Management System') }}</a></small>
                            </div>
                        </div>
                        <nav class="menu">
                            <ul class="sidebar-menu metismenu" id="sidebar-menu">
                                <li class="{{ $menuMap['dashboard']['open'] }} {{ $menuMap['dashboard']['active'] }}">
                                    <a href="{{ route("admin.dashboard") }}">
                                        <i class="fa fa-home"></i> Dashboard
                                    </a>
                                </li>
                                <li class="{{ $menuMap['school']['open'] }} {{ $menuMap['school']['active'] }}">
                                    <a href="">
                                        <i class="fa fa-table"></i> School <i class="fa arrow"></i>
                                    </a>
                                    <ul class="sidebar-nav">
                                        <li class="{{ $menuMap['school']['subMenu']['students']['active'] }}">
                                            <a href="{{ route('admin.students.index') }}"> Student </a>
                                        </li>
                                        <li class="{{ $menuMap['school']['subMenu']['supervisors']['active'] }}">
                                            <a href="{{ route('admin.supervisors.index') }}"> Supervisor </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="{{ $menuMap['company']['open'] }} {{ $menuMap['company']['active'] }}">
                                    <a href="">
                                        <i class="fa fa-table"></i> Company <i class="fa arrow"></i>
                                    </a>
                                    <ul class="sidebar-nav">
                                        <li class="{{ $menuMap['company']['subMenu']['companies']['active'] }}">
                                            <a href="{{ route('admin.companies.index') }}"> Company </a>
                                        </li>
                                        <li class="{{ $menuMap['company']['subMenu']['companyStaff']['active'] }}">
                                            <a href="{{ route('admin.companyStaff.index') }}"> Company Staff </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="{{ $menuMap['internship']['open'] }} {{ $menuMap['internship']['active'] }}">
                                    <a href="">
                                        <i class="fa fa-table"></i> Internship <i class="fa arrow"></i>
                                    </a>
                                    <ul class="sidebar-nav">
                                        <li class="{{ $menuMap['internship']['subMenu']['internships']['active'] }}">
                                            <a href="{{ route('admin.internships.index') }}"> Internship </a>
                                        </li>
                                        <li class="{{ $menuMap['internship']['subMenu']['internshipApplications']['active'] }}">
                                            <a href="{{ route('admin.internshipApplications.index') }}"> Internship Application</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="{{ $menuMap['communication']['open'] }} {{ $menuMap['communication']['active'] }}">
                                    <a href="">
                                        <i class="fa fa-table"></i> Communication <i class="fa arrow"></i>
                                    </a>
                                    <ul class="sidebar-nav">
                                        <li class="{{ $menuMap['communication']['subMenu']['communicationContactHistories']['active'] }}">
                                            <a href="{{ route('admin.communicationContactHistories.index') }}"> Contact History </a>
                                        </li>
                                    </ul>
                                    <ul class="sidebar-nav">
                                        <li class="{{ $menuMap['communication']['subMenu']['communicationGiftHistories']['active'] }}">
                                            <a href="{{ route('admin.communicationGiftHistories.index') }}"> Gift History </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <footer class="sidebar-footer">
                        <ul class="sidebar-menu metismenu" id="customize-menu">
                            <li>
                                <ul>
                                    <li class="customize">
                                        <div class="customize-item">
                                            <div class="row customize-header">
                                                <div class="col-4">
                                                </div>
                                                <div class="col-4">
                                                    <label class="title">fixed</label>
                                                </div>
                                                <div class="col-4">
                                                    <label class="title">static</label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-4">
                                                    <label class="title">Sidebar:</label>
                                                </div>
                                                <div class="col-4">
                                                    <label>
                                                        <input class="radio" type="radio" name="sidebarPosition" value="sidebar-fixed">
                                                        <span></span>
                                                    </label>
                                                </div>
                                                <div class="col-4">
                                                    <label>
                                                        <input class="radio" type="radio" name="sidebarPosition" value="">
                                                        <span></span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-4">
                                                    <label class="title">Header:</label>
                                                </div>
                                                <div class="col-4">
                                                    <label>
                                                        <input class="radio" type="radio" name="headerPosition" value="header-fixed">
                                                        <span></span>
                                                    </label>
                                                </div>
                                                <div class="col-4">
                                                    <label>
                                                        <input class="radio" type="radio" name="headerPosition" value="">
                                                        <span></span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-4">
                                                    <label class="title">Footer:</label>
                                                </div>
                                                <div class="col-4">
                                                    <label>
                                                        <input class="radio" type="radio" name="footerPosition" value="footer-fixed">
                                                        <span></span>
                                                    </label>
                                                </div>
                                                <div class="col-4">
                                                    <label>
                                                        <input class="radio" type="radio" name="footerPosition" value="">
                                                        <span></span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="customize-item">
                                            <ul class="customize-colors">
                                                <li>
                                                    <span class="color-item color-red" data-theme="red"></span>
                                                </li>
                                                <li>
                                                    <span class="color-item color-orange" data-theme="orange"></span>
                                                </li>
                                                <li>
                                                    <span class="color-item color-green active" data-theme=""></span>
                                                </li>
                                                <li>
                                                    <span class="color-item color-seagreen" data-theme="seagreen"></span>
                                                </li>
                                                <li>
                                                    <span class="color-item color-blue" data-theme="blue"></span>
                                                </li>
                                                <li>
                                                    <span class="color-item color-purple" data-theme="purple"></span>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                </ul>
                                <a href="">
                                    <i class="fa fa-cog"></i> Customize </a>
                            </li>
                        </ul>
                    </footer>
                </aside>
                <div class="sidebar-overlay" id="sidebar-overlay"></div>
                <div class="sidebar-mobile-menu-handle" id="sidebar-mobile-menu-handle"></div>
                <div class="mobile-menu-handle"></div>
                <article class="content">
@yield('content')
                </article>
                <footer class="footer">
                    <div class="footer-block buttons">
                        <iframe class="footer-github-btn" src="https://ghbtns.com/github-btn.html?user=hamid-project&repo=hamid_webapp&type=star&count=true" frameborder="0" scrolling="0" width="140px" height="20px"></iframe>
                    </div>
                    <div class="footer-block author">
                        <ul>
                            <li>created by <a href="https://github.com/hamid-project">HAMID Project</a>
                            </li>
                        </ul>
                    </div>
                </footer>
                <div class="modal fade" id="modal-media">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Media Library</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    <span class="sr-only">Close</span>
                                </button>
                            </div>
                            <div class="modal-body modal-tab-container">
                                <ul class="nav nav-tabs modal-tabs" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link" href="#gallery" data-toggle="tab" role="tab">Gallery</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link active" href="#upload" data-toggle="tab" role="tab">Upload</a>
                                    </li>
                                </ul>
                                <div class="tab-content modal-tab-content">
                                    <div class="tab-pane fade" id="gallery" role="tabpanel">
                                        <div class="images-container">
                                            <div class="row">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade active in" id="upload" role="tabpanel">
                                        <div class="upload-container">
                                            <div id="dropzone">
                                                <form action="/" method="POST" enctype="multipart/form-data" class="dropzone needsclick dz-clickable" id="demo-upload">
                                                    <div class="dz-message-block">
                                                        <div class="dz-message needsclick"> Drop files here or click to upload. </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Insert Selected</button>
                            </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->
                <div class="modal fade" id="confirm-modal">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title"><i class="fa fa-warning"></i> Alert</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p>Are you sure want to do this?</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" data-dismiss="modal">Yes</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                            </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->
            </div>
        </div>
        <!-- Reference block for JS -->
        <div class="ref" id="ref">
            <div class="color-primary"></div>
            <div class="chart">
                <div class="color-primary"></div>
                <div class="color-secondary"></div>
            </div>
        </div>
        <script src="{{ asset("modular-admin/js/vendor.js") }}"></script>
        <script src="{{ asset("modular-admin/js/app.js") }}"></script>
    </body>
</html>
