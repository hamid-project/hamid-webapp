@php
    $title = __('Edit Company Staff').': '.$companyStaff->name;
@endphp
@extends('layouts.admin')
@section('content')
<div class="container">
    <h3>{{ $title }}</h3>

    <div>
	<a href="{{ route('admin.companyStaff.index') }}" class="btn btn-primary">{{ __('Back to list') }}</a>
    </div>

    {{ Form::model($companyStaff, ['route' => ['admin.companyStaff.update', $companyStaff->id], 'method' => 'PUT']) }}
    @method('PUT')

    @include('admin.company_staff._edit_form')

    {{ Form::submit(__('Update'), ['class' => 'btn btn-primary']) }}
    {{ Form::close() }}
</div>
@endsection
