@php
    $title = __('Company') . ': ' . $company->name;
@endphp
@extends('layouts.admin')
@section('content')
<div class="container">
    <h3>{{ $title }}</h3>

    <div>
        <a href="{{ route('admin.companies.index') }}" class="btn btn-primary">{{ __('Back to list') }}</a>
    </div>

    <dl class="row">
        <dt class="col-md-2">{{ __('ID') }}</dt>
        <dd class="col-md-10">{{ $company->id }}</dd>
        <dt class="col-md-2">{{ __('Name') }}</dt>
        <dd class="col-md-10">{{ $company->name }}</dd>
        <dt class="col-md-2">{{ __('Address') }}</dt>
        <dd class="col-md-10">{{ $company->address }}</dd>
        <dt class="col-md-2">{{ __('Website') }}</dt>
        <dd class="col-md-10">
            <a href="{{ $company->website }}">{{ $company->website }}</a>
        </dd>
        <dt class="col-md-2">{{ __('The number of staffs') }}</dt>
        <dd class="col-md-10">
            <a href="{{ route('admin.companyStaff.index') }}?company_id={{ $company->id }}">{{ $company->countStaff() }}</a>
        </dd>
        <dt class="col-md-2">{{ __('The number of internships') }}</dt>
        <dd class="col-md-10">
            <a href="{{ route('admin.internships.index') }}?company_id={{ $company->id }}">{{ $company->countInternships() }}</a>
        </dd>
    </dl>

    <div>
        <a href="{{ route('admin.companies.edit', ['id' => $company->id]) }}" class="btn btn-primary">
            {{ __('Edit') }}
        </a>
	&nbsp;
        @component('components.button-delete')
            @slot('route', 'admin.companies.destroy')
            @slot('id', $company->id)
        @endcomponent
    </div>

</div>
@endsection
