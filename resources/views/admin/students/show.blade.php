@php
    $title = __('Student') . ': ' . $student->name;
@endphp
@extends('layouts.admin')
@section('content')
<div class="container">
    <h3>{{ $title }}</h3>

    <div>
       <a href="{{ route('admin.students.index') }}" class="btn btn-primary">{{ __('Back to list') }}</a>
    </div>

    <h4>{{ __('Personal Information') }}</h4>
    <dl class="row">
        <dt class="col-md-2">{{ __('ID') }}</dt>
        <dd class="col-md-10">{{ $student->id }}</dd>
        <dt class="col-md-2">{{ __('Student ID') }}</dt>
        <dd class="col-md-10">{{ $student->code }}</dd>
        <dt class="col-md-2">{{ __('Name') }}</dt>
        <dd class="col-md-10">{{ $student->name }}</dd>
        <dt class="col-md-2">{{ __('Email #1') }}</dt>
        <dd class="col-md-10"><a href="mailto:{{ $student->contact_email1 }}">{{ $student->contact_email1 }}</a></dd>
        <dt class="col-md-2">{{ __('Phone #1') }}</dt>
        <dd class="col-md-10"><a href="tel:{{ $student->contact_phone1 }}">{{ $student->contact_phone1 }}</a></dd>
        <dt class="col-md-2">{{ __('Email #2') }}</dt>
        <dd class="col-md-10"><a href="mailto:{{ $student->contact_email2 }}">{{ $student->contact_email2 }}</a></dd>
        <dt class="col-md-2">{{ __('Phone #2') }}</dt>
        <dd class="col-md-10"><a href="tel:{{ $student->contact_phone2 }}">{{ $student->contact_phone2 }}</a></dd>
    </dl>

    <h4>{{ __('Enrollment Information') }}</h4>
    <dl class="row">
        <dt class="col-md-2">{{ __('period') }}</dt>
        <dd class="col-md-10">{{ $student->enrollment_start->name }} - {{ $student->enrollment_finish->name }}</dd>
        <dt class="col-md-2">{{ __('Programme') }}</dt>
        <dd class="col-md-10">{{ $student->programme->name }}</dd>
        <dt class="col-md-2">{{ __('Specialisation') }}</dt>
        <dd class="col-md-10">{{ $student->specialisation->name }}</dd>
    </dl>

    <h4>{{ __('Potential Information') }}</h4>
    <dl class="row">
        <dt class="col-md-2">{{ __('Areas') }}</dt>
        <dd class="col-md-10">{{ implode(', ', $student->potential_area_codes) }}</dd>
        <dt class="col-md-2">{{ __('Specialisations') }}</dt>
        <dd class="col-md-10">{{ implode(', ', $student->potential_specialisation_codes) }}</dd>
        <dt class="col-md-2">{{ __('Transportations') }}</dt>
        <dd class="col-md-10">{{ implode(', ', $student->potential_transportation_codes) }}</dd>
    </dl>

    <h4>{{ __('Potential Internships') }}</h4>
    @include('admin.internships._table')

    <div>
        <a href="{{ route('admin.students.edit', ['id' => $student->id]) }}" class="btn btn-primary">
            {{ __('Edit') }}
        </a>
	&nbsp;
        @component('components.button-delete')
            @slot('route', 'admin.students.destroy')
            @slot('id', $student->id)
        @endcomponent
    </div>
</div>
@endsection
