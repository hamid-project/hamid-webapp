@php
    $title = __('Communication Contact History');
@endphp
@extends('layouts.admin')
@section('content')
<div class="container">
    <h3>{{ $title }}</h3>

    <div>
       <a href="{{ route('admin.communicationContactHistories.index') }}" class="btn btn-primary">{{ __('Back to list') }}</a>
    </div>

    <dl class="row">
        <dt class="col-md-2">{{ __('ID') }}</dt>
        <dd class="col-md-10">{{ $communicationContactHistory->id }}</dd>
        <dt class="col-md-2">{{ __('Admin') }}</dt>
        <dd class="col-md-10">{{ $communicationContactHistory->admin->name }}</dd>
        <dt class="col-md-2">{{ __('Company Staff') }}</dt>
        <dd class="col-md-10">{{ $communicationContactHistory->companyStaff->name }}</dd>
        <dt class="col-md-2">{{ __('Method') }}</dt>
        <dd class="col-md-10">{{ $communicationContactHistory->formatted_method_label }}
        <dt class="col-md-2">{{ __('Sent on') }}</dt>
        <dd class="col-md-10">{{ $communicationContactHistory->formatted_sent_on }}</dd>
        <dt class="col-md-2">{{ __('Notes') }}</dt>
        <dd class="col-md-10">{!! nl2br(e($communicationContactHistory->notes)) !!}</dd>
    </dl>

    <div>
        <a href="{{ route('admin.communicationContactHistories.edit', ['id' => $communicationContactHistory->id]) }}" class="btn btn-primary">
            {{ __('Edit') }}
        </a>
	&nbsp;
        @component('components.button-delete')
            @slot('route', 'admin.communicationContactHistories.destroy')
            @slot('id', $communicationContactHistory->id)
        @endcomponent
    </div>
</div>
@endsection
