@extends('layouts.app')

@section('content')
    <div class="landing-contents">
        {{-- banners --}}
        <div class="app-content-header pb-0">
            <div class="container-fluid">
                <div class="banner-container px-2 py-3">
                    <img src="{{ asset('images/banner-1.png') }}" class="img-fluid rounded h-100 w-100" alt="banner-1">
                </div>

                <div class="d-flex justify-content-center align-items-center gap-3 py-2">
                    <img src="{{ asset('icons/icon-default.svg') }}" class="img-fluid" width="60" height="60" alt="logo-pdu-minimized">
                    <div class="d-flex flex-column justify-content-center">
                        <h1 class="company-name">PARAMA DATA UNIT</h1>
                        <h2 class="company-motto">COMPANY MOTTO</h2>
                    </div>
                </div>
            </div>
        </div>

        {{-- main contents --}}
        <div class="app-content">
            <div class="container-fluid d-flex flex-column">
                {{-- contents --}}
                <div id="web-contents" class="contents px-0">
                    <div class="card-contents">
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

                    @include('components.slide-button')
                </div>

                {{-- statistics --}}
                <div id="company-statistics" class="contents row">
                    <div class="d-flex flex-column">
                        <h1 class="stats-title mb-4"><b>COMPANY STATISTICS</b></h1>
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-3 shaded d-flex flex-column align-items-center">
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

                            <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-3 shaded d-flex flex-column align-items-center">
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

                            {{-- ---- --}}

                            <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-3 d-flex flex-column align-items-center">
                                @include('components.stats', [
                                    'icon'    => 'ti-clock-pause',
                                    'desc'    => 'N.P.T',
                                    'numbers' => '0',
                                ])
                            </div>

                            <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-3 shaded d-flex flex-column align-items-center">
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
                </div>
                
                {{-- partners & testimonies --}}
                <div id="partners-testimonies" class="contents row px-0">
                    <div class="d-flex flex-column">
                        <h1 class="title mb-4"><b>OUR PARTNERS & TESTIMONIES</b></h1>
                        <div class="testimonies-scroll row flex-nowrap gap-4 mb-4">
                            @for ($i = 0; $i < 6; $i++)
                                <div class="col-12 col-sm-12 col-md-6 col-lg-5 d-flex flex-column align-items-start">
                                    @include('components.card-review', [
                                        'review'     => 'We’ve worked with this mudlogging company on several wells, and they’ve consistently delivered quality data. Their loggers are knowledgeable, attentive, and always willing to communicate with the rig crew. The real-time data was accurate and timely, which helped optimize our drilling decisions. We’ll definitely continue to use their services on future projects.',
                                        'reviewer'   => 'John Doe',
                                        'reviewRole' => 'Drilling Manager',
                                        'reviewIcon' => 'icons/icon-petrochina.png',
                                    ])
                                </div>
                            @endfor
                        </div>

                        @include('components.slide-button')

                        @include('components.slide-partners')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
