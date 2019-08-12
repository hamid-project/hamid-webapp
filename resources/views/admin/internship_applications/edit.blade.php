@php
    $title = __('Edit Internship Application').': '.$internshipApplication->name;
@endphp
@extends('layouts.admin')
@section('content')

<div class="container">
    <h3>{{ $title }}</h3>

    <div>
        <a href="{{ route('admin.internshipApplications.index') }}" class="btn btn-primary">{{ __('Back to list') }}</a>
    </div>

    {{ Form::model($internshipApplication, ['route' => ['admin.internshipApplications.update', $internshipApplication->id], 'method' => 'PUT']) }}

    @include('admin.internship_applications._edit_form')

    <div>
        {{ Form::submit(__('Update'), ['class' => 'btn btn-primary']) }}
    </div>

    {{ Form::close() }}
</div>
@endsection
