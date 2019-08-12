@php
$title = __('Company Staff');

$orderKeys = [
    'id' => 'ID',
    'created_at' => 'Created at',
    'updated_at' => 'Updated at',
];
$orders = [];
foreach ($orderKeys as $baseKey => $baseLabel) {
    foreach (['asc' => '0-9/A-Z', 'desc' => '9-0/Z-A'] as $ascDescKey => $ascDescLabel) {
        $key = sprintf('%s:%s', $baseKey, $ascDescKey);
        $label = sprintf('%s [%s]', $baseLabel, $ascDescLabel);
        $orders[$key] = $label;
    }
}
@endphp
@extends('layouts.admin')
@section('content')
<div class="container-fluid">
    <h3>{{ $title }}</h3>
    <div>
        <a href="{{ route('admin.companyStaff.create') }}" class="btn btn-primary">{{ __('Create') }}</a>
    </div>

    {{ Form::open(['route' => 'admin.companyStaff.index', 'method' => 'GET']) }}
    <div id="search">
        <div class="form-row">
            <dl class="form-group col-sd-2">
                <dt>{{ Form::label('search_conditions[keywords]', __('Keywords'), ['class' => 'small']) }}:</dt>
                <dd>{{ Form::text('search_conditions[keywords]', $searchConditions['keywords'], ['class' => 'small']) }}</dt>
            </dl>
            <dl class="form-group col-sd-5">
                <dt>{{ Form::label('search_conditions[company_id]', __('Company'), ['class' => 'small']) }}:</dt>
	        {{ Form::select('company_id', \App\Company::getHashForSelectForm(), $searchConditions['company_id'], ['class' => 'small', 'placeholder' => 'Select Company.']) }}
            </dl>
            <dl class="form-group col-sd-3">
                <dt>{{ Form::label('search_conditions[order_by]', __('Order'), ['class' => 'small']) }}:</dt>
                <dd>{{ Form::select('search_conditions[order_by]', $orders, $searchConditions['order_by'], ['class' => 'small']) }}</dt>
            </dl>
            <div class="col-sd-2">
                {{ Form::submit(__('Search'), ['class' => 'btn btn-sm btn-primary small']) }}
            </div>
        </div>
    </div>
    {{ Form::close() }}

    <div class="table-responsive">
        <table class="table table-sm table-striped">
            <thead>
                <tr>
                    <th>{{ __('ID') }}</th>
                    <th>{{ __('Name') }}</th>
                    <th>{{ __('Email 1') }} / {{ __('Phone 1') }}</th>
                    <th>{{ __('Company') }}</th>
                    <th>{{ __('Department') }}</th>
                    <th>{{ __('Internships') }}</th>
                    <th>{{ __('Last Contact') }}</th>
                    <th>{{ __('Last Gift') }}</th>
                    <th>{{ __('Action') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($companyStaff as $staff)
                    <tr>
                        <td><a href="{{ route('admin.companyStaff.show', $staff->id) }}">{{ $staff->id }}</a></td>
                        <td>{{ $staff->name }}</td>
                        <td style="overflow: hidden">
                            <a href="mailto:{{ $staff->contact_email1 }}">{{ $staff->contact_email1 }}</a><br />
                            <a href="tel:{{ $staff->contact_phone1 }}">{{ $staff->contact_phone1 }}</a>
                        </td>
                        <td>
                            <a href="{{ route('admin.companies.show', ['id' => $staff->company->id]) }}">{{ $staff->company->name }}</a>
                        </td>
                        <td>{{ $staff->department }}</td>
                        <td><a href="{{ route('admin.internships.index') }}?company_staff_id={{ $staff->id }}">{{ $staff->countInternships() }}</a></td>
                        <td>
                            @if ($staff->last_contact)
                                <a href="{{ route('admin.communicationContactHistories.show', ['id' => $staff->last_contact->id]) }}">{{$staff->last_contact->sent_on }}</a>
                            @else
                                N/A
                            @endif
                        </td>
                        <td>
                            @if ($staff->last_gift)
                                <a href="{{ route('admin.communicationGiftHistories.show', ['id' => $staff->last_gift->id]) }}">{{$staff->last_gift->sent_on }}</a>
                            @else
                                N/A
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('admin.companyStaff.edit', ['id' => $staff->id]) }}" class="btn btn-primary">{{ __('Edit') }}</a>
                            &nbsp;
                            @component('components.button-delete')
                                @slot('route', 'admin.companyStaff.destroy')
                                @slot('id', $staff->id)
                            @endcomponent
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
