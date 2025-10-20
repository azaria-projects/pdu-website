<nav class="app-header navbar navbar-expand w-100 p-0">
    <div class="container-fluid w-100">
        <div id="navbar-items" class="d-flex flex-column w-100">
            <div class="navbar-content">
                <ul class="navbar-nav nav-mobile">
                    <li class="nav-item">
                        <a class="nav-link d-flex h-100 py-0" href="{{ route('web.index') }}" role="button">
                            <img src="{{ asset('icons/icon-company.png') }}" width="60" height="60" alt="logo-pdu">
                        </a>
                    </li>
                    <li class="nav-item d-sm-flex d-md-none ms-auto">
                        <a class="nav-link d-flex align-items-center h-100" data-lte-toggle="sidebar" href="#" role="button">
                            <i class="ti ti-menu-3" style="font-size: 24px;"></i>
                        </a>
                    </li>
                </ul>

                <ul class="navbar-nav mx-auto align-self-center align-items-center h-100">
                    <li class="nav-item d-none d-md-block"><a id="service-menu" href="#" class="nav-link nav-menu px-0">SERVICES</a></li>
                    <li class="nav-item d-none d-md-block"><a href="#" class="nav-link seperator px-2 py-0"><div class="line"></div></a></li>
                    <li class="nav-item d-none d-md-block"><a id="career-menu" href="#" class="nav-link nav-menu px-0">CAREERS</a></li>
                    <li class="nav-item d-none d-md-block"><a href="#" class="nav-link seperator px-2 py-0"><div class="line"></div></a></li>
                    <li class="nav-item d-none d-md-block"><a id="company-menu" href="#" class="nav-link nav-menu px-0">COMPANY</a></li>
                </ul>

                <ul class="navbar-nav align-self-center">
                    <li class="nav-item d-none d-md-block"><a href="#" class="nav-link icon-only px-1" style="color: #E5AB48;"><i class="ti ti-key"></i></a></li>
                    <li class="nav-item d-none d-md-block"><a href="#" class="nav-link icon-only px-1" style="color: #E55348;"><i class="ti ti-brand-gmail"></i></a></li>
                    <li class="nav-item d-none d-md-block"><a href="#" class="nav-link icon-only px-1" style="color: #0965C1;"><i class="ti ti-brand-linkedin"></i></a></li>
                </ul>
            </div>

            <div id="service-submenu" class="navbar-subcontent d-none">
                <ul class="navbar-nav justify-content-center h-100">
                    <li class="nav-item d-none d-md-block"><a href="{{ route('web.services.index') }}" class="nav-link nav-submenu px-0">MUDLOGGING</a></li>
                    <li class="nav-item d-none d-md-block"><a href="#" class="nav-link seperator px-2"><div class="line"></div></a></li>
                    <li class="nav-item d-none d-md-block"><a href="{{ route('web.services.index') }}" class="nav-link nav-submenu px-0">MWD DIRECTIONAL DRILLING</a></li>
                    <li class="nav-item d-none d-md-block"><a href="#" class="nav-link seperator px-2"><div class="line"></div></a></li>
                    <li class="nav-item d-none d-md-block"><a href="{{ route('web.services.index') }}" class="nav-link nav-submenu px-0">PLT SERVICES</a></li>
                </ul>
            </div>

            <div id="career-submenu" class="navbar-subcontent d-none">
                <ul class="navbar-nav justify-content-center h-100">
                    <li class="nav-item d-none d-md-block"><a href="{{ route('web.careers.index') }}" class="nav-link nav-submenu px-0">JOB OPPORTUNITIES</a></li>
                    <li class="nav-item d-none d-md-block"><a href="#" class="nav-link seperator px-2"><div class="line"></div></a></li>
                    <li class="nav-item d-none d-md-block"><a href="{{ route('web.careers.index') }}" class="nav-link nav-submenu px-0">JOB DESCRIPTIONS</a></li>
                </ul>
            </div>

            <div id="company-submenu" class="navbar-subcontent d-none">
                <ul class="navbar-nav justify-content-center h-100">
                    <li class="nav-item d-none d-md-block"><a href="{{ route('web.companies.index') }}" class="nav-link nav-submenu px-0">OVERVIEW</a></li>
                </ul>
            </div>
        </div>
    </div>
</nav>

