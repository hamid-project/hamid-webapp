@php
$title = __('Companies');

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
        <a href="{{ route('admin.companies.create') }}" class="btn btn-primary">{{ __('Create') }}</a>
    </div>

    {{ Form::open(['route' => 'admin.companies.index', 'method' => 'GET']) }}
    <div id="search">
        <div class="form-row">
            <dl class="form-group col-sd-2">
                <dt>{{ Form::label('search_conditions[keywords]', __('Keywords'), ['class' => 'small']) }}:</dt>
                <dd>{{ Form::text('search_conditions[keywords]', $searchConditions['keywords'], ['class' => 'small']) }}</dt>
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
                    <th>{{ __('Address') }}</th>
                    <th>{{ __('Website') }}</th>
                    <th>{{ __('Staff') }}</th>
                    <th>{{ __('Internships') }}</th>
                    <th>{{ __('Action') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($companies as $company)
                    <tr>
                        <td><a href="{{ route('admin.companies.show', $company->id) }}">{{ $company->id }}</a></td>
                        <td>{{ $company->name }}</td>
                        <td>{{ $company->address }}</td>
                        <td>
                            <a href="{{ $company->website }}">{{ $company->website }}</a>
                        </td>
                        <td><a href="{{ route("admin.companyStaff.index") }}?company_id={{ $company->id }}">{{ $company->countStaff() }}</a></td>
                        <td><a href="{{ route('admin.internships.index') }}?company_id={{ $company->id }}">{{ $company->countInternships() }}</a></td>
                        <td>
                            <a href="{{ route('admin.companies.edit', ['id' => $company->id]) }}" class="btn btn-primary">{{ __('Edit') }}</a>
                            &nbsp;
                            @component('components.button-delete')
                                @slot('route', 'admin.companies.destroy')
                                @slot('id', $company->id)
                            @endcomponent
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
