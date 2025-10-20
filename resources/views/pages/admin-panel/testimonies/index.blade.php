@extends('layouts-admin.app')

@include('pages.admin-panel.testimonies.scripts.index')

@section('content')
    {{-- main content --}}
    @include('pages.admin-panel.testimonies.main')

    {{-- form content --}}
    @include('pages.admin-panel.testimonies.form')

    {{-- form view --}}
    @include('pages.admin-panel.testimonies.view')
@endsection
