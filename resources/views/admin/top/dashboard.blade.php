@php
    $title = __('Dashboard');
@endphp
@extends('layouts.admin')
@section('content')
<div class="container-fluid">
    <h3>{{ $title }}</h3>

    <h4>{{ __('Internships') }}</h4>
    <div class="row">
        <div class="col-sm small">
            <h5>{{ __('Recent Updated') }}</h5>
            <table class="table table-sm table-striped">
                <thead>
                    <tr>
                        <th>{{ __('ID') }}</th>
                        <th>{{ __('Name') }}</th>
                        <th>{{ __('Position') }}</th>
                        <th>{{ __('Period') }}</th>
                        <th>{{ __('Company Staff') }}</th>
                        <th>{{ __('Open') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($internships as $internship)
                        <tr>
                            <td><a href="{{ route('admin.internships.show', $internship->id) }}">{{ $internship->id }}</a></td>
                            <td>{{ $internship->name }}</td>
                            <td>{{ $internship->position }}</td>
                            <td>{{ $internship->formatted_internship_period }}</td>
                            <td>
                                <a href="{{ route('admin.companyStaff.show', ['id' => $internship->companyStaff->id]) }}">{{ $internship->companyStaff->name }}</a>
                                (<a href="{{ route('admin.companies.show', ['id' => $internship->companyStaff->company->id]) }}">{{ $internship->companyStaff->company->name }}</a>)
                            </td>
                            <td>{{ $internship->formatted_status }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="text-right">
	        <a href="{{ route('admin.internships.index') }}">[more...]</a>
            </div>
        </div>

        <div class="col-sm small">
            <h5>{{ __('Recent Ends / End soon') }}</h5>
            <table class="table table-sm table-striped">
                <thead>
                    <tr>
                        <th>{{ __('ID') }}</th>
                        <th>{{ __('Name') }}</th>
                        <th>{{ __('Position') }}</th>
                        <th>{{ __('Period') }}</th>
                        <th>{{ __('Company Staff') }}</th>
                        <th>{{ __('Status') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($internships as $internship)
                        <tr>
                            <td><a href="{{ route('admin.internships.show', $internship->id) }}">{{ $internship->id }}</a></td>
                            <td>{{ $internship->name }}</td>
                            <td>{{ $internship->position }}</td>
                            <td>{{ $internship->formatted_internship_period }}</td>
                            <td>
                                <a href="{{ route('admin.companyStaff.show', ['id' => $internship->companyStaff->id]) }}">{{ $internship->companyStaff->name }}</a>
                                (<a href="{{ route('admin.companies.show', ['id' => $internship->companyStaff->company->id]) }}">{{ $internship->companyStaff->company->name }}</a>)
                            </td>
                            <td>{{ $internship->formatted_status }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="text-right">
	        <a href="{{ route('admin.internships.index') }}">[more...]</a>
            </div>
        </div>
    </div>

    <h4>{{ __('Students') }}</h4>
    <div class="row">
        <div class="col-sm small">
            <h5>{{ __('Recent Created') }}</h5>
            <table class="table table-sm table-striped">
                <thead>
                    <tr>
                        <th>{{ __('ID') }}</th>
                        <th>{{ __('Student ID') }}</th>
                        <th>{{ __('Name') }}</th>
                        <th>
                            {{ __('Email 1') }}
                            /
                            {{ __('Phone 1') }}
                        </th>
                        <th>{{ __('Period') }}</th>
                        <th>
                            {{ __('Programme') }}
                            /
                            {{ __('Specialisation') }}
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($recentCreatedStudents as $student)
                        <tr>
                            <td><a href="{{ route('admin.students.show', $student->id) }}">{{ $student->id }}</a></td>
                            <td>{{ $student->code }}</td>
                            <td>{{ $student->name }}</td>
                            <td>
                                <a href="mailto:{{ $student->contact_email1 }}">{{ $student->contact_email1 }}</a><br />
                                <a href="tel:{{ $student->contact_phone1 }}">{{ $student->contact_phone1 }}</a>
                            </td>
                            <td>{{ $student->formatted_enrollment_period }}</td>
                            <td>
                                <span title="{{ $student->programme->name }}">{{ $student->programme->code }}</span>
                                /
                                <span title="{{ $student->specialisation->name }}">{{ $student->specialisation->code }}</span>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="text-right">
	        <a href="{{ route('admin.students.index') }}">[more...]</a>
            </div>
        </div>

        <div class="col-sm small">
            <h5>{{ __('Recent Updated') }}</h5>
            <table class="table table-sm table-striped">
                <thead>
                    <tr>
                        <th>{{ __('ID') }}</th>
                        <th>{{ __('Student ID') }}</th>
                        <th>{{ __('Name') }}</th>
                        <th>
                            {{ __('Email 1') }}
                            /
                            {{ __('Phone 1') }}
                        </th>
                        <th>{{ __('Period') }}</th>
                        <th>
                            {{ __('Programme') }}
                            /
                            {{ __('Specialisation') }}
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($recentUpdatedStudents as $student)
                        <tr>
                            <td><a href="{{ route('admin.students.show', $student->id) }}">{{ $student->id }}</a></td>
                            <td>{{ $student->code }}</td>
                            <td>{{ $student->name }}</td>
                            <td>
                                <a href="mailto:{{ $student->contact_email1 }}">{{ $student->contact_email1 }}</a><br />
                                <a href="tel:{{ $student->contact_phone1 }}">{{ $student->contact_phone1 }}</a>
                            </td>
                            <td>{{ $student->formatted_enrollment_period }}</td>
                            <td>
                                <span title="{{ $student->programme->name }}">{{ $student->programme->code }}</span>
                                /
                                <span title="{{ $student->specialisation->name }}">{{ $student->specialisation->code }}</span>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="text-right">
	        <a href="{{ route('admin.students.index') }}">[more...]</a>
            </div>
        </div>
    </div>

    <h4>{{ __('Recent Communication') }}</h4>
    <div class="row">
        <div class="col-sm small">
            <h5>{{ __('Contacts') }}</h5>
        <table class="table table-sm table-striped">
            <thead>
                <tr>
                    <th>{{ __('ID') }}</th>
                    <th>{{ __('Admin') }}</th>
                    <th>{{ __('Company Staff') }}</th>
                    <th>{{ __('Sent on') }}</th>
                    <th>{{ __('Method') }}</th>
                    <th>{{ __('Notes') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($communicationContactHistories as $contactHistory)
                    <tr>
                        <td><a href="{{ route('admin.communicationContactHistories.show', $contactHistory->id) }}">{{ $contactHistory->id }}</a></td>
                        <td>{{ $contactHistory->admin->name }}</td>
                        <td>
                            <a href="{{ route('admin.companyStaff.show', ['id' =>  $contactHistory->companyStaff->id]) }}">{{ $contactHistory->companyStaff->name }}</a>
                            <br />
                            (<a href="{{ route('admin.companies.show', ['id' =>  $contactHistory->companyStaff->company->id]) }}">{{ $contactHistory->companyStaff->company->name }}</a>)
                        </td>
                        <td>{{ $contactHistory->formatted_sent_on }}</td>
                        <td>{{ $contactHistory->method_code }}</td>
                        <td>{{ str_limit($contactHistory->notes, 50, '...') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
            <div class="text-right">
	        <a href="{{ route('admin.communicationContactHistories.index') }}">[more...]</a>
            </div>
        </div>

        <div class="col-sm small">
            <h5>{{ __('Gifts') }}</h5>
        <table class="table table-sm table-striped">
            <thead>
                <tr>
                    <th>{{ __('ID') }}</th>
                    <th>{{ __('Admin') }}</th>
                    <th>{{ __('Company Staff') }}</th>
                    <th>{{ __('Sent on') }}</th>
                    <th>{{ __('Notes') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($communicationGiftHistories as $giftHistory)
                    <tr>
                        <td><a href="{{ route('admin.communicationGiftHistories.show', $giftHistory->id) }}">{{ $giftHistory->id }}</a></td>
                        <td>{{ $giftHistory->admin->name }}</td>
                        <td>
                            <a href="{{ route('admin.companyStaff.show', ['id' =>  $giftHistory->companyStaff->id]) }}">{{ $giftHistory->companyStaff->name }}</a>
                            <br />
                            (<a href="{{ route('admin.companies.show', ['id' =>  $giftHistory->companyStaff->company->id]) }}">{{ $giftHistory->companyStaff->company->name }}</a>)
                        </td>
                        <td>{{ $giftHistory->sent_on }}</td>
                        <td>{{ str_limit($giftHistory->notes, 50, '...') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
            <div class="text-right">
	        <a href="{{ route('admin.communicationGiftHistories.index') }}">[more...]</a>
            </div>
        </div>
    </div>


</div>
@endsection
