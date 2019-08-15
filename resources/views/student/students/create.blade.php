@php
$title = __('Create Student');
@endphp
@extends('layouts.app')
@section('content')
<div class="container">
    <h3>{{ $title }}</h3>

    <div>
        <a href="{{ route('top') }}" class="btn btn-primary">{{ __('Back to top') }}</a>
    </div>

    {{ Form::open(['route' => 'student.students.store', 'enctype' => 'multipart/form-data']) }}

    @component('student.students._edit_form')
        @slot('student', $student)
    @endcomponent

    <div>
        {{ Form::submit(__('Create'), ['class' => 'btn btn-primary']) }}
    </div>

    {{ Form::close() }}
</div>
@endsection
