@extends('layouts-admin.app')

@push('styles')
    @vite([
        'resources/css/pages/index.css',
        'resources/css/pages/careers/index.css',
    ])
@endpush

@include('pages.admin-panel.careers.scripts.index')

@section('content')

    @include('pages.admin-panel.careers.main')

@endsection
