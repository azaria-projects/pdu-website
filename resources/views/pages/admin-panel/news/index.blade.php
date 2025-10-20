@extends('layouts-admin.app')

@include('pages.admin-panel.news.scripts.index')

@section('content')
    {{-- main content --}}
    @include('pages.admin-panel.news.main')

    {{-- form content --}}
    @include('pages.admin-panel.news.form')

    {{-- form view --}}
    @include('pages.admin-panel.news.view')
@endsection
