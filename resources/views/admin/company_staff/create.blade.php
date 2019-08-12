@php
    $title = __('Create Company Staff');
@endphp
@extends('layouts.admin')
@section('content')
<div class="container">
    <h3>{{ $title }}</h3>

    <div>
	<a href="{{ route('admin.companyStaff.index') }}" class="btn btn-primary">{{ __('Back to list') }}</a>
    </div>

    {{ Form::open(['route' => 'admin.companyStaff.store']) }}

    @include('admin.company_staff._edit_form')

    <div>
	{{ Form::submit(__('Create'), ['class' => 'btn btn-primary']) }}
    </div>

    {{ Form::close() }}
</div>
@endsection
