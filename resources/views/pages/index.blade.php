@extends('layouts.app')

@include('pages.scripts')

@section('content')
    <div class="landing-contents">
        {{-- main contents --}}
        <div class="app-content">
            <div class="d-flex flex-column">
                {{-- contents --}}
                <section id="web-contents" class="contents d-fex flex-column px-0 pt-0">
                    <div class="container-fluid">
                        <div class="banner-container px-2 py-3">
                            <img src="{{ asset('images/banner-1.png') }}" class="img-fluid rounded h-100 w-100" alt="banner-1">
                        </div>

                        <div class="company-header gap-3 py-2">
                            <img src="{{ asset('icons/icon-default.svg') }}" class="img-fluid" width="60" height="60" alt="logo-pdu-minimized">
                            <div class="company-data">
                                <h1 class="company-name">PARAMA DATA UNIT</h1>
                                <h2 class="company-motto">COMPANY MOTTO</h2>
                            </div>
                        </div>
                    </div>

                    <div id="news-content" class="card-contents">
                        @include('components.card-content', [
                            'imgDesc'   => 'image-research',
                            'newsDesc'  => 'view our latest research journals and advancement of mudlogging technologies.',
                            'newsTitle' => 'RESEARCH AND DEVELOPMENT',
                            'imgSource' => 'images/card-contents/image-4.png'
                        ])

                        @include('components.card-content', [
                            'imgDesc'   => 'image-technologies-services',
                            'newsDesc'  => 'get to know our services details with its currently implemented technologies in mud logging activities.',
                            'newsTitle' => 'TECHNOLOGIES AND SERVICES',
                            'imgSource' => 'images/card-contents/image-3.png'
                        ])

                        @include('components.card-content', [
                            'imgDesc'   => 'image-about-company',
                            'newsDesc'  => 'we strive to lead the mud logging industry with accurate and dependable service. view our core values, visions, and missions',
                            'newsTitle' => 'OUR CORE VALUES, VISION, AND MISSION',
                            'imgSource' => 'images/card-contents/image-2.png'
                        ])

                        @include('components.card-content', [
                            'imgDesc'   => 'image-projects',
                            'newsDesc'  => 'our company has provided services to multiple regions across indonesia with diverse partners. see what our partners have said about us.',
                            'newsTitle' => 'PARTNERS AND PROJECTS',
                            'imgSource' => 'images/card-contents/image-1.png'
                        ])

                        @include('components.card-content', [
                            'imgDesc'   => 'image-activities',
                            'newsDesc'  => 'get in touch with our latest updates, discover more about our services and activities.',
                            'newsTitle' => 'NEWS AND ACTIVITIES',
                            'imgSource' => 'images/card-contents/image.png'
                        ])

                        @include('components.card-content', [
                            'imgDesc'   => 'image-clients',
                            'newsDesc'  => 'our company has provided services to multiple regions across indonesia with diverse partners. see what our partners have said about us.',
                            'newsTitle' => 'CLIENTS TESTIMONIAL',
                            'imgSource' => 'images/card-contents/image-5.png'
                        ])
                    </div>

                    @include('components.slide-button', ['target' => 'news-content'])
                </section>

                {{-- map [DESIGN NEED TO BE UPDATED] --}}
                <section id="company-map" class="contents px-0 d-none">
                    <div class="d-flex flex-column">
                        <div id="company-title">
                            <h1 class="stats-title mb-2"><b>OUR COVERAGES SPAN ACROSS THE NATION</b></h1>
                            <div class="btn-select-group">
                                <button id="btn-geothermal" class="btn btn-selection active"><i class="ti ti-crane"></i> GEOTHERMAL </button>
                                <button id="btn-oilgas" class="btn btn-selection"><i class="ti ti-route-alt-right"></i> OIL & GAS </button>
                            </div>
                            <small class="desc ms-4 mt-1"><i class="ti ti-click"></i> click to view</small>
                        </div>

                        <div id="company-geothermal" class="company-data my-4 px-2">
                            <img src="{{ asset('images/maps/map-geothermal.svg') }}" class="company-map w-100" alt="geothermal-map">
                        </div>

                        <div id="company-oilgas" class="company-data d-none my-4 px-2">
                            <img src="{{ asset('images/maps/map-oilgas.svg') }}" class="company-map w-100" alt="oilgas-map">
                        </div>
                    </div>
                </section>

                {{-- statistics --}}
                <section id="company-statistics" class="contents d-flex align-items-center">
                    <div class="d-flex flex-column w-100">
                        <h1 class="stats-title mb-4"><b>COMPANY STATISTICS</b></h1>
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-3 d-flex flex-column align-items-center">
                                @include('components.stats', [
                                    'icon'    => 'ti-rosette-discount-check',
                                    'desc'    => 'Performance Rating',
                                    'numbers' => '99%',
                                ])
                            </div>

                            <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-3 d-flex flex-column align-items-center">
                                @include('components.stats', [
                                    'icon'    => 'ti-report',
                                    'desc'    => 'L.T.I Free',
                                    'numbers' => '0',
                                ])
                            </div>

                            <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-3 d-flex flex-column align-items-center">
                                @include('components.stats', [
                                    'icon'    => 'ti-wall',
                                    'desc'    => 'Logged Wells',
                                    'numbers' => '1974',
                                ])
                            </div>

                            <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-3 d-flex flex-column align-items-center">
                                @include('components.stats', [
                                    'icon'    => 'ti-arrows-shuffle',
                                    'desc'    => 'MWD Service Provided',
                                    'numbers' => '532',
                                ])
                            </div>

                            <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-3 d-flex flex-column align-items-center">
                                @include('components.stats', [
                                    'icon'    => 'ti-clock-pause',
                                    'desc'    => 'N.P.T',
                                    'numbers' => '0',
                                ])
                            </div>

                            <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-3 d-flex flex-column align-items-center">
                                @include('components.stats', [
                                    'icon'    => 'ti-user-hexagon',
                                    'desc'    => 'Partners',
                                    'numbers' => '67',
                                ])
                            </div>

                            <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-3 d-flex flex-column align-items-center">
                                @include('components.stats', [
                                    'icon'    => 'ti-circle-percentage',
                                    'desc'    => 'Customer Return Rates',
                                    'numbers' => '89%',
                                ])
                            </div>
                        </div>
                    </div>
                </section>

                {{-- services [responsive problem!] --}}
                <section id="company-services" class="contents">
                    <div class="d-flex flex-column">
                        <h1 class="stats-title mb-2"><b>OUR SERVICES</b></h1>
                        <div class="btn-select-group">
                            <button id="btn-mudlogging" class="btn btn-selection active"><i class="ti ti-crane"></i> MUDLOGGING</button>
                            <button id="btn-mwd" class="btn btn-selection"><i class="ti ti-route-alt-right"></i> MWD DIRECTIONAL DRILLING </button>
                            <button id="btn-plt" class="btn btn-selection"><i class="ti ti-car-turbine"></i> PLT SERVICES </button>
                        </div>
                        <small class="desc ms-4 mt-1"><i class="ti ti-click"></i> click to view</small>

                        <div id="service-mudlogging" class="service-data mt-3">
                            <img src="{{ asset('images/card-services/mudlogging.png') }}" class="service-img rounded mb-4" alt="service-mudlogging-image">
                            <p class="service-desc">Our mud logging services provide detailed, real-time geological data to support safer and more efficient drilling operations. From accurate lithology descriptions to gas detection and monitoring, our experienced mudloggers deliver comprehensive reports that help identify formation tops and potential hazards. We maintain constant communication with drilling and geology teams, ensuring that decisions can be made based on up-to-date and reliable surface data.</p>

                            <div class="service-feat mt-2">
                                <div class="feat-data">
                                    <i class="ti ti-drop-circle"></i>
                                    <span class="stat-value">106</span>
                                    <span class="stat-desc">oil & gas well</span>
                                </div>

                                <div class="feat-data even">
                                    <i class="ti ti-building-lighthouse"></i>
                                    <span class="stat-value">63</span>
                                    <span class="stat-desc">geothermal well</span>
                                </div>

                                <div class="feat-data">
                                    <i class="ti ti-building-broadcast-tower"></i>
                                    <span class="stat-value">+13</span>
                                    <span class="stat-desc">sensors</span>
                                </div>

                                <div class="feat-data even">
                                    <i class="ti ti-alarm-smoke"></i>
                                    <span class="stat-value">+6</span>
                                    <span class="stat-desc">gas sensors</span>
                                </div>
                            </div>

                        </div>

                        <div id="service-mwd" class="service-data d-none mt-3">
                            <img src="{{ asset('images/card-services/mwd.png') }}" class="service-img rounded mb-4" alt="service-mudlogging-image">
                            <p class="service-desc">Our directional drilling support enhances accuracy and efficiency during complex well paths. We deliver real-time geological insights to keep your wellbore aligned with target formations. By working closely with drilling teams, we help reduce deviations and minimize non-productive time. Trust our mudlogging expertise to drive smarter, safer drilling decisions.</p>

                            <div class="service-feat mt-2">
                                <div class="feat-data">
                                    <i class="ti ti-drop-circle"></i>
                                    <span class="stat-value">40</span>
                                    <span class="stat-desc">oil & gas well</span>
                                </div>

                                <div class="feat-data even">
                                    <i class="ti ti-building-lighthouse"></i>
                                    <span class="stat-value">10</span>
                                    <span class="stat-desc">geothermal well</span>
                                </div>
                            </div>

                        </div>

                        <div id="service-plt" class="service-data d-none mt-3">
                            <img src="{{ asset('images/card-services/plt.png') }}" class="service-img rounded mb-4" alt="service-mudlogging-image">
                            <p class="service-desc">We provide expert support in interpreting Production Logging Tool (PLT) data to reveal detailed flow profiles. Our team integrates downhole data with surface mudlogging information for a full picture of well performance. This helps identify productive zones, fluid types, and potential issues. Rely on us to turn data into decisions that optimize your production.</p>
                        </div>
                    </div>
                </section>
                
                {{-- partners & testimonies --}}
                <section id="partners-testimonies" class="contents d-fex flex-column px-1">
                    <h1 class="title mb-4"><b>OUR PARTNERS & TESTIMONIES</b></h1>
                    <div id="testimonies-content" class="testimonies-scroll row flex-nowrap gap-4 mb-4">
                        @for ($i = 0; $i < 6; $i++)
                            <div class="col-12 col-sm-12 col-md-12 col-lg-7 col-xl-5 d-flex flex-column align-items-start">
                                @include('components.card-review', [
                                    'review'     => 'We’ve worked with this mudlogging company on several wells, and they’ve consistently delivered quality data. Their loggers are knowledgeable, attentive, and always willing to communicate with the rig crew. The real-time data was accurate and timely, which helped optimize our drilling decisions. We’ll definitely continue to use their services on future projects.',
                                    'reviewer'   => 'John Doe',
                                    'reviewRole' => 'Drilling Manager',
                                    'reviewIcon' => 'icons/icon-petrochina.png',
                                ])
                            </div>
                        @endfor
                    </div>

                    @include('components.slide-button', ['target' => 'testimonies-content'])

                    @include('components.slide-partners')
                </section>
            </div>
        </div>
    </div>
@endsection
