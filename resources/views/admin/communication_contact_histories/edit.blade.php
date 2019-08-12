@php
    $title = __('Edit Commnunication Contact History').': '.$communicationContactHistory->name;
@endphp
@extends('layouts.admin')
@section('content')
<div class="container">
    <h3>{{ $title }}</h3>

    <div>
	<a href="{{ route('admin.communicationContactHistories.index') }}" class="btn btn-primary">{{ __('Back to list') }}</a>
    </div>

    {{ Form::model($communicationContactHistory, ['route' => ['admin.communicationContactHistories.update', $communicationContactHistory->id], 'method' => 'PUT']) }}

    @include('admin.communication_contact_histories._edit_form')

    <div>
        {{ Form::submit(__('Update'), ['class' => 'btn btn-primary']) }}
    </div>

    {{ Form::close() }}
</div>
@endsection
