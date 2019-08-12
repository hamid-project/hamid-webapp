@php
    $title = __('Edit Commnunication Gift History').': '.$communicationGiftHistory->name;
@endphp
@extends('layouts.admin')
@section('content')
<div class="container">
    <h3>{{ $title }}</h3>

    <div>
	<a href="{{ route('admin.communicationGiftHistories.index') }}" class="btn btn-primary">{{ __('Back to list') }}</a>
    </div>

    {{ Form::model($communicationGiftHistory, ['route' => ['admin.communicationGiftHistories.update', $communicationGiftHistory->id], 'method' => 'PUT']) }}

    @include('admin.communication_gift_histories._edit_form')

    <div>
        {{ Form::submit(__('Update'), ['class' => 'btn btn-primary']) }}
    </div>

    {{ Form::close() }}
</div>
@endsection
