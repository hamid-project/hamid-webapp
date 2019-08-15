@php
$title = __('Change Password');
@endphp
@extends('layouts.admin')
@section('content')

<div class="container">
    <h3>{{ $title }}</h3>
    <div>
        {{ __('Password has been changed.') }}
    </div>
</div>
@endsection
