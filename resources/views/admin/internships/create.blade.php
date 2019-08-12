@php
    $title = __('Create Internship');
@endphp
@extends('layouts.admin')
@section('content')

<div class="container">
    <h3>{{ $title }}</h3>
    {{ Form::open(['route' => 'admin.internships.store']) }}
        @csrf {{-- CSRF Prodection --}}
        @method('POST')

    @component('admin.internships._edit_form')
        @slot('internship', $internship)
    @endcomponent

    <div>
        {{ Form::submit(__('Create'), ['class' => 'btn btn-primary']) }}
    </div>

    {{ Form::close() }}
</div>
@endsection
