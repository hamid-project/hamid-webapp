@php
$title = __('Internship Application');

$orderKeys = [
    'internship_applications.id' => 'ID',
    'internship_applications.internship_id' => 'Internship',
    'internship_applications.student_id' => 'Student',
    'internship_applications.created_at' => 'Created At',
    'internship_applications.updated_at' => 'Updated At',
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
        <a href="{{ route('admin.internshipApplications.create') }}?internship_id={{ $internshipId }}" class="btn btn-primary">{{ __('Create') }}</a>
    </div>

    {{ Form::open(['route' => 'admin.internshipApplications.index', 'method' => 'GET']) }}
    <div id="search">
        <div class="form-row">
            <dl class="form-group col-sd-2">
                <dt>{{ Form::label('search_conditions[keywords]', __('Keywords'), ['class' => 'small']) }}:</dt>
                <dd>{{ Form::text('search_conditions[keywords]', $searchConditions['keywords'], ['class' => 'small']) }}</dt>
            </dl>
            <dl class="form-group col-sd-3">
                <dt>{{ Form::label('search_conditions[supervisor_id]', __('Supervisor'), ['class' => 'small']) }}:</dt>
                <dd>{{ Form::select('internship_id', \App\Internship::getHashForSelectForm(), $searchConditions['internship_id'], ['class' => 'small', 'placeholder' => 'Select Internship.']) }}</dd>
            </dl>
            <dl class="form-group col-sd-3">
                <dt>{{ Form::label('search_conditions[supervisor_id]', __('Supervisor'), ['class' => 'small']) }}:</dt>
                <dd>{{ Form::select('student_id', \App\Student::getHashForSelectForm(), $searchConditions['student_id'], ['class' => 'small', 'placeholder' => 'Select Student.']) }}</dd>
            </dl>
            <dl class="form-group col-sd-3">
                <dt>{{ Form::label('search_conditions[status_code_outcome_code]', __('Status'), ['class' => 'small']) }}:</dt>
                <dd>{{ Form::select('search_conditions[status_code_outcome_code]', \App\InternshipApplication::getStatusOutcomeHashForSelectForm(), $searchConditions['status_code_outcome_code'], ['class' => 'small', 'placeholder' => 'Select Status and outcome.']) }}</dd>
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

    @include('admin.internship_applications._table')

    </div>
</div>
@endsection
