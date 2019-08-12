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

    <div class="table-responsive">
        <table class="table table-sm table-striped">
            <thead>
                <tr>
                    <th>{{ __('ID') }}</th>
                    <th>{{ __('Student ID') }}</th>
                    <th>{{ __('Name') }}</th>
                    <th>
                        {{ __('Email 1') }}
                        /
                        {{ __('Phone 1') }}
                    </th>
                    <th>{{ __('Period') }}</th>
                    <th>
                        {{ __('Programme') }}
                        /
                        {{ __('Specialisation') }}
                    </th>
                    <th>{{ __('Action') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $student)
                    <tr>
                        <td><a href="{{ route('admin.students.show', $student->id) }}">{{ $student->id }}</a></td>
                        <td>{{ $student->code }}</td>
                        <td>{{ $student->name }}</td>
                        <td>
                            <a href="mailto:{{ $student->contact_email1 }}">{{ $student->contact_email1 }}</a><br />
                            <a href="tel:{{ $student->contact_phone1 }}">{{ $student->contact_phone1 }}</a>
                        </td>
                        <td>{{ $student->formatted_enrollment_period }}</td>
                        <td>
                            <span title="{{ $student->programme->name }}">{{ $student->programme->code }}</span>
                            /
                            <span title="{{ $student->specialisation->name }}">{{ $student->specialisation->code }}</span>
                        </td>
                        <td>
                            <a href="{{ route('admin.students.edit', ['id' => $student->id]) }}" class="btn btn-primary">{{ __('Edit') }}</a>
                            &nbsp;
                            @component('components.button-delete')
                                @slot('route', 'admin.students.destroy')
                                @slot('id', $student->id)
                            @endcomponent
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
