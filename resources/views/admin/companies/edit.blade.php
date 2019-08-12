@php
$title = __('Edit Company').': '.$company->name;
@endphp
@extends('layouts.admin')
@section('content')
<div class="container">
    <h3>{{ $title }}</h3>

    <div>
	<a href="{{ route('admin.companies.index') }}" class="btn btn-primary">{{ __('Back to list') }}</a>
    </div>

    {{ Form::open(['route' => ['admin.companies.update', $company->id], 'method' => 'PUT']) }}

    @include('admin.companies._edit_form')

    <div>
	{{ Form::submit(__('Update'), ['class' => 'btn btn-primary']) }}
    </div>

    {{ Form::close() }}
</div>
@endsection

