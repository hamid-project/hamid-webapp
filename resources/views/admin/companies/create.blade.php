@php
$title = __('Create Company');
@endphp
@extends('layouts.admin')
@section('content')
<div class="container">
    <h3>{{ $title }}</h3>

    <div>
	<a href="{{ route('admin.companies.index') }}" class="btn btn-primary">{{ __('Back to list') }}</a>
    </div>

    {{ Form::open(['route' => 'admin.companies.store']) }}

    @include('admin.companies._edit_form')

    <div>
        {{ Form::submit(__('Create'), ['class' => 'btn btn-primary']) }}
    </div>

    {{ Form::close() }}
</div>
@endsection

