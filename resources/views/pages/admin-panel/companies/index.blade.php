@extends('layouts-admin.app')

@push('styles')
    @vite([
        'resources/css/pages/index.css',
        'resources/css/pages/company/index.css',
    ])
@endpush

@include('pages.admin-panel.companies.scripts.index')

@section('content')

    @include('pages.admin-panel.companies.main')

@endsection
