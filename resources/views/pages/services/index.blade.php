@extends('layouts.app')

@include('pages.services.scripts')

@push('styles')
    @vite([
        'resources/css/pages/services/index.css'
    ])
@endpush

@section('content')
    <div class="app-content px-0">
        <div class="container-fluid d-flex flex-column px-0">
            <div class="banner-container px-0" style="background-image: url('{{ url('images/service-1.jpeg') }}')">
                <img src="{{ asset('icons/icon-white.svg') }}" width="60" height="60" alt="icon-pdu-white">
                <p class="title mb-0">SERVICES</p>
                <p class="sub-title mb-0">We deliver real-time formation evaluation and drilling support through advanced mudlogging services</p>
            </div>

            <div class="menu-container">
                <div class="list-menu px-4">
                    <div id="menu-mudlogging" class="menu active"><span>mudlogging</span></div>
                    <div id="menu-mwd" class="menu"><span>mwd drilling services</span></div>
                    <div id="menu-plt" class="menu"><span>plt services</span></div>
                </div>
            </div>

            <div class="menu-content">
                {{-- muddlogging --}}
                <div id="content-mudlogging" class="content">
                    <div class="d-flex flex-column">
                        <h2 class="title">mudlogging</h2>
                        <small class="sub-title">real-time geological data and formation for a safe and efficient drilling.</small>
                    </div>

                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-7 col-xl-8 mb-4">
                            <p class="description mt-4">Our mud logging services provide detailed, real-time geological data to support safer and more efficient drilling operations. From accurate lithology descriptions to gas detection and monitoring, our experienced mudloggers deliver comprehensive reports that help identify formation tops and potential hazards. We maintain constant communication with drilling and geology teams, ensuring that decisions can be made based on up-to-date and reliable surface data.</p>

                            <div class="menu-feat">
                                <div class="feat">
                                    <i class="ti ti-drop-circle"></i>
                                    <span class="feat-value">106</span>
                                    <span class="feat-desc">oil & gas well</span>
                                </div>

                                <div class="feat even">
                                    <i class="ti ti-building-lighthouse"></i>
                                    <span class="feat-value">63</span>
                                    <span class="feat-desc">Geothermal Well</span>
                                </div>

                                <div class="feat">
                                    <i class="ti ti-building-broadcast-tower"></i>
                                    <span class="feat-value">+13</span>
                                    <span class="feat-desc">Sensors</span>
                                </div>

                                <div class="feat even">
                                    <i class="ti ti-alarm-smoke"></i>
                                    <span class="feat-value">+6</span>
                                    <span class="feat-desc">Gas Sensors</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-sm-12 col-md-5 col-xl-4 img-content">
                            <img src="{{ asset('images/mudlogging-1.jpeg') }}" class="rounded w-100 h-100" alt="service-mudlogging-image">
                        </div>
                    </div>

                </div>

                {{-- mwd --}}
                <div id="content-mwd" class="content d-none">
                    <div class="d-flex flex-column">
                        <h2 class="title">MWD DIRECTIONAL DRILLING</h2>
                        <small class="sub-title">precise wellbore guidance and real-time data support to for drilling accuracy</small>
                    </div>

                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-7 col-xl-8 mb-4">
                            <p class="description mt-4">Our directional drilling support enhances accuracy and efficiency during complex well paths. We deliver real-time geological insights to keep your wellbore aligned with target formations. By working closely with drilling teams, we help reduce deviations and minimize non-productive time. Trust our mudlogging expertise to drive smarter, safer drilling decisions.</p>

                            <div class="menu-feat">
                                <div class="feat">
                                    <i class="ti ti-drop-circle"></i>
                                    <span class="feat-value">40</span>
                                    <span class="feat-desc">oil & gas well</span>
                                </div>

                                <div class="feat even">
                                    <i class="ti ti-building-lighthouse"></i>
                                    <span class="feat-value">10</span>
                                    <span class="feat-desc">geothermal well</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-sm-12 col-md-5 col-xl-4 img-content">
                            <img src="{{ asset('images/service-2.jpeg') }}" class="rounded w-100 h-100" alt="service-mwd-image">
                        </div>
                    </div>

                </div>

                {{-- plt --}}
                <div id="content-plt" class="content d-none">
                    <div class="d-flex flex-column">
                        <h2 class="title">PLT SERVICES</h2>
                        <small class="sub-title">identify production zones and optimize well performance.</small>
                    </div>

                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-7 col-xl-8 mb-4">
                            <p class="description mt-4">We provide expert support in interpreting Production Logging Tool (PLT) data to reveal detailed flow profiles. Our team integrates down hole data with surface mud logging information for a full picture of well performance. This helps identify productive zones, fluid types, and potential issues. Rely on us to turn data into decisions that optimize your production.</p>
                        </div>

                        <div class="col-12 col-sm-12 col-md-5 col-xl-4 img-content">
                            <img src="{{ asset('images/plt-2.jpeg') }}" class="rounded w-100 h-100" alt="service-plt-image">
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
