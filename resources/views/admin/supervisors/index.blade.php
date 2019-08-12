@php
    $title = __('Supervisors');
@endphp
@extends('layouts.admin')
@section('content')
<div class="container-fluid">
    <h3>{{ $title }}</h3>
    <div>
	<a href="{{ route('admin.supervisors.create') }}" class="btn btn-primary">{{ __('Create') }}</a>
    </div>


    <div class="table-responsive">
        <table class="table table-sm table-striped">
            <thead>
                <tr>
                    <th>{{ __('ID') }}</th>
                    <th>{{ __('Name') }}</th>
                    <th>{{ __('Email 1') }}</th>
                    <th>{{ __('Phone 1') }}</th>
                    <th>{{ __('Internships') }}</th>
                    <th>{{ __('Action') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($supervisors as $supervisor)
                    <tr>
                        <td><a href="{{ route('admin.supervisors.show', $supervisor->id) }}">{{ $supervisor->id }}</a></td>
                        <td>{{ $supervisor->name }}</td>
                        <td><a href="{{ $supervisor->contact_email1 }}">{{ $supervisor->contact_email1 }}</a></td>
                        <td><a href="tel:{{ $supervisor->contact_phone1 }}">{{ $supervisor->contact_phone1 }}</a></td>
                        <td>
                            <a href="{{ route('admin.internships.index') }}?supervisor_id={{ $supervisor->id }}">{{ $supervisor->countInternships() }}</a></td>
                        </td>
                        <td>
                            <a href="{{ route('admin.supervisors.edit', $supervisor->id) }}" class="btn btn-primary">{{ __('Edit') }}</a>
                            &nbsp;
                            @component('components.button-delete')
                                @slot('route', 'admin.supervisors.destroy')
                                @slot('id', $supervisor->id)
                            @endcomponent
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
