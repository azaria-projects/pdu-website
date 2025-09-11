@extends('layouts.app')

@include('pages.company.scripts')

@push('styles')
    @vite([
        'resources/css/pages/company/index.css'
    ])
@endpush

@section('content')
    <div class="app-content px-0">
        <div class="container-fluid d-flex flex-column px-0">
            <div class="banner-container px-0" style="background-image: url('{{ url('images/company-1.jpeg') }}')">
                <img src="{{ asset('icons/icon-white.svg') }}" width="60" height="60" alt="icon-pdu-white">
                <p class="title mb-0">COMPANY</p>
                <p class="sub-title mb-0">specializes in monitoring drilling operations and analyzing geological data to support safe and efficient well placement</p>
            </div>

            <div class="menu-container">
                <div class="list-menu px-4">
                    <div id="menu-overview" class="menu active"><span>overview</span></div>
                </div>
            </div>

            <div class="menu-content px-0 pb-0">
                <div id="content-overview" class="content">
                    <div class="content-data">
                        <h2 class="title ">PARAMA DATA UNIT (PDU)</h2>
                        <small class="sub-title">lorem ipsum lorem ipsum lorem ipsum lorem ipsum.</small>
                        <p class="description mt-4">Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem IpsumLorem Ipsum Lorem Ipsum Lorem Ipsum.  Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem IpsumLorem Ipsum Lorem Ipsum Lorem Ipsum. Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem IpsumLorem Ipsum Lorem Ipsum Lorem Ipsum. Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem IpsumLorem Ipsum Lorem Ipsum Lorem Ipsum.</p>
                        
                        <div class="row menu-feat">
                            <div class="col-12 col-sm-12 col-md-4 col-lg-3 feat">
                                <i class="ti ti-drop-circle"></i>
                                <span class="feat-value">106</span>
                                <span class="feat-desc">description</span>
                            </div>

                            <div class="col-12 col-sm-12 col-md-4 col-lg-3 feat even">
                                <i class="ti ti-drop-circle"></i>
                                <span class="feat-value">106</span>
                                <span class="feat-desc">description</span>
                            </div>

                            <div class="col-12 col-sm-12 col-md-4 col-lg-3 feat">
                                <i class="ti ti-drop-circle"></i>
                                <span class="feat-value">106</span>
                                <span class="feat-desc">description</span>
                            </div>

                            <div class="col-12 col-sm-12 col-md-4 col-lg-3 feat even">
                                <i class="ti ti-drop-circle"></i>
                                <span class="feat-value">106</span>
                                <span class="feat-desc">description</span>
                            </div>
                        </div>

                        <p class="details mt-4">Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem IpsumLorem Ipsum Lorem Ipsum Lorem Ipsum.  Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem IpsumLorem Ipsum Lorem Ipsum Lorem Ipsum. Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem IpsumLorem Ipsum Lorem Ipsum Lorem Ipsum. Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem IpsumLorem Ipsum Lorem Ipsum Lorem Ipsum. </p>
                        <q class="vision-mission"><b>Lorem Ipsum Lorem Ipsum Lorem IpsumLorem Ipsum Lorem Ipsum Lorem Ipsum.</b></q>
                    </div>

                    <div id="company-addresses">
                        <p class="address">
                            <i class="ti ti-map-2"></i>
                            <span class="address-type">Office : </span>
                            <span class="address-data">Jl. alternatif cibubur km 3.5 cibubur times square blok c1 no 19-21 Jatisampurna, Kota Bks, RT.001/RW.010, Jatikarya, Kec. Jatisampurna, Kota Bks, Jawa Barat 17435</span>
                        </p>
                        <p class="address">
                            <i class="ti ti-map-2"></i>
                            <span class="address-type">Workshop : </span>
                            <span class="address-data">Jl. Cemp. No.1, RT.002/RW.008, Jatisampurna, Kec. Jatisampurna, Kota Bks, Jawa Barat 17435</span>
                        </p>
                    </div>

                    <img src="{{ asset('images/company-2.jpeg') }}" class="w-100" style="object-fit: cover;" height="450" alt="image-career-pdu">
                </div>
            </div>
        </div>
    </div>
@endsection
