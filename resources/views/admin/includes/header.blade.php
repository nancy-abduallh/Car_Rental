<div class="admin-header">
    <div class="header-brand">
        <a href="{{ route('admin.dashboard') }}" class="brand-logo">
            <i class="fas fa-car"></i>
            <span>CarRental Pro</span>
            <small>Admin Panel</small>
        </a>
        <button class="menu-toggle" id="sidebarToggle">
            <i class="fas fa-bars"></i>
        </button>
    </div>

    <div class="header-nav">
        <div class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle" id="userDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <div class="user-avatar">
                    <img src="{{ asset('assets/admin/img/icons8-admin-94.png') }}" alt="Admin Avatar">
                </div>
                <span class="user-name">Admin</span>
                <i class="fas fa-chevron-down"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="{{ route('admin.change.password') }}">
                    <i class="fas fa-key"></i> Change Password
                </a>
                <div class="dropdown-divider"></div>
                <form method="POST" action="{{ route('admin.logout') }}">
                    @csrf
                    <button type="submit" class="dropdown-item logout-btn">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
