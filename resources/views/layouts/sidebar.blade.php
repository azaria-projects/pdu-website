<aside class="app-sidebar d-sm-block d-md-none">
    <div class="sidebar-brand border-0">
        <a href="{{ route('index') }}" class="brand-link">
            <img src="{{ asset('icons/icon-default.svg') }}" alt="PDU Logo" class="brand-image"/>
            <span class="brand-text d-none">Parama Data Unit</span>
        </a>
    </div>

    <div class="sidebar-wrapper">
        <nav class="h-100 mt-2">
            <ul class="nav sidebar-menu flex-column h-100" data-lte-toggle="treeview" role="navigation" aria-label="Main navigation" data-accordion="false" id="navigation">
                <li class="nav-item menu-open">
                    <a href="{{ route('index') }}" class="nav-link gap-1"> 
                        <i class="nav-icon ti ti-building-castle"></i> 
                        <span>Home</span>
                    </a>
                </li>
                
                <li class="nav-item">
                    <a href="{{ route('services.index') }}" class="nav-link gap-1"> 
                        <i class="nav-icon ti ti-apps"></i> 
                        <span>Services</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('careers.index') }}" class="nav-link gap-1"> 
                        <i class="nav-icon ti ti-briefcase"></i> 
                        <span>Career</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('companies.index') }}" class="nav-link gap-1"> 
                        <i class="nav-icon ti ti-building-warehouse"></i> 
                        <span>Company</span>
                    </a>
                </li>

                <li class="nav-item sidebar-icons">
                    <a href="#" class="nav-link icon-only px-1" style="color: #E55348;"><i class="ti ti-brand-gmail"></i></a>
                    <a href="#" class="nav-link icon-only px-1" style="color: #0965C1;"><i class="ti ti-brand-linkedin"></i></a>
                </li>
            </ul>
        </nav>
    </div>

</aside>