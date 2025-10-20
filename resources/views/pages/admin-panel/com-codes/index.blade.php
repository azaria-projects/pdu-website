@extends('layouts-admin.app')

@include('pages.admin-panel.services.scripts.index')

@section('content')
    {{-- main content --}}
    @include('pages.admin-panel.services.main')

    {{-- form content --}}
    @include('pages.admin-panel.services.form')

    {{-- form view --}}
    @include('pages.admin-panel.services.view')
@endsection
