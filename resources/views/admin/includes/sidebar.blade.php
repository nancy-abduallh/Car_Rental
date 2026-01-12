<nav class="admin-sidebar" id="adminSidebar">
    <div class="sidebar-header">
        <div class="sidebar-user">
            <div class="user-avatar">
                <img src="{{ asset('assets/admin/img/icons8-admin-94.png') }}" alt="Admin Avatar">
            </div>
            <div class="user-info">
                <div class="user-name">Administrator</div>
                <div class="user-role">Super Admin</div>
            </div>
        </div>
    </div>

    <ul class="sidebar-menu">
        <li class="menu-section">Main Navigation</li>

        {{-- Dashboard --}}
        <li class="menu-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
            <a href="{{ route('admin.dashboard') }}" class="menu-link">
                <span class="menu-icon">
                    <i class="fas fa-tachometer-alt"></i>
                </span>
                <span class="menu-text">Dashboard</span>
            </a>
        </li>

        {{-- Brands --}}
        <li class="menu-item has-submenu {{ request()->routeIs('admin.brands*') ? 'active' : '' }}">
            <a href="#" class="menu-link">
                <span class="menu-icon">
                    <i class="fas fa-tags"></i>
                </span>
                <span class="menu-text">Brands</span>
                <span class="menu-arrow">
                    <i class="fas fa-chevron-down"></i>
                </span>
            </a>
            <ul class="submenu">
                <li class="{{ request()->routeIs('admin.brands.create') ? 'active' : '' }}">
                    <a href="{{ route('admin.brands.create') }}">Create Brand</a>
                </li>
                <li class="{{ request()->routeIs('admin.brands') ? 'active' : '' }}">
                    <a href="{{ route('admin.brands') }}">Manage Brands</a>
                </li>
            </ul>
        </li>

        {{-- Vehicles --}}
        <li class="menu-item has-submenu {{ request()->routeIs('admin.vehicles*') ? 'active' : '' }}">
            <a href="#" class="menu-link">
                <span class="menu-icon">
                    <i class="fas fa-car"></i>
                </span>
                <span class="menu-text">Vehicles</span>
                <span class="menu-arrow">
                    <i class="fas fa-chevron-down"></i>
                </span>
            </a>
            <ul class="submenu">
                <li class="{{ request()->routeIs('admin.vehicles.create') ? 'active' : '' }}">
                    <a href="{{ route('admin.vehicles.create') }}">Post a Vehicle</a>
                </li>
                <li class="{{ request()->routeIs('admin.vehicles') ? 'active' : '' }}">
                    <a href="{{ route('admin.vehicles') }}">Manage Vehicles</a>
                </li>
            </ul>
        </li>

        {{-- Bookings --}}
        <li class="menu-item has-submenu {{ request()->routeIs('admin.bookings*') ? 'active' : '' }}">
            <a href="#" class="menu-link">
                <span class="menu-icon">
                    <i class="fas fa-calendar-alt"></i>
                </span>
                <span class="menu-text">Bookings</span>
                <span class="menu-arrow">
                    <i class="fas fa-chevron-down"></i>
                </span>
            </a>
            <ul class="submenu">
                <li class="{{ request()->routeIs('admin.bookings') ? 'active' : '' }}">
                    <a href="{{ route('admin.bookings') }}">New Bookings</a>
                </li>
                <li class="{{ request()->routeIs('admin.bookings.confirmed') ? 'active' : '' }}">
                    <a href="{{ route('admin.bookings.confirmed') }}">Confirmed</a>
                </li>
                <li class="{{ request()->routeIs('admin.bookings.cancelled') ? 'active' : '' }}">
                    <a href="{{ route('admin.bookings.cancelled') }}">Cancelled</a>
                </li>
            </ul>
        </li>

        {{-- Testimonials --}}
        <li class="menu-item {{ request()->routeIs('admin.testimonials*') ? 'active' : '' }}">
            <a href="{{ route('admin.testimonials') }}" class="menu-link">
                <span class="menu-icon">
                    <i class="fas fa-comment"></i>
                </span>
                <span class="menu-text">Testimonials</span>
            </a>
        </li>

        {{-- Contact Queries --}}
        <li class="menu-item {{ request()->routeIs('admin.contact.queries*') ? 'active' : '' }}">
            <a href="{{ route('admin.contact.queries') }}" class="menu-link">
                <span class="menu-icon">
                    <i class="fas fa-question-circle"></i>
                </span>
                <span class="menu-text">Contact Queries</span>
            </a>
        </li>

        {{-- Registered Users --}}
        <li class="menu-item {{ request()->routeIs('admin.reg-users*') ? 'active' : '' }}">
            <a href="{{ route('admin.reg-users') }}" class="menu-link">
                <span class="menu-icon">
                    <i class="fas fa-users"></i>
                </span>
                <span class="menu-text">Registered Users</span>
            </a>
        </li>

        {{-- Manage Pages --}}
        <li class="menu-item {{ request()->routeIs('admin.pages*') ? 'active' : '' }}">
            <a href="{{ route('admin.pages') }}" class="menu-link">
                <span class="menu-icon">
                    <i class="fas fa-file"></i>
                </span>
                <span class="menu-text">Manage Pages</span>
            </a>
        </li>

        {{-- Contact Info --}}
        <li class="menu-item {{ request()->routeIs('admin.contact.update*') ? 'active' : '' }}">
            <a href="{{ route('admin.contact.update') }}" class="menu-link">
                <span class="menu-icon">
                    <i class="fas fa-address-book"></i>
                </span>
                <span class="menu-text">Contact Info</span>
            </a>
        </li>

        {{-- Subscribers --}}
        <li class="menu-item {{ request()->routeIs('admin.subscribers*') ? 'active' : '' }}">
            <a href="{{ route('admin.subscribers') }}" class="menu-link">
                <span class="menu-icon">
                    <i class="fas fa-bell"></i>
                </span>
                <span class="menu-text">Subscribers</span>
            </a>
        </li>
    </ul>
{{-- <div class="sidebar-footer">
        <div class="sidebar-toggler">
        </div>
    </div> --}}
</nav>

