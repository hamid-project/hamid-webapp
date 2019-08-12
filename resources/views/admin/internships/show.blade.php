@php
$title = __('Internship') . ': ' . $internship->name;
$currentMenu = 'internships';
@endphp
@extends('layouts.admin')
@section('content')
<div class="container">
    <h3>{{ $title }}</h3>

    <div>
        <a href="{{ route('admin.internships.index') }}" class="btn btn-primary">{{ __('Back to list') }}</a>
    </div>

    <dl class="row">
        <dt class="col-md-2">{{ __('ID') }}</dt>
        <dd class="col-md-10">{{ $internship->id }}</dd>
        <dt class="col-md-2">{{ __('Name') }}</dt>
        <dd class="col-md-10">{{ $internship->name }}</dd>
        <dt class="col-md-2">{{ __('Position') }}</dt>
        <dd class="col-md-10">{{ $internship->position }}</dd>
        <dt class="col-md-2">{{ __('Description') }}</dt>
        <dd class="col-md-10">{!! nl2br(e($internship->description)) !!}</dd>
        <dt class="col-md-2">{{ __('Company/Staff') }}</dt>
        <dd class="col-md-10" >
            <a href="{{ route('admin.companyStaff.show', $internship->companyStaff->id) }}">{{ $internship->companyStaff->name }}</a>
            (<a href="{{ route('admin.companyStaff.show', $internship->companyStaff->company->id) }}">{{ $internship->companyStaff->company->name }}</a>)</dd>
        <dt class="col-md-2">{{ __('Number of internships') }}</dt>
        <dd class="col-md-10" >{{ $internship->number_of_interns }}</dd>
        <dt class="col-md-2">{{ __('Period') }}</dt>
        <dd class="col-md-10">{{ $internship->formatted_internship_period }}</dd>
        <dt class="col-md-2">{{ __('Supervisor') }}</dt>
        <dd class="col-md-10">{{ $internship->supervisor->name }}</dd>
    </dl>

    <h4>{{ __('Potential Information') }}</h4>
    <dl class="row">
        <dt class="col-md-2">{{ __('Areas') }}</dt>
        <dd class="col-md-10">{{ implode(', ', $internship->potential_area_codes) }}</dd>
        <dt class="col-md-2">{{ __('Specialisations') }}</dt>
        <dd class="col-md-10">{{ implode(', ', $internship->potential_specialisation_codes) }}</dd>
        <dt class="col-md-2">{{ __('Transportations') }}</dt>
        <dd class="col-md-10">{{ implode(', ', $internship->potential_transportation_codes) }}</dd>
    </dl>

    <div>
        <a href="{{ route('admin.internships.edit', $internship->id) }}" class="btn btn-primary">
            {{ __('Edit') }}
        </a>
	&nbsp;
        @component('components.button-delete')
            @slot('route', 'admin.internships.destroy')
            @slot('id', $internship->id)
        @endcomponent
    </div>

</div>
@endsection
