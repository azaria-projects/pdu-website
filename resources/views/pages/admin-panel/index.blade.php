@extends('layouts-admin.app')

@section('content')
    <div class="row justify-content-between align-items-center mx-0 p-4 pb-0">
        <div class="col-12">
            @include('components.admin.page-header', [
                'icon'      => 'ti-home-eco',
                'header'    => 'Admin Panel',
                'subheader' => 'menu access point',
            ])
        </div>
    </div>

    <div class="row mx-0 p-4">
        <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-3">
            <div class="small-box w-100">
                <a href="{{ route('admin.services') }}" class="inner p-4">
                    <i class="nav-icon ti ti-device-sim" style="font-size: 32px;"></i>
                    <p style="text-transform: uppercase; font-weight: 600;">Services</p>
                </a>
            </div>
        </div>

        <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-3">
            <div class="small-box w-100">
                <a href="{{ route('admin.careers') }}" class="inner p-4">
                    <i class="ti ti-car-crane" style="font-size: 32px;"></i>
                    <p style="text-transform: uppercase; font-weight: 600;">Careers</p>
                </a>
            </div>
        </div>

        <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-3">
            <div class="small-box w-100">
                <a href="{{ route('admin.files') }}" class="inner d-flex p-4">
                    <i class="ti ti-folder-open" style="font-size: 32px;"></i>
                    <p style="text-transform: uppercase; font-weight: 600;">Files</p>
                </a>
            </div>
        </div>

        <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-3">
            <div class="small-box w-100">
                <a href="{{ route('admin.news') }}" class="inner p-4">
                    <i class="ti ti-news" style="font-size: 32px;"></i>
                    <p style="text-transform: uppercase; font-weight: 600;">News</p>
                </a>
            </div>
        </div>

        <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-3">
            <div class="small-box w-100">
                <a href="{{ route('admin.statistics') }}" class="inner p-4">
                    <i class="ti ti-chart-bar-popular" style="font-size: 32px;"></i>
                    <p style="text-transform: uppercase; font-weight: 600;">Statistics</p>
                </a>
            </div>
        </div>

        <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-3">
            <div class="small-box w-100">
                <a href="{{ route('admin.testimonies') }}" class="inner p-4">
                    <i class="ti ti-cake-roll" style="font-size: 32px;"></i>
                    <p style="text-transform: uppercase; font-weight: 600;">Testimonies</p>
                </a>
            </div>
        </div>
    </div>
@endsection
