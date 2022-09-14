
<div class="nk-app-root">
    <div class="nk-main ">
        <div class="nk-sidebar nk-sidebar-fixed is-light " data-content="sidebarMenu">
            <div class="nk-sidebar-element nk-sidebar-head">
                <div class="nk-sidebar-brand"><a href="{{ route('admin.index') }}"
                        class="logo-link nk-sidebar-logo">ADMIN</a></div>
                <div class="nk-menu-trigger me-n2"><a href="#" class="nk-nav-toggle nk-quick-nav-icon d-xl-none"
                        data-target="sidebarMenu"><em class="icon ni ni-arrow-left"></em></a><a href="#"
                        class="nk-nav-compact nk-quick-nav-icon d-none d-xl-inline-flex" data-target="sidebarMenu"><em
                            class="icon ni ni-menu"></em></a></div>
            </div>

            <div class="nk-sidebar-element">
                <div class="nk-sidebar-content">
                    <div class="nk-sidebar-menu" data-simplebar>
                        <ul class="nk-menu">
                            <li class="nk-menu-heading">
                                <h6 class="overline-title text-primary-alt">Preview</h6>
                            </li>
                            <li class="nk-menu-item"><a href="{{ route('admin.index') }}"
                                    class="nk-menu-link"><span class="nk-menu-icon"><em
                                            class="icon ni ni-home"></em></span><span class="nk-menu-text">Trang
                                        chủ</span></a></li>
                            <li class="nk-menu-item"><a href="{{ route('admin.configWebsite') }}"
                                    class="nk-menu-link"><span class="nk-menu-icon"><em
                                            class="icon ni ni-user"></em></span><span class="nk-menu-text">Cấu hình
                                        web</span></a></li>
                            <li class="nk-menu-item"><a href="{{ route('admin.clients') }}"
                                    class="nk-menu-link"><span class="nk-menu-icon"><em
                                            class="icon ni ni-user-check"></em></span><span class="nk-menu-text">Quản
                                        lí thành viên</span></a></li> 
                                        <li class="nk-menu-item"><a href="{{ route('admin.service.account.orders') }}" class="nk-menu-link"><span
                                            class="nk-menu-icon"><em class="icon ni ni-bag"></em></span><span
                                            class="nk-menu-text">Quản lí bán tài khoản</span></a></li>
                            <li class="nk-menu-item"><a href="{{ route('admin.client.orders') }}" class="nk-menu-link"><span
                                        class="nk-menu-icon"><em class="icon ni ni-bag"></em></span><span
                                        class="nk-menu-text">Quản lí đơn hàng</span></a></li>
                            <li class="nk-menu-item"><a href="{{ route('admin.manager-bank') }}" class="nk-menu-link"><span
                                        class="nk-menu-icon"><em class="icon ni ni-cart-fill"></em></span><span
                                        class="nk-menu-text">Quản lí nạp tiền</span></a></li>
                            <li class="nk-menu-item"><a href="{{ route('admin.recharge.card') }}" class="nk-menu-link"><span
                                        class="nk-menu-icon"><em
                                            class="icon ni ni-activity-round-fill"></em></span><span
                                        class="nk-menu-text">Quản lí thẻ cào</span></a></li>
                            <li class="nk-menu-item"><a href="{{ route('admin.recharge') }}" class="nk-menu-link"><span
                                        class="nk-menu-icon"><em class="icon ni ni-growth-fill"></em></span><span
                                        class="nk-menu-text">Quản lí ngân hàng</span></a></li>
                            <li class="nk-menu-item"><a href="{{ route('admin.block-ip') }}" class="nk-menu-link"><span
                                        class="nk-menu-icon"><em class="icon ni ni-user"></em></span><span
                                        class="nk-menu-text">Block ip</span></a></li>
                            <li class="nk-menu-item"><a href="{{ route('admin.notice') }}"
                                    class="nk-menu-link"><span class="nk-menu-icon"><em
                                            class="icon ni ni-notice"></em></span><span class="nk-menu-text">Cài đặt
                                        thông báo</span></a></li>
                            <li class="nk-menu-item"><a href="{{ route('admin.service.auto') }}"
                                            class="nk-menu-link"><span class="nk-menu-icon"><em
                                                    class="icon ni ni-notice"></em></span><span class="nk-menu-text">Cài đặt dịch vụ auto</span></a></li>
                            <li class="nk-menu-item"><a href="{{ route('admin.settingAdmin') }}"
                                    class="nk-menu-link"><span class="nk-menu-icon"><em
                                            class="icon ni ni-notice"></em></span><span class="nk-menu-text">Cài đặt
                                        Admin</span></a></li>
                            <li class="nk-menu-item has-sub"><a href="#" class="nk-menu-link nk-menu-toggle"><span
                                        class="nk-menu-icon"><em class="icon ni ni-tile-thumb-fill"></em></span><span
                                        class="nk-menu-text">Quản lí dịch vụ</span></a>
                                <ul class="nk-menu-sub">
                                    <li class="nk-menu-item"><a href="{{ route('admin.service', 'facebook') }}"
                                            class="nk-menu-link"><span class="nk-menu-text">Dịch vụ facebook
                                            </span></a></li>
                                    <li class="nk-menu-item"><a href="{{ route('admin.service', 'instagram') }}" class="nk-menu-link"><span
                                                class="nk-menu-text">Dịch vụ instagram</span></a></li>
                                    <li class="nk-menu-item"><a href="{{ route('admin.service', 'tiktok') }}"
                                            class="nk-menu-link"><span class="nk-menu-text">Dịch vụ
                                                Tiktok</span></a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="nk-wrap ">
            <div class="nk-header nk-header-fixed is-light">
                <div class="container-fluid">
                    <div class="nk-header-wrap">
                        <div class="nk-menu-trigger d-xl-none ms-n1"><a href="#"
                                class="nk-nav-toggle nk-quick-nav-icon" data-target="sidebarMenu"><em
                                    class="icon ni ni-menu"></em></a></div>
                        <div class="nk-header-brand d-xl-none"><a href="index.html" class="logo-link"><img
                                    class="logo-light logo-img" src="images/logo.png"
                                    srcset="{{ asset('') }}images/logo2x.png 2x" alt="logo"><img
                                    class="logo-dark logo-img" src="images/logo-dark.png"
                                    srcset="{{ asset('') }}images/logo-dark2x.png 2x" alt="logo-dark"></a></div>
                        <div class="nk-header-search ms-3 ms-xl-0"><em class="icon ni ni-search"></em><input
                                type="text" class="form-control border-transparent form-focus-none"
                                placeholder="Search anything">
                        </div>
                        <div class="nk-header-tools">
                            <ul class="nk-quick-nav">
                                <li class="dropdown notification-dropdown"><a href="#"
                                        class="dropdown-toggle nk-quick-nav-icon" data-bs-toggle="dropdown">
                                        <div class="icon-status icon-status-info"><em class="icon ni ni-bell"></em>
                                        </div>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-xl dropdown-menu-end">
                                        <div class="dropdown-head"><span
                                                class="sub-title nk-dropdown-title">Notifications</span><a
                                                href="#">Tổng
                                                đơn sau 1h qua</a></div>
                                        <div class="dropdown-body">
                                            <div class="nk-notification">
                                                <div class="nk-notification-item dropdown-inner">
                                                    <div class="nk-notification-icon"><em
                                                            class="icon icon-circle bg-success-dim ni ni-curve-down-left"></em>
                                                    </div>
                                                    <div class="nk-notification-content">
                                                        <div class="nk-notification-text">Your <span>Deposit
                                                                Order</span> is placed</div>
                                                        <div class="nk-notification-time">2 hrs ago</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="dropdown-foot center"><a href="#">View All</a></div>
                                    </div>
                                </li>
                                <li class="dropdown user-dropdown"><a href="#" class="dropdown-toggle me-n1"
                                        data-bs-toggle="dropdown">
                                        <div class="user-toggle">
                                            <div class="user-avatar sm"><em class="icon ni ni-user-alt"></em>
                                            </div>
                                            <div class="user-info d-none d-xl-block">
                                                <div class="user-status user-status-unverified">Quản trị viên</div>
                                                <div class="user-name dropdown-indicator">{{ Auth::user()->name }}
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-md dropdown-menu-end">
                                        <div class="dropdown-inner user-card-wrap bg-lighter d-none d-md-block">
                                            <div class="user-card">
                                                <div class="user-avatar"><span>DL</span></div>
                                                <div class="user-info"><span
                                                        class="lead-text">{{ Auth::user()->name }}</span><span
                                                        class="sub-text">{{ Auth::user()->email }}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="dropdown-inner">
                                            <ul class="link-list">
                                                <li><a href="{{ route('home') }}"><em
                                                            class="icon ni ni-signout"></em><span> Về trang
                                                            chủ</span></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="nk-block-head nk-block-head-sm">
                <div class="nk-block-between">
                    <div class="nk-block-head-content">
                        <h3 class="nk-block-title page-title">Dashboard</h3>
                    </div>
                    <div class="nk-block-head-content">
                        <div class="toggle-wrap nk-block-tools-toggle"><a href="#"
                                class="btn btn-icon btn-trigger toggle-expand me-n1" data-target="pageMenu"><em
                                    class="icon ni ni-more-v"></em></a>
                            <div class="toggle-expand-content" data-content="pageMenu">
                                <ul class="nk-block-tools g-3">
                                    <li>
                                        <div class="drodown"><a href="#"
                                                class="dropdown-toggle btn btn-white btn-dim btn-outline-light"
                                                data-bs-toggle="dropdown"><em
                                                    class="d-none d-sm-inline icon ni ni-calender-date"></em><span><span
                                                        class="d-none d-md-inline">Last</span> 30
                                                    Days</span><em class="dd-indc icon ni ni-chevron-right"></em></a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <ul class="link-list-opt no-bdr">
                                                    <li><a href="#"><span>Last 30 Days</span></a>
                                                    </li>
                                                    <li><a href="#"><span>Last 6 Months</span></a>
                                                    </li>
                                                    <li><a href="#"><span>Last 1 Years</span></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="nk-block-tools-opt"><a href="#" class="btn btn-primary"><em
                                                class="icon ni ni-reports"></em><span>Reports</span></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="nk-content ">
                <div class="container-fluid">
                    <div class="nk-content-inner">
                        <div class="nk-content-body">

                            <div class="nk-block">
                                @yield('content')
