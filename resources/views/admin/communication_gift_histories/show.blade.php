@php
    $title = __('Communication Gift History');
@endphp
@extends('layouts.admin')
@section('content')
<div class="container">
    <h3>{{ $title }}</h3>

    <div>
       <a href="{{ route('admin.communicationGiftHistories.index') }}" class="btn btn-primary">{{ __('Back to list') }}</a>
    </div>

    <dl class="row">
        <dt class="col-md-2">{{ __('ID') }}</dt>
        <dd class="col-md-10">{{ $communicationGiftHistory->id }}</dd>
        <dt class="col-md-2">{{ __('Admin') }}</dt>
        <dd class="col-md-10">{{ $communicationGiftHistory->admin->name }}</dd>
        <dt class="col-md-2">{{ __('Company Staff') }}</dt>
        <dd class="col-md-10">
            <a href="{{ route('admin.companyStaff.show', ['id' => $communicationGiftHistory->companyStaff->id]) }}">{{ $communicationGiftHistory->companyStaff->name }}</a>
            (<a href="{{ route('admin.companies.show', ['id' => $communicationGiftHistory->companyStaff->company->id]) }}">{{ $communicationGiftHistory->companyStaff->company->name }}</a>)
        </dd>
        <dt class="col-md-2">{{ __('Sent on') }}</dt>
        <dd class="col-md-10">{{ $communicationGiftHistory->sent_on }}</dd>
        <dt class="col-md-2">{{ __('Notes') }}</dt>
        <dd class="col-md-10">{!! nl2br(e($communicationGiftHistory->notes)) !!}</dd>
    </dl>

    <div>
        <a href="{{ route('admin.communicationGiftHistories.edit', ['id' => $communicationGiftHistory->id]) }}" class="btn btn-primary">
            {{ __('Edit') }}
        </a>
	&nbsp;
        @component('components.button-delete')
            @slot('route', 'admin.communicationGiftHistories.destroy')
            @slot('id', $communicationGiftHistory->id)
        @endcomponent
    </div>
</div>
@endsection
