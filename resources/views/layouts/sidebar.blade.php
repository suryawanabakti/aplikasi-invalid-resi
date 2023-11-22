<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="#" class="app-brand-link">
            <span class="app-brand-logo demo">

            </span>
            <span class="app-brand-text demo menu-text fw-bolder ms-2">Invalid Resi</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>
    <div class="menu-inner-shadow"></div>
    <ul class="menu-inner py-1">


        @role('admin')
            <li class="menu-item {{ Request::is('admin/dashboard') ? 'active open' : '' }}">
                <a href="{{ route('dashboard') }}" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-home-circle"></i>
                    <div data-i18n="Analytics">Dashboard</div>
                </a>
            </li>
            <li class="menu-item {{ request()->is('customer/pengiriman*') ? 'active' : '' }}">
                <a href="/customer/pengiriman" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-file-find"></i>
                    <div data-i18n="Pengiriman">Validasi Resi</div>
                </a>
            </li>
            <li class="menu-item {{ Request::is('admin-jnt/pengiriman*') ? 'active open' : '' }}">
                <a href="/admin-jnt/pengiriman" class="menu-link">
                    <i class="menu-icon tf-icons bx bxs-package"></i>
                    <div data-i18n="Pengiriman">Pengiriman</div>
                </a>
            </li>
            {{--             
            <li class="menu-item {{ Request::is('admin/master-data*') ? 'active open' : '' }}">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons bx bx-layout"></i>
                    <div data-i18n="Layouts">Master Data</div>
                </a>
                <ul class="menu-sub">
                    <li class="menu-item {{ Request::is('admin/master-data/users*') ? 'active' : '' }}">
                        <a href="{{ route('admin.users.index') }}" class="menu-link">
                            <div data-i18n="Without menu">Users</div>
                        </a>
                    </li>
                </ul>
            </li> --}}

            <li class="menu-item {{ Request::is('admin/pengajuan*') ? 'active open' : '' }}">
                <a href="/admin/pengajuan" class="menu-link">
                    <i class="menu-icon tf-icons bx bxs-send"></i>
                    <div data-i18n="pengajuan">Keluhan</div>
                </a>
            </li>
            <li class="menu-item {{ Request::is('admin/keluhan*') ? 'active open' : '' }}">
                <a href="/admin/keluhan" class="menu-link">
                    <i class="menu-icon tf-icons bx bxs-file-export"></i>
                    <div data-i18n="Keluhan">Tindak Lanjut</div>
                </a>
            </li>
            <li class="menu-item {{ Request::is('admin/verifikasi*') ? 'active open' : '' }}">
                <a href="/admin/verifikasi" class="menu-link">
                    <i class="menu-icon tf-icons bx bxs-badge-check"></i>
                    <div data-i18n="verifikasi">Hasil Tindak Lanjut</div>
                </a>
            </li>
        @endrole
        @role('admin jnt')
            <li class="menu-item {{ Request::is('admin/dashboard') ? 'active open' : '' }}">
                <a href="{{ route('dashboard') }}" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-home-circle"></i>
                    <div data-i18n="Analytics">Dashboard</div>
                </a>
            </li>
            <li class="menu-header small text-uppercase"><span class="menu-header-text">Admin JNT Menu</span></li>
            <li class="menu-item {{ Request::is('admin-jnt/pengiriman*') ? 'active open' : '' }}">
                <a href="/admin-jnt/pengiriman" class="menu-link">
                    <i class="menu-icon tf-icons bx bxs-package"></i>
                    <div data-i18n="Pengiriman">Pengiriman</div>
                </a>
            </li>

            {{-- <li class="menu-item {{ Request::is('admin-jnt/keluhan*') ? 'active open' : '' }}">
                <a href="/admin-jnt/keluhan" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-error-alt"></i>
                    <div data-i18n="Keluhan">Keluhan</div>
                </a>
            </li> --}}
        @endrole
        @role('customer')
            <li class="menu-item {{ Request::is('customer/dashboard') ? 'active open' : '' }}">
                <a href="{{ route('customer.dashboard') }}" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-home-circle"></i>
                    <div data-i18n="Analytics">Dashboard</div>
                </a>
            </li>
            <li class="menu-header small text-uppercase"><span class="menu-header-text">Customer Menu</span></li>
            <li class="menu-item {{ request()->is('customer/pengiriman*') ? 'active' : '' }}">
                <a href="/customer/pengiriman" class="menu-link">
                    <i class="menu-icon tf-icons bx bxs-truck"></i>
                    <div data-i18n="Pengiriman">Validasi Resi</div>
                </a>
            </li>
            <li class="menu-item {{ request()->is('customer/pengajuan*') ? 'active' : '' }}">
                <a href="/customer/pengajuan" class="menu-link">
                    <i class="menu-icon tf-icons bx bxs-send"></i>
                    <div data-i18n="Keluhan">Pengajuan</div>
                </a>
            </li>
            <li class="menu-item {{ request()->is('customer/keluhan*') ? 'active' : '' }}">
                <a href="/customer/keluhan" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-file"></i>
                    <div data-i18n="Keluhan">Keluhan</div>
                </a>
            </li>
            <li class="menu-item {{ request()->is('customer/verifikasi*') ? 'active' : '' }}">
                <a href="/customer/verifikasi" class="menu-link">
                    <i class="menu-icon tf-icons bx bxs-badge-check"></i>
                    <div data-i18n="verifikasi">Verifikasi</div>
                </a>
            </li>
        @endrole


    </ul>
</aside>
