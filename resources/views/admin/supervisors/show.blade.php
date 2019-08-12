@php
    $title = __('Supervisor') . ': ' . $supervisor->name;
@endphp
@extends('layouts.admin')
@section('content')
<div class="container">
    <h3>{{ $title }}</h3>

    <div>
        <a href="{{ route('admin.supervisors.index') }}" class="btn btn-primary">{{ __('Back to list') }}</a>
    </div>

    <dl class="row">
        <dt class="col-md-2">{{ __('ID') }}</dt>
        <dd class="col-md-10">{{ $supervisor->id }}</dd>
        <dt class="col-md-2">{{ __('Name') }}</dt>
        <dd class="col-md-10">{{ $supervisor->name }}</dd>
        <dt class="col-md-2">{{ __('Email #1') }}</dt>
        <dd class="col-md-10"><a href="mailto:{{ $supervisor->contact_email1 }}">{{ $supervisor->contact_email1 }}</a></dd>
        <dt class="col-md-2">{{ __('Phone #1') }}</dt>
        <dd class="col-md-10"><a href="tel:{{ $supervisor->contact_phone1 }}">{{ $supervisor->contact_phone1 }}</a></dd>
        <dt class="col-md-2">{{ __('Email #2') }}</dt>
        <dd class="col-md-10"><a href="mailto:{{ $supervisor->contact_email2 }}">{{ $supervisor->contact_email2 }}</a></dd>
        <dt class="col-md-2">{{ __('Phone #2') }}</dt>
        <dd class="col-md-10"><a href="tel:{{ $supervisor->contact_phone2 }}">{{ $supervisor->contact_phone2 }}</a></dd>
    </dl>

    <div>
        <a href="{{ route('admin.supervisors.edit', ['id' => $supervisor->id]) }}" class="btn btn-primary">
            {{ __('Edit') }}
        </a>
        @component('components.button-delete')
            @slot('route', 'admin.supervisors.destroy')
            @slot('id', $supervisor->id)
        @endcomponent
    </div>

</div>
@endsection
