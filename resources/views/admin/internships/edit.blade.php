@php
    $title = __('Edit Internship').': '.$internship->name;
@endphp
@extends('layouts.admin')
@section('content')

<div class="container">
    <h3>{{ $title }}</h3>

    <div>
	<a href="{{ route('admin.internships.index') }}" class="btn btn-primary">{{ __('Back to list') }}</a>
    </div>

    {{ Form::model($internship, ['route' => ['admin.internships.update', $internship->id], 'method' => 'PUT']) }}

    @component('admin.internships._edit_form')
        @slot('internship', $internship)
    @endcomponent

    <div>
	{{ Form::submit(__('Update'), ['class' => 'btn btn-primary']) }}
    </div>

    {{ Form::close() }}
</div>
@endsection
