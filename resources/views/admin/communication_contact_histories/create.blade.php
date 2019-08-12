@php
    $title = __('Create Contact History');
@endphp
@extends('layouts.admin')
@section('content')
<div class="container">
    <h3>{{ $title }}</h3>

    <div>
        <a href="{{ route('admin.communicationContactHistories.index') }}" class="btn btn-primary">{{ __('Back to list') }}</a>
    </div>

    {{ Form::open(['route' => 'admin.communicationContactHistories.store']) }}

    @include('admin.communication_contact_histories._edit_form')

    <div>
        {{ Form::submit(__('Create'), ['class' => 'btn btn-primary']) }}
    </div>

    {{ Form::close() }}
</div>
@endsection
