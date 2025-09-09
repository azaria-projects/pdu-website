<aside class="app-sidebar d-sm-block d-md-none" style="background-color: white;">
    <div class="sidebar-brand border-0">
        <a href="{{ route('index') }}" class="brand-link">
            <img src="{{ asset('icons/icon-default.svg') }}" alt="PDU Logo" class="brand-image"/>
            <span class="brand-text d-none">Parama Data Unit</span>
        </a>
    </div>

    <div class="sidebar-wrapper">
        <nav class="mt-2">
            <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="navigation" aria-label="Main navigation" data-accordion="false" id="navigation">
                <li class="nav-item menu-open">
                    <a href="{{ route('index') }}" class="nav-link gap-1"> 
                        <i class="nav-icon ti ti-building-castle" style="font-size: 20px"></i> 
                        <span>Home</span>
                    </a>
                </li>
                
                <li class="nav-item">
                    <a href="{{ route('services.index') }}" class="nav-link gap-1"> 
                        <i class="nav-icon ti ti-notebook" style="font-size: 20px"></i> 
                        <span>Services</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('careers.index') }}" class="nav-link gap-1"> 
                        <i class="nav-icon ti ti-bulldozer" style="font-size: 20px"></i> 
                        <span>Career</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('companies.index') }}" class="nav-link gap-1"> 
                        <i class="nav-icon ti ti-blocks" style="font-size: 20px"></i> 
                        <span>Company</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>

</aside>