@php
$title = __('Change Password');
@endphp
@extends('layouts.admin')
@section('content')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="container">
    <h3>{{ $title }}</h3>

    {{ Form::model($user, ['route' => ['myaccount.password.update'], 'method' => 'PUT']) }}
    <div class="row">
        <div class="col-sm">
            <div class="form-group">
                {{ Form::label('name', __('Name')) }}
                {{ Form::text('name', $user->name, ['class' => 'form-control', 'readonly' => true, 'required' => true]) }}
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm">
            <div class="form-group">
                {{ Form::label('email', __('Email')) }}
                {{ Form::text('email', $user->email, ['class' => 'form-control', 'readonly' => true, 'required' => true]) }}
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm">
            <div class="form-group">
                {{ Form::label('new_password', __('New Password')) }}
                {{ Form::password('new_password', ['class' => 'form-control', 'required' => true]) }}
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm">
            <div class="form-group">
                {{ Form::label('new_password_confirmation', __('New Password (Confirm)')) }}
                {{ Form::password('new_password_confirmation', ['class' => 'form-control', 'required' => true]) }}
            </div>
        </div>
    </div>

    <div>
        {{ Form::submit(__('Update'), ['class' => 'btn btn-primary']) }}
    </div>

    {{ Form::close() }}
</div>
@endsection
