@php
    $title = __('Edit Student').': '.$student->name;
@endphp
@extends('layouts.admin')
@section('content')

<div class="container">
    <h3>{{ $title }}</h3>

    <div>
	<a href="{{ route('admin.students.index') }}" class="btn btn-primary">{{ __('Back to list') }}</a>
    </div>

    {{ Form::model($student, ['route' => ['admin.students.update', $student->id], 'method' => 'PUT']) }}

    @component('admin.students._edit_form')
        @slot('student', $student)
    @endcomponent

    <div>
        {{ Form::submit(__('Update'), ['class' => 'btn btn-primary']) }}
    </div>

    {{ Form::close() }}
</div>
@endsection
