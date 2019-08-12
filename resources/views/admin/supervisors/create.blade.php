@php
    $title = __('Create Supervisor');
@endphp
@extends('layouts.admin')
@section('content')
<div class="container">
    <h3>{{ $title }}</h3>

    <div>
	<a href="{{ route('admin.supervisors.index') }}" class="btn btn-primary">{{ __('Back to list') }}</a>
    </div>

    {{ Form::open(['route' => 'admin.supervisors.store']) }}

    @component('admin.supervisors._edit_form')
        @slot('supervisor', $supervisor)
    @endcomponent

    <div>
        {{ Form::submit(__('Create'), ['class' => 'btn btn-primary']) }}
    </div>

    {{ Form::close() }}
</div>
@endsection
