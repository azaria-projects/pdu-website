@extends('layouts-admin.app')

@include('pages.admin-panel.statistics.scripts.index')

@section('content')
    {{-- main content --}}
    @include('pages.admin-panel.statistics.main')

    {{-- form content --}}
    @include('pages.admin-panel.statistics.form')

    {{-- form view --}}
    @include('pages.admin-panel.statistics.view')
@endsection
