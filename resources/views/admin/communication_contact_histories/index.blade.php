@php
    $title = __('Communication Contact History');
@endphp
@extends('layouts.admin')
@section('content')
<div class="container-fluid">
    <h3>{{ $title }}</h3>
    <div>
        <a href="{{ route('admin.communicationContactHistories.create') }}?company_staff_id={{ $companyStaffId }}" class="btn btn-primary">{{ __('Create') }}</a>
    </div>

    @include('admin.communication_contact_histories._table')

</div>
@endsection
