@php
    $title = __('Edit Supervisor').': '.$supervisor->name;
@endphp
@extends('layouts.admin')
@section('content')
<div class="container">
    <h3>{{ $title }}</h3>

    <a href="{{ route('admin.supervisors.index') }}" class="btn btn-primary">{{ __('Back to list') }}</a>

    {{ Form::model($supervisor, ['route' => ['admin.supervisors.update', $supervisor->id], 'method' => 'PUT']) }}

    @component('admin.supervisors._edit_form')
        @slot('supervisor', $supervisor)
    @endcomponent

    <div>
        {{ Form::submit(__('Update'), ['class' => 'btn btn-primary']) }}
    </div>

    {{ Form::close() }}

</div>
@endsection
