@php
    $configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Home SuperAdmin')

@section('content')
    <h4>Home SuperAdmin</h4>
    <p>For more layout options refer <a
            href="{{ config('variables.documentation') ? config('variables.documentation') . '/laravel-introduction.html' : '#' }}"
            target="_blank" rel="noopener noreferrer">documentation</a>.</p>
@endsection
