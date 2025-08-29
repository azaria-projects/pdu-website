@extends('layouts.app')

@include('pages.company.scripts')

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
                    <div class="d-flex flex-column align-items-center mb-4" style="padding: 0px 64px;">
                        <h2 class="title ">PARAMA DATA UNIT (PDU)</h2>
                        <small class="sub-title">lorem ipsum lorem ipsum lorem ipsum lorem ipsum.</small>
                        <p class="description text-center mt-4">Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem IpsumLorem Ipsum Lorem Ipsum Lorem Ipsum.  Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem IpsumLorem Ipsum Lorem Ipsum Lorem Ipsum. Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem IpsumLorem Ipsum Lorem Ipsum Lorem Ipsum. Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem IpsumLorem Ipsum Lorem Ipsum Lorem Ipsum.</p>
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

                        <p class="text-center mt-4">Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem IpsumLorem Ipsum Lorem Ipsum Lorem Ipsum.  Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem IpsumLorem Ipsum Lorem Ipsum Lorem Ipsum. Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem IpsumLorem Ipsum Lorem Ipsum Lorem Ipsum. Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem IpsumLorem Ipsum Lorem Ipsum Lorem Ipsum. </p>
                        <q class="text-center"><b>Lorem Ipsum Lorem Ipsum Lorem IpsumLorem Ipsum Lorem Ipsum Lorem Ipsum.</b></q>
                    </div>
                    <img src="{{ asset('images/company-2.jpeg') }}" class="w-100" style="object-fit: cover;" height="450" alt="image-career-pdu">
                </div>
            </div>
        </div>
    </div>
@endsection
