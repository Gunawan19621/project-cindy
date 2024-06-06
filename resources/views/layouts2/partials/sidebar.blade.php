<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3" id="sidenav-main" style="background-color: #97DEFF;">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href="{{ route('admin.dashboard') }}" @click.prevent>
            <img src="{{ asset('uploads/admin-logo.png') }}" class="navbar-brand-img h-100" alt="Main Logo">
            <span class="ms-1 font-weight-bold">ADMIN</span>
        </a>
    </div>

    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse w-auto" id="sidenav-collapse-main">
        <!-- Sidebar Menu -->
        <ul class="navbar-nav">

            <!-- Dashboard -->
            <li class="nav-item">
                <a class="nav-link {{ request()->is('admin/dashboard') ? 'active' : '' }}" href="/admin/dashboard">
                    <div class="icon-container">
                        <i class="fas fa-home"></i>
                    </div>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>

            <!-- Customers -->
            <li class="nav-item">
                <a class="nav-link {{ request()->is('customers') ? 'active' : '' }}" href="/customers">
                    <div class="icon-container">
                        <i class="fas fa-users"></i>
                    </div>
                    <span class="nav-link-text ms-1">Customer</span>
                </a>
            </li>

            <!-- Armada -->
            <li class="nav-item">
                <a class="nav-link {{ request()->is('armada') ? 'active' : '' }}" href="/armada">
                    <div class="icon-container">
                        <i class="fas fa-truck"></i>
                    </div>
                    <span class="nav-link-text ms-1">Armada</span>
                </a>
            </li>

            <!-- Orders -->
            <li class="nav-item">
                <a class="nav-link {{ request()->is('orders') ? 'active' : '' }}" href="/orders">
                    <div class="icon-container">
                        <i class="fas fa-file-alt"></i>
                    </div>
                    <span class="nav-link-text ms-1">Orders</span>
                </a>
            </li>

            <!-- Menu -->
            <li class="nav-item">
                <a class="nav-link {{ request()->is('menu') ? 'active' : '' }}" href="/menu">
                    <div class="icon-container">
                        <i class="fas fa-bars fa-fw"></i>
                    </div>
                    <span class="nav-link-text ms-1">Menu</span>
                </a>
            </li>

            <!-- Submenu -->
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#submenuCollapse">
                    <div class="icon-container">
                        <i class="fas fa-bars fa-fw"></i>
                    </div>
                    <span class="nav-link-text ms-1">Submenu</span>
                </a>
                <div id="submenuCollapse" class="collapse">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <!-- Submenu items -->
                        <a class="collapse-item" href="#">Submenu Item 1</a>
                        <a class="collapse-item" href="#">Submenu Item 2</a>
                        <a class="collapse-item" href="#">Submenu Item 3</a>
                    </div>
                </div>
            </li>

        </ul>
    </div>

    <!-- Sidenav Footer -->
    <div class="sidenav-footer mx-3">
        <div class="card card-background shadow-none card-background-mask-secondary" id="sidenavCard">
            <div class="full-background" style="background-image: url('../assets/img/curved-images/white-curved.jpg')"></div>
            <div class="card-body text-start p-3 w-100">
                <div class="icon icon-shape icon-sm bg-white shadow text-center mb-3 d-flex align-items-center justify-content-center border-radius-md">
                    <i class="ni ni-diamond text-dark text-gradient text-lg top-0" aria-hidden="true" id="sidenavCardIcon"></i>
                </div>
                <div class="docs-info">
                    <h6 class="text-white up mb-0">Need help?</h6>
                    <p class="text-xs font-weight-bold">Please check our docs</p>
                    <a href="" class="btn btn-white btn-sm w-100 mb-0">Documentation</a>
                </div>
            </div>
        </div>
        <a class="btn bg-gradient-primary mt-3 w-100" href="">Upgrade to pro</a>
    </div>
</aside>
