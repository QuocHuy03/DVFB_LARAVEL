    {{-- @inject('site_config', 'App\Models\site_config')
    <!doctype html>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="ltr">
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />

    <head>
        <!-- META DATA -->
        <meta charset="UTF-8">
        <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- FAVICON -->
        <link rel="shortcut icon" type="image/x-icon" href="{{ $site_config->getValueByName('favicon') }}" />

        <meta name="Classification"
            content="hack like facebook, hack like, hack like ảnh facebook, tăng like facebook, tăng follow instagram,tang like instagram, hack like stt, cmt, hack like bình luận, hack sub, hack like fb" />
        <meta name="page-topic"
            content="hack like facebook, hack like, hack like ảnh facebook, tăng like facebook, tăng follow instagram,tang like instagram, hack like stt, cmt, hack like bình luận, hack sub, hack like fb" />
        <meta name="keywords"
            content="like, sub, share, vip like, buff mắt, tăng follow, mua like, mua sub, sub rẻ, hack like, hack sub, hack follow, tăng like, tăng follow, cách hack tăng like,share code auto like, xin code auto like, web auto like, {{ $site_config->getValueByName('domain') }}" />
        <meta name="description" content="Hệ thống dịch vụ mạng xã hội Facebook | Instagram | Youtube | Tiktok">
        <meta name="author" content="{{ $site_config->getValueByName('domain') }}">
        <meta http-equiv="content-language" content="vi" />
        <meta name="geo.placename" content="Viet Nam" />
        <meta name="copyright" content="Copyright (c) by {{ $site_config->getValueByName('domain') }}  - 2022" />
        <meta name="robots" content="index,follow" />
        <meta name="resource-type" content="document" />
        <meta name="distribution" content="Local" />
        <meta name="revisit-after" content="1 days" />
        <meta http-equiv="Content-Type" content="application/vnd.wap.xhtml+xml; charset=utf-8" />
        <meta property="og:type" content="website" />
        <meta property="og:title" content="hack like facebook, hack like, hack like ảnh facebook, tăng like facebook" />
        <meta property="og:description"
            content="Hệ thống dịch vụ mạng xã hội Facebook | Instagram | Youtube | Tiktok" />
        <meta property="og:site_name" content="hack like facebook - tang like hack like" />
        <!-- TITLE -->
        <title>Chào mừng bạn</title>

        <!-- BOOTSTRAP CSS -->
        <link id="style" href="huycode/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />

        <!-- STYLE CSS -->
        <link href="huycode/css/style.css" rel="stylesheet" />

        <!--- FONT-ICONS CSS -->
        <link href="huycode/plugins/icons/icons.css" rel="stylesheet" />

        <!-- INTERNAL Switcher css -->
        <link href="huycode/switcher/css/switcher.css" rel="stylesheet" />
        <link href="huycode/switcher/demo.css" rel="stylesheet" />

    </head>

    <body class="ltr app horizontal landing-page">

        <!-- Switcher -->
        <div class="switcher-wrapper">
            <div class="demo_changer">
                <div class="form_holder sidebar-right1">
                    <div class="row">
                        <div class="predefined_styles">
                            <div class="swichermainleft">
                                <h4>LTR and RTL VERSIONS</h4>
                                <div class="skin-body">
                                    <div class="switch_section">
                                        <div class="switch-toggle d-flex">
                                            <span class="me-auto">LTR Version</span>
                                            <p class="onoffswitch2"><input type="radio" name="onoffswitch7"
                                                    id="myonoffswitch23" class="onoffswitch2-checkbox" checked>
                                                <label for="myonoffswitch23" class="onoffswitch2-label"></label>
                                            </p>
                                        </div>
                                        <div class="switch-toggle d-flex mt-2">
                                            <span class="me-auto">RTL Version</span>
                                            <p class="onoffswitch2"><input type="radio" name="onoffswitch7"
                                                    id="myonoffswitch24" class="onoffswitch2-checkbox">
                                                <label for="myonoffswitch24" class="onoffswitch2-label"></label>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swichermainleft">
                                <h4>Light Theme Style</h4>
                                <div class="skin-body">
                                    <div class="switch_section">
                                        <div class="switch-toggle d-flex">
                                            <span class="me-auto">Light Theme</span>
                                            <p class="onoffswitch2"><input type="radio" name="onoffswitch1"
                                                    id="myonoffswitch1" class="onoffswitch2-checkbox" checked>
                                                <label for="myonoffswitch1" class="onoffswitch2-label"></label>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="switch_section">
                                        <div class="switch-toggle d-flex mt-2">
                                            <span class="me-auto">Dark Theme</span>
                                            <p class="onoffswitch2"><input type="radio" name="onoffswitch1"
                                                    id="myonoffswitch2" class="onoffswitch2-checkbox">
                                                <label for="myonoffswitch2" class="onoffswitch2-label"></label>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swichermainleft">
                                <h4>Reset All Styles</h4>
                                <div class="skin-body">
                                    <div class="switch_section my-4">
                                        <button class="btn btn-danger btn-block"
                                            onclick="localStorage.clear();
           document.querySelector('html').style = '';
           resetData() ;"
                                            type="button">Reset All
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Switcher -->

        <a href="javascript:void(0);" class="buy-now">Buy Now</a>

        <!-- GLOBAL-LOADER -->
        <div id="global-loader">
            <img src="huycode/images/loader.svg" class="loader-img" alt="Loader">
        </div>
        <!-- /GLOBAL-LOADER -->

        <!-- PAGE -->
        <div class="page">
            <div class="page-main">

                <!-- app-Header -->
                <div class="hor-header header">
                    <div class="container main-container">
                        <div class="d-flex">
                            <a aria-label="Hide Sidebar" class="app-sidebar__toggle" data-bs-toggle="sidebar"
                                href="javascript:void(0)"></a>
                            <!-- sidebar-toggle-->
                            <a class="logo-horizontal " href="/">
                                <img src="{{ $site_config->getValueByName('logo') }}"
                                    class="header-brand-img desktop-logo" alt="logo">
                                <img src="{{ $site_config->getValueByName('logo') }}"
                                    class="header-brand-img light-logo1" alt="logo">
                            </a>
                            <!-- LOGO -->

                            <div class="d-flex order-lg-2 ms-auto header-right-icons">
                                <button class="navbar-toggler navresponsive-toggler d-md-none ms-auto" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent-4"
                                    aria-controls="navbarSupportedContent-4" aria-expanded="false"
                                    aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon fe fe-more-vertical"></span>
                                </button>
                                <div class="navbar navbar-collapse responsive-navbar p-0">
                                    <div class="collapse navbar-collapse" id="navbarSupportedContent-4">
                                        <div class="d-flex order-lg-2 m-4 m-lg-0 m-md-1">
                                            <a href="#" target="_blank"
                                                class="btn btn-pill btn-outline-primary btn-w-md py-2 me-1">
                                                Sign up
                                            </a>
                                            <a href="#" target="_blank"
                                                class="btn btn-pill btn-primary btn-w-md py-2">
                                                Get Started
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="demo-icon nav-link icon fe-spin">
                                <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24"
                                    viewBox="0 0 24 24">
                                    <path
                                        d="M11.5,7.9c-2.3,0-4,1.9-4,4.2s1.9,4,4.2,4c2.2,0,4-1.9,4-4.1c0,0,0-0.1,0-0.1C15.6,9.7,13.7,7.9,11.5,7.9z M14.6,12.1c0,1.7-1.5,3-3.2,3c-1.7,0-3-1.5-3-3.2c0-1.7,1.5-3,3.2-3C13.3,8.9,14.7,10.3,14.6,12.1C14.6,12,14.6,12.1,14.6,12.1z M20,13.1c-0.5-0.6-0.5-1.5,0-2.1l1.4-1.5c0.1-0.2,0.2-0.4,0.1-0.6l-2.1-3.7c-0.1-0.2-0.3-0.3-0.5-0.2l-2,0.4c-0.8,0.2-1.6-0.3-1.9-1.1l-0.6-1.9C14.2,2.1,14,2,13.8,2H9.5C9.3,2,9.1,2.1,9,2.3L8.4,4.3C8.1,5,7.3,5.5,6.5,5.3l-2-0.4C4.3,4.9,4.1,5,4,5.2L1.9,8.8C1.8,9,1.8,9.2,2,9.4l1.4,1.5c0.5,0.6,0.5,1.5,0,2.1L2,14.6c-0.1,0.2-0.2,0.4-0.1,0.6L4,18.8c0.1,0.2,0.3,0.3,0.5,0.2l2-0.4c0.8-0.2,1.6,0.3,1.9,1.1L9,21.7C9.1,21.9,9.3,22,9.5,22h4.2c0.2,0,0.4-0.1,0.5-0.3l0.6-1.9c0.3-0.8,1.1-1.2,1.9-1.1l2,0.4c0.2,0,0.4-0.1,0.5-0.2l2.1-3.7c0.1-0.2,0.1-0.4-0.1-0.6L20,13.1z M18.6,18l-1.6-0.3c-1.3-0.3-2.6,0.5-3,1.7L13.4,21H9.9l-0.5-1.6c-0.4-1.3-1.7-2-3-1.7L4.7,18l-1.8-3l1.1-1.3c0.9-1,0.9-2.5,0-3.5L2.9,9l1.8-3l1.6,0.3c1.3,0.3,2.6-0.5,3-1.7L9.9,3h3.5l0.5,1.6c0.4,1.3,1.7,2,3,1.7L18.6,6l1.8,3l-1.1,1.3c-0.9,1-0.9,2.5,0,3.5l1.1,1.3L18.6,18z">
                                    </path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /app-Header -->

                <!--APP-SIDEBAR-->
                <div class="landing-top-header overflow-hidden">
                    <div class="top sticky overflow-hidden">

                        <!--APP-SIDEBAR-->
                        <div class="app-sidebar__overlay" data-bs-toggle="sidebar"></div>
                        <div class="app-sidebar bg-transparent horizontal-main">
                            <div class="container">
                                <div class="main-sidemenu navbar px-0">
                                    <a class="navbar-brand ps-0 d-none d-lg-block" href="/">
                                        <p class="logo-2">{{ $site_config->getValueByName('domain') }}</p>
                                        <img alt="logo" class="dark-landinglogo"
                                            src="{{ $site_config->getValueByName('favicon') }}">
                                    </a>
                                    <ul class="side-menu">
                                        <li class="slide">
                                            <a class="side-menu__item active" data-bs-toggle="slide"
                                                href="#home"><span class="side-menu__label">Home</span></a>
                                        </li>
                                        <li class="slide">
                                            <a class="side-menu__item" data-bs-toggle="slide" href="#About"><span
                                                    class="side-menu__label">About</span></a>
                                        </li>
                                        <li class="slide">
                                            <a class="side-menu__item" data-bs-toggle="slide" href="#Clients"><span
                                                    class="side-menu__label">Cấp bậc</span></a>
                                        </li>
                                    </ul>
                                    <div class="header-nav-right d-flex">
                                        <a href="{{ route('auth.login') }}" target="_blank"
                                            class="btn btn-pill btn-primary btn-w-md py-2 my-auto d-lg-none d-xl-block d-block">
                                            Get Started
                                        </a>
                                        <div class="demo-icon nav-link icon fe-spin">
                                            <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24"
                                                viewBox="0 0 24 24">
                                                <path
                                                    d="M11.5,7.9c-2.3,0-4,1.9-4,4.2s1.9,4,4.2,4c2.2,0,4-1.9,4-4.1c0,0,0-0.1,0-0.1C15.6,9.7,13.7,7.9,11.5,7.9z M14.6,12.1c0,1.7-1.5,3-3.2,3c-1.7,0-3-1.5-3-3.2c0-1.7,1.5-3,3.2-3C13.3,8.9,14.7,10.3,14.6,12.1C14.6,12,14.6,12.1,14.6,12.1z M20,13.1c-0.5-0.6-0.5-1.5,0-2.1l1.4-1.5c0.1-0.2,0.2-0.4,0.1-0.6l-2.1-3.7c-0.1-0.2-0.3-0.3-0.5-0.2l-2,0.4c-0.8,0.2-1.6-0.3-1.9-1.1l-0.6-1.9C14.2,2.1,14,2,13.8,2H9.5C9.3,2,9.1,2.1,9,2.3L8.4,4.3C8.1,5,7.3,5.5,6.5,5.3l-2-0.4C4.3,4.9,4.1,5,4,5.2L1.9,8.8C1.8,9,1.8,9.2,2,9.4l1.4,1.5c0.5,0.6,0.5,1.5,0,2.1L2,14.6c-0.1,0.2-0.2,0.4-0.1,0.6L4,18.8c0.1,0.2,0.3,0.3,0.5,0.2l2-0.4c0.8-0.2,1.6,0.3,1.9,1.1L9,21.7C9.1,21.9,9.3,22,9.5,22h4.2c0.2,0,0.4-0.1,0.5-0.3l0.6-1.9c0.3-0.8,1.1-1.2,1.9-1.1l2,0.4c0.2,0,0.4-0.1,0.5-0.2l2.1-3.7c0.1-0.2,0.1-0.4-0.1-0.6L20,13.1z M18.6,18l-1.6-0.3c-1.3-0.3-2.6,0.5-3,1.7L13.4,21H9.9l-0.5-1.6c-0.4-1.3-1.7-2-3-1.7L4.7,18l-1.8-3l1.1-1.3c0.9-1,0.9-2.5,0-3.5L2.9,9l1.8-3l1.6,0.3c1.3,0.3,2.6-0.5,3-1.7L9.9,3h3.5l0.5,1.6c0.4,1.3,1.7,2,3,1.7L18.6,6l1.8,3l-1.1,1.3c-0.9,1-0.9,2.5,0,3.5l1.1,1.3L18.6,18z">
                                                </path>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/APP-SIDEBAR-->

                    </div>

                    <!-- Header Main-->
                    <div class="demo-screen-headline main-demo main-demo-1 overflow-hidden pb-0 mb-6" id="home">
                        <div class="container px-5 px-md-0">
                            <div class="overflow-hidden">
                                <div class="row">
                                    <div class="col-lg-6 text-left pos-relative overflow-hidden p-3">
                                        <h1 class="text-shadow text-dark">Tạo hiệu ứng cho sự nổi tiếng của bạn với
                                            <span
                                                class="text-primary">{{ $site_config->getValueByName('domain') }}</span>
                                        </h1>
                                        <h6 class="mt-3">Hệ thống chuyên cung cấp các dịch vụ tăng Like, Follow,
                                            Share, Comment, View Video,... cho các Mạng xã hội như Facebook, Instagram,
                                            Tiktok...</h6>

                                        <a href="{{ route('auth.login') }}"
                                            class="btn btn-pill btn-primary btn-w-md py-2 me-2 mb-1">Bắt đầu ngay<i
                                                class="fe fe-activity ms-2"></i></a>
                                    </div>
                                    <div class="col-lg-6 text-left pos-relative overflow-hidden market-image">
                                        <img alt="" class="logo-2" src="huycode/images/landing/market.png">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Header Main Close-->

                </div>
                <!--/APP-SIDEBAR-->

                <!--app-content open-->
                <div class="hor-content main-content mt-0">
                    <div class="side-app">
                        <!-- CONTAINER -->
                        <div class="main-container">


                            <!-- Our motto section-->
                            <div class="section pb-5" id="About">
                                <div class="container">
                                    <div class="row text-center">
                                        <div class="col-lg-12">
                                            <h3 class="header-family">Về chúng tôi</h3>

                                        </div>
                                    </div>
                                    <div class="row mt-5">
                                        <div class="col-lg-4 col-sm-6 why-image">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="mb-2">
                                                        <img class="img-fluid"
                                                            src="huycode/images/landing/Why/web-designing.png"
                                                            alt="">
                                                    </div>
                                                    <p class="why-head mb-2">Công nghệ</p>
                                                    <p class="fs-13">Hệ thống được vận hành hoàn toàn tự động
                                                        24/24. </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-sm-6 why-image">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="mb-2">
                                                        <img class="img-fluid"
                                                            src="huycode/images/landing/Why/documentation.png"
                                                            alt="">
                                                    </div>
                                                    <p class="why-head mb-2">Bảo mật</p>
                                                    <p class="fs-13">Chúng tôi cam kết sẽ bảo mật thông tin người
                                                        dùng 1 cách tốt nhất. </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-sm-6 why-image">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="mb-2">
                                                        <img class="img-fluid"
                                                            src="huycode/images/landing/Why/web-settings.png"
                                                            alt="">
                                                    </div>
                                                    <p class="why-head mb-2">Hỗ trợ</p>
                                                    <p class="fs-13">Đội ngũ hỗ trợ luôn lắng nghe ý khiến khách
                                                        hàng để phát triển hệ thống.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Our motto section end-->

                            <!-- Pricing -->
                            <div class="section pb-7" id="Clients">
                                <div class="container">
                                    <div class="row text-center">
                                        <div class="col-lg-12 ps-3">
                                            <h3 class="header-family">Cấp bậc ưu đãi khách hàng</h3>

                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-xl-12">
                                            <div class="pricing-tabs">
                                                <div class="tab-content">
                                                    <div class="tab-pane pb-0 active show" id="year">
                                                        <div
                                                            class="row d-flex align-items-center justify-content-center">
                                                            <div class="col-lg-4 col-sm-8">
                                                                <div class="card p-3 pricing-card text-center">
                                                                    <div
                                                                        class="card-header d-block text-justified pt-2">
                                                                        <p class="text-18 font-weight-semibold mb-1">
                                                                            Thành viên
                                                                        </p>
                                                                        <p class="font-weight-semibold mb-1">
                                                                            <span class="text-30 me-2"></span><span
                                                                                class="text-30 me-1">{{ number_format($site_config->getValueByName('charge_level_TV')) }}
                                                                                Đ</span>
                                                                        </p>
                                                                        <p class="text-13 mb-1">LKhông có ưu đãi
                                                                        </p>
                                                                    </div>
                                                                    <div
                                                                        class="card-footer text-center border-top-0 pt-1">
                                                                        <button
                                                                            class="btn btn-lg btn-outline-warning btn-block">
                                                                            <span class="ms-4 me-4">Sử dụng</span>
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4 col-sm-8">
                                                                <div class="card p-3 pricing-card">
                                                                    <div class="card-header d-block text-center pt-2 ">
                                                                        <p class="text-18 font-weight-semibold mb-1">
                                                                            Cộng tác viên</p>
                                                                        <p class="font-weight-semibold mb-1">
                                                                            <span class="text-30 me-2"></span><span
                                                                                class="text-30 me-1">{{ number_format($site_config->getValueByName('charge_level_CTV')) }}
                                                                                đ</span>
                                                                        </p>
                                                                        <p class="text-13 mb-1">Có ưu đãi giá dịch vụ
                                                                            cộng tác viên.
                                                                        </p>
                                                                    </div>
                                                                    <div
                                                                        class="card-footer text-center border-top-0 pt-1">
                                                                        <button
                                                                            class="btn btn-lg btn-outline-info btn-block">
                                                                            <span class="ms-4 me-4">Sử dụng</span>
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4 col-sm-8">
                                                                <div
                                                                    class="card p-3 border-primary pricing-card advanced">
                                                                    <div
                                                                        class="card-header d-block text-justified pt-2">
                                                                        <p
                                                                            class="text-18 font-weight-semibold mb-1 pe-0">
                                                                            Đại lý<span
                                                                                class="float-end badge bg-primary text-white text-12-f pt-3">Có
                                                                                thỏa thuận</span></p>
                                                                        <p
                                                                            class="text-justify font-weight-semibold mb-1">
                                                                            <span class="text-30 me-2"></span><span
                                                                                class="text-30 me-1">{{ number_format($site_config->getValueByName('charge_level_DL')) }}</span>
                                                                        </p>
                                                                        <p class="text-13 mb-2">Có rất nhiều ưu đãi giá
                                                                            dịch vụ đại lý.
                                                                        </p>
                                                                    </div>
                                                                    <div
                                                                        class="card-footer text-center border-top-0 pt-1">
                                                                        <button
                                                                            class="btn btn-lg btn-primary text-white btn-block">
                                                                            <span class="ms-4 me-4">Sử dụng</span>
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4 col-sm-8">
                                                                <div
                                                                    class="card p-3 border-primary pricing-card advanced">
                                                                    <div
                                                                        class="card-header d-block text-justified pt-2">
                                                                        <p
                                                                            class="text-18 font-weight-semibold mb-1 pe-0">
                                                                            Nhà phân phối<span
                                                                                class="float-end badge bg-primary text-white text-12-f pt-3">Có
                                                                                thỏa thuận</span></p>
                                                                        <p
                                                                            class="text-justify font-weight-semibold mb-1">
                                                                            <span class="text-30 me-2"></span><span
                                                                                class="text-30 me-1">{{ number_format($site_config->getValueByName('charge_level_NPP')) }}</span>
                                                                        </p>
                                                                        <p class="text-13 mb-2">Có rất nhiều ưu đãi giá
                                                                            dịch vụ nhà phan phối.
                                                                        </p>
                                                                    </div>
                                                                    <div
                                                                        class="card-footer text-center border-top-0 pt-1">
                                                                        <button
                                                                            class="btn btn-lg btn-primary text-white btn-block">
                                                                            <span class="ms-4 me-4">Sử dụng</span>
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Pricing close -->
                        </div>
                    </div>
                    <!-- CONTAINER CLOSED -->
                </div>
            </div>

            <!-- </Footer> -->
            <div class="demo-footer">
                <div class="container">
                    <div class="card mb-0 px-0">
                        <div class="card-body px-0">
                            <footer class="main-footer px-0 pb-0">
                                <div class="row ">
                                    <div class="col-xl-8 col-lg-12 col-md-12 footer1">Copyright © 2022 <a
                                            href="javascript:void(0)">{{ $site_config->getValueByName('admin_name') }}</a>.
                                        Designed with <span class="fa fa-heart text-danger"></span> by <a
                                            href="javascript:void(0)">
                                            {{ $site_config->getValueByName('admin_name') }}
                                        </a>
                                    </div>
                                </div>
                            </footer>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer close -->

        </div>

        <!-- BACK-TO-TOP -->
        <a href="#top" id="back-to-top"><i class="fa fa-long-arrow-up"></i></a>

        <!-- JQUERY JS -->
        <script src="huycode/plugins/jquery/jquery.min.js"></script>

        <!-- BOOTSTRAP JS -->
        <script src="huycode/plugins/bootstrap/js/popper.min.js"></script>
        <script src="huycode/plugins/bootstrap/js/bootstrap.min.js"></script>

        <!-- Owl carousel JS -->
        <script src="huycode/plugins/company-slider/slider.js"></script>
        <script src="huycode/plugins/owl-carousel/owl.carousel.js"></script>

        <!-- landing JS -->
        <script src="huycode/js/landing.js"></script>

    </body>


    </html> --}}