{{-- <nav class="app-header navbar navbar-expand bg-body">
    <!--begin::Container-->
    <div class="container-fluid">
        <!--begin::Start Navbar Links-->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-lte-toggle="sidebar" href="#" role="button">
                    <i class="bi bi-list"></i>
                </a>
            </li>
            <li class="nav-item d-none d-md-block"><a href="#" class="nav-link">Home</a></li>
            <li class="nav-item d-none d-md-block"><a href="#" class="nav-link">Contact</a></li>
        </ul>
        <!--end::Start Navbar Links-->
        <!--begin::End Navbar Links-->
        <ul class="navbar-nav ms-auto">
        <!--begin::Navbar Search-->
        <li class="nav-item">
            <a class="nav-link" data-widget="navbar-search" href="#" role="button">
            <i class="bi bi-search"></i>
            </a>
        </li>
        <!--end::Navbar Search-->
        <!--begin::Messages Dropdown Menu-->
        <li class="nav-item dropdown">
            <a class="nav-link" data-bs-toggle="dropdown" href="#">
            <i class="bi bi-chat-text"></i>
            <span class="navbar-badge badge text-bg-danger">3</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
            <a href="#" class="dropdown-item">
                <!--begin::Message-->
                <div class="d-flex">
                <div class="flex-shrink-0">
                    <img
                    src="./assets/img/user1-128x128.jpg"
                    alt="User Avatar"
                    class="img-size-50 rounded-circle me-3"
                    />
                </div>
                <div class="flex-grow-1">
                    <h3 class="dropdown-item-title">
                    Brad Diesel
                    <span class="float-end fs-7 text-danger"
                        ><i class="bi bi-star-fill"></i
                    ></span>
                    </h3>
                    <p class="fs-7">Call me whenever you can...</p>
                    <p class="fs-7 text-secondary">
                    <i class="bi bi-clock-fill me-1"></i> 4 Hours Ago
                    </p>
                </div>
                </div>
                <!--end::Message-->
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
                <!--begin::Message-->
                <div class="d-flex">
                <div class="flex-shrink-0">
                    <img
                    src="./assets/img/user8-128x128.jpg"
                    alt="User Avatar"
                    class="img-size-50 rounded-circle me-3"
                    />
                </div>
                <div class="flex-grow-1">
                    <h3 class="dropdown-item-title">
                    John Pierce
                    <span class="float-end fs-7 text-secondary">
                        <i class="bi bi-star-fill"></i>
                    </span>
                    </h3>
                    <p class="fs-7">I got your message bro</p>
                    <p class="fs-7 text-secondary">
                    <i class="bi bi-clock-fill me-1"></i> 4 Hours Ago
                    </p>
                </div>
                </div>
                <!--end::Message-->
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
                <!--begin::Message-->
                <div class="d-flex">
                <div class="flex-shrink-0">
                    <img
                    src="./assets/img/user3-128x128.jpg"
                    alt="User Avatar"
                    class="img-size-50 rounded-circle me-3"
                    />
                </div>
                <div class="flex-grow-1">
                    <h3 class="dropdown-item-title">
                    Nora Silvester
                    <span class="float-end fs-7 text-warning">
                        <i class="bi bi-star-fill"></i>
                    </span>
                    </h3>
                    <p class="fs-7">The subject goes here</p>
                    <p class="fs-7 text-secondary">
                    <i class="bi bi-clock-fill me-1"></i> 4 Hours Ago
                    </p>
                </div>
                </div>
                <!--end::Message-->
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
            </div>
        </li>
        <!--end::Messages Dropdown Menu-->
        <!--begin::Notifications Dropdown Menu-->
        <li class="nav-item dropdown">
            <a class="nav-link" data-bs-toggle="dropdown" href="#">
            <i class="bi bi-bell-fill"></i>
            <span class="navbar-badge badge text-bg-warning">15</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
            <span class="dropdown-item dropdown-header">15 Notifications</span>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
                <i class="bi bi-envelope me-2"></i> 4 new messages
                <span class="float-end text-secondary fs-7">3 mins</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
                <i class="bi bi-people-fill me-2"></i> 8 friend requests
                <span class="float-end text-secondary fs-7">12 hours</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
                <i class="bi bi-file-earmark-fill me-2"></i> 3 new reports
                <span class="float-end text-secondary fs-7">2 days</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item dropdown-footer"> See All Notifications </a>
            </div>
        </li>
        <!--end::Notifications Dropdown Menu-->
        <!--begin::Fullscreen Toggle-->
        <li class="nav-item">
            <a class="nav-link" href="#" data-lte-toggle="fullscreen">
            <i data-lte-icon="maximize" class="bi bi-arrows-fullscreen"></i>
            <i data-lte-icon="minimize" class="bi bi-fullscreen-exit" style="display: none"></i>
            </a>
        </li>
        <!--end::Fullscreen Toggle-->
        <!--begin::User Menu Dropdown-->
        <li class="nav-item dropdown user-menu">
            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
            <img
                src="./assets/img/user2-160x160.jpg"
                class="user-image rounded-circle shadow"
                alt="User Image"
            />
            <span class="d-none d-md-inline">Alexander Pierce</span>
            </a>
            <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
            <!--begin::User Image-->
            <li class="user-header text-bg-primary">
                <img
                src="./assets/img/user2-160x160.jpg"
                class="rounded-circle shadow"
                alt="User Image"
                />
                <p>
                Alexander Pierce - Web Developer
                <small>Member since Nov. 2023</small>
                </p>
            </li>
            <!--end::User Image-->
            <!--begin::Menu Body-->
            <li class="user-body">
                <!--begin::Row-->
                <div class="row">
                <div class="col-4 text-center"><a href="#">Followers</a></div>
                <div class="col-4 text-center"><a href="#">Sales</a></div>
                <div class="col-4 text-center"><a href="#">Friends</a></div>
                </div>
                <!--end::Row-->
            </li>
            <!--end::Menu Body-->
            <!--begin::Menu Footer-->
            <li class="user-footer">
                <a href="#" class="btn btn-default btn-flat">Profile</a>
                <a href="#" class="btn btn-default btn-flat float-end">Sign out</a>
            </li>
            <!--end::Menu Footer-->
            </ul>
        </li>
        <!--end::User Menu Dropdown-->
        </ul>
        <!--end::End Navbar Links-->
    </div>
    <!--end::Container-->
</nav> --}}