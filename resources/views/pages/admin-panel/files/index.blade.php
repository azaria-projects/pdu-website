@extends('layouts-admin.app')

@include('pages.admin-panel.files.scripts.index')

@section('content')
    {{-- main content --}}
    @include('pages.admin-panel.files.main')

    {{-- form content --}}
    @include('pages.admin-panel.files.form')

    {{-- form view --}}
    @include('pages.admin-panel.files.view')
@endsection
