@php
    $title = __('Create Gift History');
@endphp
@extends('layouts.admin')
@section('content')
<div class="container">
    <h3>{{ $title }}</h3>

    <div>
        <a href="{{ route('admin.communicationGiftHistories.index') }}" class="btn btn-primary">{{ __('Back to list') }}</a>
    </div>

    {{ Form::open(['route' => 'admin.communicationGiftHistories.store']) }}

    @include('admin.communication_gift_histories._edit_form')

    <div>
        {{ Form::submit(__('Create'), ['class' => 'btn btn-primary']) }}
    </div>

    {{ Form::close() }}
</div>
@endsection
