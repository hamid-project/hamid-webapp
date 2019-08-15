@php
$title = __('Students');

$orderKeys = [
    'id' => 'ID',
    'code' => 'Student ID',
    'name_first' => 'First Name',
    'name_first' => 'Last Name',
    'programme_code' => 'Programme',
    'enrollment_start_code' => 'Start Enrollment',
    'enrollment_finish_code' => 'Finish Enrollment',
    'specialisation_code' => 'Programme',
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
        <a href="{{ route('admin.students.create') }}" class="btn btn-primary">{{ __('Create') }}</a>
    </div>


    {{ Form::open(['route' => 'admin.students.index', 'method' => 'GET']) }}
    <div id="search">
        <div class="form-row">
            <dl class="form-group col-sd-2">
                <dt>{{ Form::label('search_conditions[keywords]', __('Keywords'), ['class' => 'small']) }}:</dt>
                <dd>{{ Form::text('search_conditions[keywords]', $searchConditions['keywords'], ['class' => 'small']) }}</dt>
            </dl>
            <dl class="form-group col-sd-5">
                <dt>{{ Form::label('search_conditions[programme_code]', __('Programme'), ['class' => 'small']) }}:</dt>
                <dd>{{ Form::select('search_conditions[programme_code]', \App\Student::getProgrammeHashForSelectForm(), $searchConditions['programme_code'], ['class' => 'small', 'placeholder' => 'Select Programme.',]) }}</dd>
            </dl>
            <dl class="form-group col-sd-3">
                <dt>{{ Form::label('search_conditions[specialisation_code]', __('Specialisation'), ['class' => 'small']) }}:</dt>
                <dd>{{ Form::select('search_conditions[specialisation_code]', \App\Student::getSpecialisationHashForSelectForm(), $searchConditions['specialisation_code'], ['class' => 'small', 'placeholder' => 'Select Specialisation.',]) }}</dt>
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

    @include('admin.students._table')

</div>
@endsection
