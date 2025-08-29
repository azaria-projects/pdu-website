<nav class="app-header navbar navbar-expand w-100 p-0">
    <div class="container-fluid w-100">
        <div id="navbar-items" class="d-flex flex-column w-100">
            <div class="navbar-content">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link d-flex h-100 py-0" href="{{ route('index') }}" role="button">
                            <img src="{{ asset('icons/icon-company.png') }}" width="60" height="60" alt="logo-pdu">
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
                    <li class="nav-item d-none d-md-block"><a href="#" class="nav-link icon-only px-1" style="color: #E55348;"><i class="ti ti-brand-gmail"></i></a></li>
                    <li class="nav-item d-none d-md-block"><a href="#" class="nav-link icon-only px-1" style="color: #0965C1;"><i class="ti ti-brand-linkedin"></i></a></li>
                </ul>
            </div>

            <div id="service-submenu" class="navbar-subcontent d-none">
                <ul class="navbar-nav justify-content-center h-100">
                    <li class="nav-item d-none d-md-block"><a href="{{ route('services.index') }}" class="nav-link nav-submenu px-0">MUDLOGGING</a></li>
                    <li class="nav-item d-none d-md-block"><a href="#" class="nav-link seperator px-2"><div class="line"></div></a></li>
                    <li class="nav-item d-none d-md-block"><a href="{{ route('services.index') }}" class="nav-link nav-submenu px-0">MWD DIRECTIONAL DRILLING</a></li>
                    <li class="nav-item d-none d-md-block"><a href="#" class="nav-link seperator px-2"><div class="line"></div></a></li>
                    <li class="nav-item d-none d-md-block"><a href="{{ route('services.index') }}" class="nav-link nav-submenu px-0">PLT SERVICES</a></li>
                </ul>
            </div>

            <div id="career-submenu" class="navbar-subcontent d-none">
                <ul class="navbar-nav justify-content-center h-100">
                    <li class="nav-item d-none d-md-block"><a href="{{ route('careers.index') }}" class="nav-link nav-submenu px-0">JOB OPPORTUNITIES</a></li>
                    <li class="nav-item d-none d-md-block"><a href="#" class="nav-link seperator px-2"><div class="line"></div></a></li>
                    <li class="nav-item d-none d-md-block"><a href="{{ route('careers.index') }}" class="nav-link nav-submenu px-0">JOB DESCRIPTIONS</a></li>
                </ul>
            </div>

            <div id="company-submenu" class="navbar-subcontent d-none">
                <ul class="navbar-nav justify-content-center h-100">
                    <li class="nav-item d-none d-md-block"><a href="{{ route('companies.index') }}" class="nav-link nav-submenu px-0">OVERVIEW</a></li>
                </ul>
            </div>
        </div>
    </div>
</nav>