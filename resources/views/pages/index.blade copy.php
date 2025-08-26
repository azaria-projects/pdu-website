<!doctype html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>AdminLTE v4 | Dashboard</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes"/>
        <meta name="color-scheme" content="light dark"/>
        <meta name="theme-color" content="#007bff" media="(prefers-color-scheme: light)"/>
        <meta name="theme-color" content="#1a1a1a" media="(prefers-color-scheme: dark)"/>
        <meta name="title" content="AdminLTE v4 | Dashboard"/>
        <meta name="author" content="ColorlibHQ"/>
        <meta name="description" content="..."/>
        <meta name="keywords" content="..."/>
        <meta name="supported-color-schemes" content="light dark"/>

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:ital,wght@0,100..700;1,100..700&display=swap">

        <link as="style" rel="preload" href="{{ asset('themes/adminlte4/css/adminlte.min.css') }}">

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css" crossorigin="anonymous"/>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.11.0/styles/overlayscrollbars.min.css" crossorigin="anonymous"/>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/apexcharts@3.37.1/dist/apexcharts.css" integrity="sha256-4MX+61mt9NVvvuPjUWdUdyfZfxSB1/Rf9WtqRHgG5S0=" crossorigin="anonymous"/>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/jsvectormap@1.5.3/dist/css/jsvectormap.min.css" integrity="sha256-+uGLJmmTKOqBr+2E6KDYs/NRsHxSkONXFHUL0fy2O/4=" crossorigin="anonymous"/>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css" integrity="sha256-tXJfXfp6Ewt1ilPzLDtQnJV4hclT9XuaZUKyUvmyr+Q=" crossorigin="anonymous" media="print" onload="this.media='all'"/>
        
        <link rel="stylesheet" href="{{ asset('icons/tabler/tabler-icons-filled.min.css') }}">
        <link rel="stylesheet" href="{{ asset('icons/tabler/tabler-icons-outline.min.css') }}">
        <link rel="stylesheet" href="{{ asset('icons/tabler/tabler-icons.min.css') }}">

        <link rel="stylesheet" href="{{ asset('themes/adminlte4/css/adminlte.min.css') }}">

        <style>
            * {
                font-family: "IBM Plex Sans", sans-serif !important;
            }
            ::-webkit-scrollbar { 
                width: 4px;
                height: 4px;
                background: rgba(255, 255, 255, 0.05) !important;
            }

            ::-webkit-scrollbar-thumb {
                background-color: transparent;
                border-radius: 4px;
            }

            .nav-menu:hover {
                font-weight: 700 !important;
                color: #E55348 !important;
            }

            .btn-redirect {
                padding-top: 8px !important;
                padding-bottom: 8px !important;
            }

            .btn-redirect:hover {
                background-color: #EF5A2A !important;
                color: white !important; 
                border: none !important;

                font-weight: 400 !important;
            }
        </style>
    </head>

    <body class="layout-fixed sidebar-expand-lg sidebar-open">
        <div class="app-wrapper">
            <nav class="app-header navbar navbar-expand">
                <div class="container-fluid">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('index') }}" role="button">
                                <img src="{{ asset('icons/icon-company.png') }}" width="60" alt="logo-pdu">
                            </a>
                        </li>
                    </ul>
                    <ul class="navbar-nav mx-auto">
                        <li class="nav-item d-none d-md-block"><a href="#" class="nav-link nav-menu px-0" style="font-size: 14px; font-weight: 600; letter-spacing: 1px; color: #212020;">SERVICES</a></li>
                        <li class="nav-item d-none d-md-block"><a href="#" class="nav-link px-2" style="color: #EBEBEB;">|</a></li>
                        <li class="nav-item d-none d-md-block"><a href="#" class="nav-link nav-menu px-0" style="font-size: 14px; font-weight: 600; letter-spacing: 1px; color: #212020;">CAREERS</a></li>
                        <li class="nav-item d-none d-md-block"><a href="#" class="nav-link px-2" style="color: #EBEBEB;">|</a></li>
                        <li class="nav-item d-none d-md-block"><a href="#" class="nav-link nav-menu px-0" style="font-size: 14px; font-weight: 600; letter-spacing: 1px; color: #212020;">COMPANY</a></li>
                    </ul>

                    <ul class="navbar-nav">
                        <li class="nav-item d-none d-md-block"><a href="#" class="nav-link px-1" style="font-size: 1.4rem; color: #E55348;"><i class="ti ti-brand-gmail"></i></a></li>
                        <li class="nav-item d-none d-md-block"><a href="#" class="nav-link px-1" style="font-size: 1.4rem; color: #0965C1;"><i class="ti ti-brand-linkedin"></i></a></li>
                    </ul>
                </div>
            </nav>

            <main class="app-main">
                <div class="app-content-header pb-0">
                    <div class="container-fluid">
                        <div class="px-2 py-2" style="height: 350px;">
                            <img src="{{ asset('images/banner-1.png') }}" class="img-fluid rounded h-100 w-100" alt="banner-1">
                        </div>

                        <div class="d-flex justify-content-center align-items-center gap-3 py-2">
                            <img src="{{ asset('icons/icon-default.svg') }}" class="img-fluid" width="60" height="60" alt="logo-pdu-minimized">
                            <div class="d-flex flex-column justify-content-center">
                                <span class="p-0" style="font-weight: 700; font-size: 32px; letter-spacing: .5px; color: #212020;"> PARAMA DATA UNIT </span>
                                <small> COMPANY MOTTO </small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="app-content">
                    <div class="container-fluid d-flex flex-column">
                        <div id="web-contents" class="d-flex gap-4" style="padding-top: 16px; padding-bottom: 32px; overflow-x: scroll;">
                            <div class="card shadow-none border-0 mb-4" style="width: 400px; min-width: 400px !important; min-height: 500px !important; background-color: #FBFBFB;">
                                <div class="card-body rounded">
                                    <div class="d-flex flex-column h-100 align-items-end">
                                        <img src="{{ asset('images/card-contents/image-4.png') }}" class="rounded w-100 mb-3" height="200" alt="research-image">
                                        <p class="card-title w-100" style="font-weight: 700; font-size: 24px; letter-spacing: 1px;">RESEARCH AND DEVELOPMENT</p>
                                        <p class="pt-2 mb-auto" style="font-size: 16px; letter-spacing: .5px;">view our latest research journals and advancement of mudlogging technologies.</p>
                                        <button type="button" class="btn btn-outline-secondary btn-redirect d-flex align-items-top gap-1" style="color: #212020; border: 1px solid #212020; border-radius: 64px;">
                                            <i class="ti ti-ad-2" style="font-size: 24px;"></i>
                                            <span style="font-size: 16px; font-weight: 600; letter-spacing: 1px; height: fit-content !important;">LEARN MORE</span>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div class="card shadow-none border-0 mb-4" style="width: 400px; min-width: 400px !important; min-height: 500px !important; background-color: #FBFBFB;">
                                <div class="card-body rounded">
                                    <div class="d-flex flex-column h-100 align-items-end">
                                        <img src="{{ asset('images/card-contents/image-3.png') }}" class="rounded w-100 mb-3" height="200" alt="research-image">
                                        <p class="card-title w-100" style="font-weight: 700; font-size: 24px; letter-spacing: 1px;">TECHNOLOGIES AND SERVICES</p>
                                        <p class="pt-2 mb-auto" style="font-size: 16px; letter-spacing: .5px;">
                                            get to know our services details with its currently implemented technologies in mud logging activities    
                                        </p>
                                        <button type="button" class="btn btn-outline-secondary btn-redirect d-flex align-items-top gap-1" style="color: #212020; border: 1px solid #212020; border-radius: 64px;">
                                            <i class="ti ti-ad-2" style="font-size: 24px;"></i>
                                            <span style="font-size: 16px; font-weight: 600; letter-spacing: 1px; height: fit-content !important;">LEARN MORE</span>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div class="card shadow-none border-0 mb-4" style="width: 400px; min-width: 400px !important; min-height: 500px !important; background-color: #FBFBFB;">
                                <div class="card-body rounded">
                                    <div class="d-flex flex-column h-100 align-items-end">
                                        <img src="{{ asset('images/card-contents/image-2.png') }}" class="rounded w-100 mb-3" height="200" alt="research-image">
                                        <p class="card-title w-100" style="font-weight: 700; font-size: 24px; letter-spacing: 1px;">OUR CORE VALUES, VISION, AND MISSION</p>
                                        <p class="pt-2 mb-auto" style="font-size: 16px; letter-spacing: .5px;">
                                            we strive to lead the mud logging industry with accurate and dependable service. view our core values, visions, and missions
                                        </p>
                                        <button type="button" class="btn btn-outline-secondary btn-redirect d-flex align-items-top gap-1" style="color: #212020; border: 1px solid #212020; border-radius: 64px;">
                                            <i class="ti ti-ad-2" style="font-size: 24px;"></i>
                                            <span style="font-size: 16px; font-weight: 600; letter-spacing: 1px; height: fit-content !important;">LEARN MORE</span>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div class="card shadow-none border-0 mb-4" style="width: 400px; min-width: 400px !important; min-height: 500px !important; background-color: #FBFBFB;">
                                <div class="card-body rounded">
                                    <div class="d-flex flex-column h-100 align-items-end">
                                        <img src="{{ asset('images/card-contents/image-1.png') }}" class="rounded w-100 mb-3" height="200" alt="research-image">
                                        <p class="card-title w-100" style="font-weight: 700; font-size: 24px; letter-spacing: 1px;">PARTNERS AND PROJECTS</p>
                                        <p class="pt-2 mb-auto" style="font-size: 16px; letter-spacing: .5px;">
                                            our company has provided services to multiple regions across indonesia with diverse partners. see what our partners have said about us.    
                                        </p>
                                        <button type="button" class="btn btn-outline-secondary btn-redirect d-flex align-items-top gap-1" style="color: #212020; border: 1px solid #212020; border-radius: 64px;">
                                            <i class="ti ti-ad-2" style="font-size: 24px;"></i>
                                            <span style="font-size: 16px; font-weight: 600; letter-spacing: 1px; height: fit-content !important;">LEARN MORE</span>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div class="card shadow-none border-0 mb-4" style="width: 400px; min-width: 400px !important; min-height: 500px !important; background-color: #FBFBFB;">
                                <div class="card-body rounded">
                                    <div class="d-flex flex-column h-100 align-items-end">
                                        <img src="{{ asset('images/card-contents/image.png') }}" class="rounded w-100 mb-3" height="200" alt="research-image">
                                        <p class="card-title w-100" style="font-weight: 700; font-size: 24px; letter-spacing: 1px;">NEWS AND ACTIVITIES</p>
                                        <p class="pt-2 mb-auto" style="font-size: 16px; letter-spacing: .5px;">
                                            get in touch with our latest updates, discover more about our services and activities.
                                        </p>
                                        <button type="button" class="btn btn-outline-secondary btn-redirect d-flex align-items-top gap-1" style="color: #212020; border: 1px solid #212020; border-radius: 64px;">
                                            <i class="ti ti-ad-2" style="font-size: 24px;"></i>
                                            <span style="font-size: 16px; font-weight: 600; letter-spacing: 1px; height: fit-content !important;">LEARN MORE</span>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div class="card shadow-none border-0 mb-4" style="width: 400px; min-width: 400px !important; min-height: 500px !important; background-color: #FBFBFB;">
                                <div class="card-body rounded">
                                    <div class="d-flex flex-column h-100 align-items-end">
                                        <img src="{{ asset('images/card-contents/image-5.png') }}" class="rounded w-100 mb-3" height="200" alt="research-image">
                                        <p class="card-title w-100" style="font-weight: 700; font-size: 24px; letter-spacing: 1px;">CLIENTS TESTIMONIAL</p>
                                        <p class="pt-2 mb-auto" style="font-size: 16px; letter-spacing: .5px;">
                                            our company has provided services to multiple regions across indonesia with diverse partners. see what our partners have said about us.    
                                        </p>
                                        <button type="button" class="btn btn-outline-secondary btn-redirect d-flex align-items-top gap-1" style="color: #212020; border: 1px solid #212020; border-radius: 64px;">
                                            <i class="ti ti-ad-2" style="font-size: 24px;"></i>
                                            <span style="font-size: 16px; font-weight: 600; letter-spacing: 1px; height: fit-content !important;">LEARN MORE</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="company-statistics" class="row" style="padding-left: 64px; padding-right: 64px; padding-bottom: 32px">
                            <div class="d-flex flex-column">
                                <h1 class="mb-4"><b>COMPANY STATISTICS</b></h1>
                                <div class="row">
                                    <div class="col-3 d-flex flex-column align-items-center" style="background-color: #FFF7F5; padding: 64px;">
                                        <i class="ti ti-rosette-discount-check" style="font-size: 96px; color: #212020;"></i>
                                        <span class="mb-0" style="font-size: 32px; font-weight: 600;">99%</span>
                                        <span style="font-size: 16px; font-weight: 300; letter-spacing: .5px;">Performance Rating</span>
                                    </div>

                                    <div class="col-3 d-flex flex-column align-items-center" style="padding: 64px;">
                                        <i class="ti ti-rosette-discount-check" style="font-size: 96px; color: #212020;"></i>
                                        <span class="mb-0" style="font-size: 32px; font-weight: 600;">99%</span>
                                        <span style="font-size: 16px; font-weight: 300; letter-spacing: .5px;">Performance Rating</span>
                                    </div>

                                    <div class="col-3 d-flex flex-column align-items-center" style="background-color: #FFF7F5; padding: 64px;">
                                        <i class="ti ti-rosette-discount-check" style="font-size: 96px; color: #212020;"></i>
                                        <span class="mb-0" style="font-size: 32px; font-weight: 600;">99%</span>
                                        <span style="font-size: 16px; font-weight: 300; letter-spacing: .5px;">Performance Rating</span>
                                    </div>
                                    
                                    <div class="col-3 d-flex flex-column align-items-center" style="padding: 64px;">
                                        <i class="ti ti-rosette-discount-check" style="font-size: 96px; color: #212020;"></i>
                                        <span class="mb-0" style="font-size: 32px; font-weight: 600;">99%</span>
                                        <span style="font-size: 16px; font-weight: 300; letter-spacing: .5px;">Performance Rating</span>
                                    </div>

                                    <div class="col-3 d-flex flex-column align-items-center" style="padding: 64px;">
                                        <i class="ti ti-rosette-discount-check" style="font-size: 96px; color: #212020;"></i>
                                        <span class="mb-0" style="font-size: 32px; font-weight: 600;">99%</span>
                                        <span style="font-size: 16px; font-weight: 300; letter-spacing: .5px;">Performance Rating</span>
                                    </div>

                                    <div class="col-3 d-flex flex-column align-items-center" style="background-color: #FFF7F5; padding: 64px;">
                                        <i class="ti ti-rosette-discount-check" style="font-size: 96px; color: #212020;"></i>
                                        <span class="mb-0" style="font-size: 32px; font-weight: 600;">99%</span>
                                        <span style="font-size: 16px; font-weight: 300; letter-spacing: .5px;">Performance Rating</span>
                                    </div>

                                    <div class="col-3 d-flex flex-column align-items-center" style="padding: 64px;">
                                        <i class="ti ti-rosette-discount-check" style="font-size: 96px; color: #212020;"></i>
                                        <span class="mb-0" style="font-size: 32px; font-weight: 600;">99%</span>
                                        <span style="font-size: 16px; font-weight: 300; letter-spacing: .5px;">Performance Rating</span>
                                    </div>

                                    <div class="col-3 d-flex flex-column align-items-center" style="background-color: #FFF7F5; padding: 64px;">
                                        <i class="ti ti-rosette-discount-check" style="font-size: 96px; color: #212020;"></i>
                                        <span class="mb-0" style="font-size: 32px; font-weight: 600;">99%</span>
                                        <span style="font-size: 16px; font-weight: 300; letter-spacing: .5px;">Performance Rating</span>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div id="partners-testimonies" class="row" style="padding-left: 64px; padding-right: 64px; padding-bottom: 32px">
                            <div class="d-flex flex-column">
                                <h1 class="mb-4"><b>OUR PARTNERS & TESTIMONIES</b></h1>
                                <div class="row flex-nowrap gap-4" style="overflow-x: scroll;">
                                    <div class="col-5 d-flex flex-column align-items-start" style="background-color: #FCFCFC; padding: 64px;">
                                        <img src="{{ asset('icons/icon-petrochina.png') }}" class="img-fluid mb-2" width="40" alt="partner-company-icon">
                                        <h3 class="mb-0" style="font-size: 24px; font-weight: 700;">REVIEWER NAME 1</h3>
                                        <small style="font-weight: 300; font-size: 12px;">reviewer role, 2025</small>
                                        <p class="mt-3" style="font-size: 20px;">
                                            <i>
                                                “We’ve worked with this mudlogging company on several wells, and they’ve consistently delivered quality data. Their loggers are knowledgeable, attentive, and always willing to communicate with the rig crew. The real-time data was accurate and timely, which helped optimize our drilling decisions. We’ll definitely continue to use their services on future projects.”
                                            </i>
                                        </p>
                                    </div>

                                    <div class="col-5 d-flex flex-column align-items-start" style="background-color: #FCFCFC; padding: 64px;">
                                        <img src="{{ asset('icons/icon-petrochina.png') }}" class="img-fluid mb-2" width="40" alt="partner-company-icon">
                                        <h3 class="mb-0" style="font-size: 24px; font-weight: 700;">REVIEWER NAME 1</h3>
                                        <small style="font-weight: 300; font-size: 12px;">reviewer role, 2025</small>
                                        <p class="mt-3" style="font-size: 20px;">
                                            <i>
                                                “We’ve worked with this mudlogging company on several wells, and they’ve consistently delivered quality data. Their loggers are knowledgeable, attentive, and always willing to communicate with the rig crew. The real-time data was accurate and timely, which helped optimize our drilling decisions. We’ll definitely continue to use their services on future projects.”
                                            </i>
                                        </p>
                                    </div>

                                    <div class="col-5 d-flex flex-column align-items-start" style="background-color: #FCFCFC; padding: 64px;">
                                        <img src="{{ asset('icons/icon-petrochina.png') }}" class="img-fluid mb-2" width="40" alt="partner-company-icon">
                                        <h3 class="mb-0" style="font-size: 24px; font-weight: 700;">REVIEWER NAME 1</h3>
                                        <small style="font-weight: 300; font-size: 12px;">reviewer role, 2025</small>
                                        <p class="mt-3" style="font-size: 20px;">
                                            <i>
                                                “We’ve worked with this mudlogging company on several wells, and they’ve consistently delivered quality data. Their loggers are knowledgeable, attentive, and always willing to communicate with the rig crew. The real-time data was accurate and timely, which helped optimize our drilling decisions. We’ll definitely continue to use their services on future projects.”
                                            </i>
                                        </p>
                                    </div>

                                    <div class="col-5 d-flex flex-column align-items-start" style="background-color: #FCFCFC; padding: 64px;">
                                        <img src="{{ asset('icons/icon-petrochina.png') }}" class="img-fluid mb-2" width="40" alt="partner-company-icon">
                                        <h3 class="mb-0" style="font-size: 24px; font-weight: 700;">REVIEWER NAME 1</h3>
                                        <small style="font-weight: 300; font-size: 12px;">reviewer role, 2025</small>
                                        <p class="mt-3" style="font-size: 20px;">
                                            <i>
                                                “We’ve worked with this mudlogging company on several wells, and they’ve consistently delivered quality data. Their loggers are knowledgeable, attentive, and always willing to communicate with the rig crew. The real-time data was accurate and timely, which helped optimize our drilling decisions. We’ll definitely continue to use their services on future projects.”
                                            </i>
                                        </p>
                                    </div>

                                    <div class="col-5 d-flex flex-column align-items-start" style="background-color: #FCFCFC; padding: 64px;">
                                        <img src="{{ asset('icons/icon-petrochina.png') }}" class="img-fluid mb-2" width="40" alt="partner-company-icon">
                                        <h3 class="mb-0" style="font-size: 24px; font-weight: 700;">REVIEWER NAME 1</h3>
                                        <small style="font-weight: 300; font-size: 12px;">reviewer role, 2025</small>
                                        <p class="mt-3" style="font-size: 20px;">
                                            <i>
                                                “We’ve worked with this mudlogging company on several wells, and they’ve consistently delivered quality data. Their loggers are knowledgeable, attentive, and always willing to communicate with the rig crew. The real-time data was accurate and timely, which helped optimize our drilling decisions. We’ll definitely continue to use their services on future projects.”
                                            </i>
                                        </p>
                                    </div>

                                    <div class="col-5 d-flex flex-column align-items-start" style="background-color: #FCFCFC; padding: 64px;">
                                        <img src="{{ asset('icons/icon-petrochina.png') }}" class="img-fluid mb-2" width="40" alt="partner-company-icon">
                                        <h3 class="mb-0" style="font-size: 24px; font-weight: 700;">REVIEWER NAME 1</h3>
                                        <small style="font-weight: 300; font-size: 12px;">reviewer role, 2025</small>
                                        <p class="mt-3" style="font-size: 20px;">
                                            <i>
                                                “We’ve worked with this mudlogging company on several wells, and they’ve consistently delivered quality data. Their loggers are knowledgeable, attentive, and always willing to communicate with the rig crew. The real-time data was accurate and timely, which helped optimize our drilling decisions. We’ll definitely continue to use their services on future projects.”
                                            </i>
                                        </p>
                                    </div>
                                </div>
                                <div class="splide">
                                    <div class="splide__track">
                                        <ul class="splide__list">
                                            <li><img src="{{ asset('icons/icon-pertamina.png') }}" height="60" alt="partner-pertamina"></li>
                                            <li><img src="{{ asset('icons/icon-petrochina.png') }}" height="135" alt="partner-petrochina"></li>
                                            <li><img src="{{ asset('icons/icon-pertamina.png') }}" height="60" alt="partner-pertamina"></li>
                                            <li><img src="{{ asset('icons/icon-petrochina.png') }}" height="135" alt="partner-petrochina"></li>
                                            <li><img src="{{ asset('icons/icon-pertamina.png') }}" height="60" alt="partner-pertamina"></li>
                                            <li><img src="{{ asset('icons/icon-petrochina.png') }}" height="135" alt="partner-petrochina"></li>
                                            <li><img src="{{ asset('icons/icon-pertamina.png') }}" height="60" alt="partner-pertamina"></li>
                                            <li><img src="{{ asset('icons/icon-petrochina.png') }}" height="135" alt="partner-petrochina"></li>
                                            <li><img src="{{ asset('icons/icon-pertamina.png') }}" height="60" alt="partner-pertamina"></li>
                                            <li><img src="{{ asset('icons/icon-petrochina.png') }}" height="135" alt="partner-petrochina"></li>
                                            <li><img src="{{ asset('icons/icon-pertamina.png') }}" height="60" alt="partner-pertamina"></li>
                                            <li><img src="{{ asset('icons/icon-petrochina.png') }}" height="135" alt="partner-petrochina"></li>
                                            <li><img src="{{ asset('icons/icon-pertamina.png') }}" height="60" alt="partner-pertamina"></li>
                                            <li><img src="{{ asset('icons/icon-petrochina.png') }}" height="135" alt="partner-petrochina"></li>
                                            <li><img src="{{ asset('icons/icon-pertamina.png') }}" height="60" alt="partner-pertamina"></li>
                                            <li><img src="{{ asset('icons/icon-petrochina.png') }}" height="135" alt="partner-petrochina"></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>

            <footer class="app-footer d-flex justify-content-center" style="font-size: 11px; font-weight: 300; color: #212020;">
                <b style="font-weight: 700;">© PARAMA DATA UNIT</b>, cibubur times square block c1 number 19-21, Bekasi, West Java 17435
            </footer>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.11.0/browser/overlayscrollbars.browser.es6.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.min.js" crossorigin="anonymous"></script>

        <script src="{{ asset('themes/adminlte4/js/adminlte.min.js') }}"></script>

        <script>
            const SELECTOR_SIDEBAR_WRAPPER = '.sidebar-wrapper';
            const Default = { scrollbarTheme: 'os-theme-light', scrollbarAutoHide: 'leave', scrollbarClickScroll: true};

            document.addEventListener('DOMContentLoaded', function () {
                const sidebarWrapper = document.querySelector(SELECTOR_SIDEBAR_WRAPPER);
                if (sidebarWrapper && OverlayScrollbarsGlobal?.OverlayScrollbars !== undefined) {
                    OverlayScrollbarsGlobal.OverlayScrollbars(sidebarWrapper, {
                        scrollbars: {
                            theme: Default.scrollbarTheme,
                            autoHide: Default.scrollbarAutoHide,
                            clickScroll: Default.scrollbarClickScroll,
                        },
                    });
                }

                const splide = new Splide( '.splide', {
                    type   : 'loop',
                    drag   : 'free',
                    focus  : 'center',
                    perPage: 3,
                    autoScroll: {
                        speed: 1,
                    },
                } );

                splide.mount();
            });
        </script>

        <script src="https://cdn.jsdelivr.net/npm/jsvectormap@1.5.3/dist/js/jsvectormap.min.js" integrity="sha256-/t1nN2956BT869E6H4V1dnt0X5pAQHPytli+1nTZm2Y=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/jsvectormap@1.5.3/dist/maps/world.js" integrity="sha256-XPpPaZlU8S/HWf7FZLAncLg2SAkP8ScUTII89x9D3lY=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/apexcharts@3.37.1/dist/apexcharts.min.js" integrity="sha256-+vh8GkaU7C9/wbSLIcwq82tQ2wTf44aOHA8HlBMwRI8=" crossorigin="anonymous"></script>
    </body>
</html>
