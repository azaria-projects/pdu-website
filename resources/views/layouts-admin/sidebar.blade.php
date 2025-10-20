<aside class="app-sidebar" data-bs-theme="light">
    <div class="sidebar-brand">
        <a href="{{ route('admin.index') }}" class="brand-link">
            <img src="{{ asset('icons/icon-default.svg') }}" alt="AdminLTE Logo" class="brand-image"/>
            <span class="brand-text">PARAMA DATA UNIT</span>
        </a>
    </div>

    <div class="sidebar-wrapper">
        <nav class="h-100">
            <ul class="nav sidebar-menu flex-column h-100" data-lte-toggle="treeview" role="navigation" aria-label="Main navigation" data-accordion="false" id="navigation">
                <li class="nav-item">
                    <a href="{{ route('admin.index') }}" class="nav-link {{ Route::is('admin.index') ? 'active' : '' }}">
                        <i class="nav-icon ti ti-home-eco"></i>
                        <p>
                            <span>Home</span>
                            <i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon ti ti-tags"></i>
                        <p>
                            <span>Pages</span>
                            <i class="nav-arrow ti ti-chevron-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.careers') }}" class="nav-link {{ Route::is('admin.careers') ? 'active' : '' }}">
                                <i class="nav-icon ti ti-file-cv"></i>
                                <p>Careers</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.companies') }}" class="nav-link {{ Route::is('admin.companies') ? 'active' : '' }}">
                            <i class="nav-icon ti ti-building-estate"></i>
                            <p>Company</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.services') }}" class="nav-link">
                            <i class="nav-icon ti ti-cards"></i>
                            <p>Services</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon ti ti-database-cog"></i>
                        <p>
                            <span>Data</span>
                            <i class="nav-arrow ti ti-chevron-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.news') }}" class="nav-link {{ Route::is('admin.news') ? 'active' : '' }}">
                                <i class="nav-icon ti ti-news"></i>
                                <p>News</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.statistics') }}" class="nav-link {{ Route::is('admin.statistics') ? 'active' : '' }}">
                                <i class="nav-icon ti ti-chart-bar-popular"></i>
                                <p>Statistics</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.services') }}" class="nav-link {{ Route::is('admin.services') ? 'active' : '' }}">
                                <i class="nav-icon ti ti-cards"></i>
                                <p>Services</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.testimonies') }}" class="nav-link {{ Route::is('admin.testimonies') ? 'active' : '' }}">
                                <i class="nav-icon ti ti-cake-roll"></i>
                                <p>Testimonies</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.partners') }}" class="nav-link {{ Route::is('admin.partners') ? 'active' : '' }}">
                                <i class="nav-icon ti ti-building-estate"></i>
                                <p>Partners</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.files') }}" class="nav-link {{ Route::is('admin.files') ? 'active' : '' }}">
                                <i class="nav-icon ti ti-files"></i>
                                <p>Files</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item mt-auto">
                    <a href="#" class="nav-link">
                        <i class="nav-icon ti ti-power"></i>
                        <p>
                            <span>Logout</span>
                            <i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>