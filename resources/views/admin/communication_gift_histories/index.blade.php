@php
    $title = __('Communication Gift History');
@endphp
@extends('layouts.admin')
@section('content')
<div class="container-fluid">
    <h3>{{ $title }}</h3>
    <div>
        <a href="{{ route('admin.communicationGiftHistories.create') }}?company_staff_id={{ $companyStaffId }}" class="btn btn-primary">{{ __('Create') }}</a>
    </div>

    @include('admin.communication_gift_histories._table')

</div>
@endsection
