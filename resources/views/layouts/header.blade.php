<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="{{ url('/home') }}" class="app-brand-link">
            <img src="{{ asset('NEW CONTENT/SOLO MM LOGO.png') }}" style="height: 200px" alt="Artifact Explorer Logo" class="app-brand-logo">
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>
    <li class="menu-header small text-uppercase"><span class="menu-header-text">Welcome!</span></li>
    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboard -->
        <li class="menu-item {{ Route::currentRouteName() == 'home' ? 'active' : '' }}">
            <a href="{{ route('home') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Dashboard">Dashboard</div>
            </a>
        </li>

        <!-- Interface Section -->
        <li class="menu-header small text-uppercase"><span class="menu-header-text">Interface</span></li>

        <!-- Visitor Information -->
        <li class="menu-item {{ Route::currentRouteName() == 'visitor.index' ? 'active' : '' }}">
            <a href="{{ route('visitor.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-user"></i>
                <div data-i18n="Visitor Information">Visitor Information</div>
            </a>
        </li>

        <!-- Reports -->
        <li class="menu-item {{ Route::currentRouteName() == 'report.index' ? 'active' : '' }}">
            <a href="{{ route('report.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-file"></i>
                <div data-i18n="Reports">Feedback</div>
            </a>
        </li>

        <!-- Interface Section -->
        <li class="menu-header small text-uppercase"><span class="menu-header-text">Landing Page</span></li>

        <!-- Events -->
        <li class="menu-item {{ Route::currentRouteName() == 'event.index' ? 'active' : '' }}">
            <a href="{{ route('event.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-calendar"></i>
                <div data-i18n="Events">Events</div>
            </a>
        </li>

        <li class="menu-item {{ Route::is('gallery.index', 'gallery.create', 'gallery.store', 'gallery.show', 'gallery.edit', 'gallery.update', 'gallery.destroy') ? 'active' : '' }}">
            <a href="{{ route('gallery.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-images"></i>
                <div data-i18n="Gallery">Gallery</div>
            </a>
        </li>



        <!-- Sidebar Toggler -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>
    </ul>
</aside>
