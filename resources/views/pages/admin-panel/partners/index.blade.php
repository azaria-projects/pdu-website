@extends('layouts-admin.app')

@include('pages.admin-panel.partners.scripts.index')

@section('content')
    {{-- main content --}}
    @include('pages.admin-panel.partners.main')

    {{-- form content --}}
    @include('pages.admin-panel.partners.form')

    {{-- form view --}}
    @include('pages.admin-panel.partners.view')
@endsection
