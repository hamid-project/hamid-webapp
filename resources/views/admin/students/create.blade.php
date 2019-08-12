@php
    $title = __('Create Student');
@endphp
@extends('layouts.admin')
@section('content')

<div class="container">
    <h3>{{ $title }}</h3>

    <div>
        <a href="{{ route('admin.students.index') }}" class="btn btn-primary">{{ __('Back to list') }}</a>
    </div>

    {{ Form::open(['route' => 'admin.students.store']) }}

    @component('admin.students._edit_form')
        @slot('student', $student)
    @endcomponent

    <div>
        {{ Form::submit(__('Create'), ['class' => 'btn btn-primary']) }}
    </div>

    {{ Form::close() }}
</div>
@endsection
