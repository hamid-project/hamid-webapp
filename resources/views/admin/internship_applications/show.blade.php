@php
    $title = __('Internship Application') . ': ' . $internshipApplication->name;
@endphp
@extends('layouts.admin')
@section('content')
<div class="container">
    <h3>{{ $title }}</h3>

    <div>
       <a href="{{ route('admin.internshipApplications.index') }}" class="btn btn-primary">{{ __('Back to list') }}</a>
    </div>

    <dl class="row">
        <dt class="col-md-2">{{ __('ID') }}</dt>
        <dd class="col-md-10">{{ $internshipApplication->id }}</dd>
        <dt class="col-md-2">{{ __('Internship') }}</dt>
        <dd class="col-md-10">
            <a href="{{ route('admin.internships.show', ['id' => $internshipApplication->internship->id]) }}">{{ $internshipApplication->internship->name }}</a>
        </dd>
        <dt class="col-md-2">{{ __('Student') }}</dt>
        <dd class="col-md-10">
            <a href="{{ route('admin.students.show', ['id' => $internshipApplication->student->id]) }}">{{ $internshipApplication->student->name }}</a>
        </dd>
        <dt class="col-md-2">{{ __('Status') }}</dt>
        <dd class="col-md-10">{{ $internshipApplication->status->name }}</dd>
        <dt class="col-md-2">{{ __('Outcome') }}</dt>
        <dd class="col-md-10">{{ $internshipApplication->outcome->name }}</a></dd>
        <dt class="col-md-2">{{ __('Notes') }}</dt>
        <dd class="col-md-10">{!! nl2br(e($internshipApplication->notes)) !!}</dd>
    </dl>

    <div>
        <a href="{{ route('admin.internshipApplications.edit', ['id' => $internshipApplication->id]) }}" class="btn btn-primary">
            {{ __('Edit') }}
        </a>
        &nbsp;
        @component('components.button-delete')
            @slot('route', 'admin.internshipApplications.destroy')
            @slot('id', $internshipApplication->id)
        @endcomponent
    </div>
</div>
@endsection
