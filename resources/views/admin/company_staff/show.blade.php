@php
    $title = __('CompanyStaff') . ': ' . $companyStaff->name;
@endphp
@extends('layouts.admin')
@section('content')
<div class="container">
    <h3>{{ $title }}</h3>

    <div>
        <a href="{{ route('admin.companyStaff.index') }}?company_id={{ $companyStaff->company_id }}" class="btn btn-primary">{{ __('Back to list') }}</a>
    </div>

    <h4>{{ __('Personal Information') }}</h4>
    <dl class="row">
        <dt class="col-md-2">{{ __('ID') }}</dt>
        <dd class="col-md-10">{{ $companyStaff->id }}</dd>
        <dt class="col-md-2">{{ __('Name') }}</dt>
        <dd class="col-md-10">{{ $companyStaff->full_name }}</dd>
        <dt class="col-md-2">{{ __('Belong To') }}</dt>
        <dd class="col-md-10">{{ $companyStaff->company->name }}</dd>
        <dt class="col-md-2">{{ __('Email 1') }}</dt>
        <dd class="col-md-10"><a href="mailto:{{ $companyStaff->contact_email1 }}">{{ $companyStaff->contact_email1 }}</a></dd>
        <dt class="col-md-2">{{ __('Email 2') }}</dt>
        <dd class="col-md-10"><a href="mailto:{{ $companyStaff->contact_email2 }}">{{ $companyStaff->contact_email2 }}</a></dd>
        <dt class="col-md-2">{{ __('Phone 1') }}</dt>
        <dd class="col-md-10"><a href="tel:{{ $companyStaff->contact_phone1 }}">{{ $companyStaff->contact_phone1 }}</a></dd>
        <dt class="col-md-2">{{ __('Phone 2') }}</dt>
        <dd class="col-md-10"><a href="tel:{{ $companyStaff->contact_phone2 }}">{{ $companyStaff->contact_phone2 }}</a></dd>
        <dt class="col-md-2">{{ __('Department') }}</dt>
        <dd class="col-md-10">{{ $companyStaff->department }}</dd>
        <dt class="col-md-2">{{ __('Address') }}</dt>
        <dd class="col-md-10">{{ $companyStaff->address }}</dd>
        <dt class="col-md-2">{{ __('Website') }}</dt>
        <dd class="col-md-10"><a href="{{ $companyStaff->website }}">{{ $companyStaff->website }}</a></dd>
    </dl>
    <h4>{{ __('Recent Updated') }}</h4>
    <h5>{{ __('Internships') }}</h5>
    @include('admin.internships._table')
    <div class="text-right">
	<a href="{{ route('admin.internships.index') }}?company_staff_id={{ $companyStaff->id }}">[more...]</a>
    </div>

    <h5>{{ __('Contacts') }}</h5>
    @include('admin.communication_contact_histories._table')
    <div class="text-right">
	<a href="{{ route('admin.communicationContactHistories.index') }}?company_staff_id={{ $companyStaff->id }}">[more...]</a>
    </div>

    <h5>{{ __('Gifts') }}</h5>
    @include('admin.communication_gift_histories._table')
    <div class="text-right">
	<a href="{{ route('admin.communicationGiftHistories.index') }}?company_staff_id={{ $companyStaff->id }}">[more...]</a>
    </div>

    <div>
        <a href="{{ route('admin.companyStaff.edit', $companyStaff->id) }}" class="btn btn-primary">
            {{ __('Edit') }}
        </a>
	&nbsp;
        @component('components.button-delete')
            @slot('route', 'admin.companyStaff.destroy')
            @slot('id', $companyStaff->id)
        @endcomponent
    </div>
</div>
@endsection
