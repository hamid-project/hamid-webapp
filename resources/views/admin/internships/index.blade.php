@php
$title = __('Internship');

$orderKeys = [
    'id' => 'ID',
    'name' => 'Name',
    'internship_begin' => 'Begin Internship',
    'internship_end' => 'End Internship',
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
        <a href="{{ route('admin.internships.create') }}?company_staff_id={{ $companyStaffId }}" class="btn btn-primary">{{ __('Create') }}</a>
    </div>

    {{ Form::open(['route' => 'admin.internships.index', 'method' => 'GET']) }}
    <div id="search">
        <div class="form-row">
            <dl class="form-group col-sd-2">
                <dt>{{ Form::label('search_conditions[keywords]', __('Keywords'), ['class' => 'small']) }}:</dt>
                <dd>{{ Form::text('search_conditions[keywords]', $searchConditions['keywords'], ['class' => 'small']) }}</dt>
            </dl>
            <dl class="form-group col-sd-2">
                <dt>{{ Form::label('search_conditions[date]', __('Date'), ['class' => 'small']) }}:</dt>
                <dd>{{ Form::date('search_conditions[date]', $searchConditions['date'], ['class' => 'small']) }}</dt>
            </dl>
            <dl class="form-group col-sd-3">
                <dt>{{ Form::label('search_conditions[supervisor_id]', __('Supervisor'), ['class' => 'small']) }}:</dt>
                <dd>{{ Form::select('search_conditions[supervisor_id]', \App\Supervisor::getHashForSelectForm(), $searchConditions['supervisor_id'], ['class' => 'small', 'placeholder' => 'Select Supervisor.']) }}</dt>
            </dl>
            <dl class="form-group col-sd-3">
                <dt>{{ Form::label('search_conditions[company_staff_id]', __('Company Staff'), ['class' => 'small']) }}:</dt>
                <dd>{{ Form::select('search_conditions[company_staff_id]', \App\CompanyStaff::getHashForSelectForm(), $searchConditions['company_staff_id'], ['class' => 'small', 'placeholder' => 'Select Company Staff.']) }}</dt>
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

    @include('admin.internships._table')

</div>
@endsection
