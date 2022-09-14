@inject('site_config', 'App\Models\site_config')
<!DOCTYPE html "Lê Quốc Huy">

<html lang="en" class="light">
<!-- BEGIN: Head -->

<head>
    <meta charset="utf-8">
    <!-- FAVICON -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ $site_config->getValueByName('favicon') }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="api-token" content="{{ Auth::user()->api_token }}">
    <meta name="description"
        content="{{ $site_config->getValueByName('domain') }} là đơn vị hàng đầu Việt Nam chuyên cung cấp các dịch vụ seeding tăng Like, Share, Comment, Follow... cho các Mạng xã hội như Facebook, Instagram, Tiktok ...">
    <meta name="keywords"
        content="dịch vụ mạng xã hội, dịch vụ facebook, dịch vụ instagram, dịch vụ tiktok, dịch vụ youtube, dịch vụ twitter, dịch vụ shopee, dịch vụ telegram">
    <title>Dịch Vụ FaceBook - ADSCODE</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ $site_config->getValueByName('favicon') }}" />
    <!-- STYLE CSS -->
    <link href="{{ asset('') }}lqh/app.css" rel="stylesheet" />
    <link href="{{ asset('') }}lqh/jquery.dataTables.css" rel="stylesheet" />

    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <!-- END: CSS Assets-->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">
</head>
<style>
    body {
        text-transform: capitalize;
    }

    .swal2-container {
        z-index: 99999 !important;
    }

    .swal2-title {
        line-height: 1.2;
    }

    .dataTables_wrapper .dataTables_filter {
        margin: 20px;
    }

    .dataTables_wrapper .dataTables_length {
        margin: 20px;
    }

    .dataTables_wrapper .dataTables_info {
        padding-top: 0em;
        margin: 15px;
    }

    .dataTables_wrapper .dataTables_paginate {
        padding-top: 0em;
        margin: 10px;
    }

    .dataTables_wrapper .dataTables_paginate .paginate_button.current,
    .dataTables_wrapper .dataTables_paginate .paginate_button.current:hover {
        color: #fff !important;
        border: none;
        background-color: #152F72;
        background: -webkit-gradient(linear, left top, left bottom, color-stop(0%, white), color-stop(100%, #dcdcdc));
        background: -webkit-linear-gradient(top, white 0%, #152F72 100%);
        background: -moz-linear-gradient(top, white 0%, #152F72 100%);
        background: -ms-linear-gradient(top, white 0%, #152F72 100%);
        background: -o-linear-gradient(top, white 0%, #152F72 100%);
        background: linear-gradient(to bottom, white 0%, #152F72 100%);
    }

    .dataTables_wrapper .dataTables_paginate .paginate_button {
        box-sizing: border-box;
        display: inline-block;
        min-width: 1.5em;
        padding: 0.2em 1em;
        margin-left: 2px;
        text-align: center;
        text-decoration: none !important;
        cursor: pointer;
        cursor: hand;
        color: #333 !important;
        border: 1px solid transparent;
        border-radius: 5px;
    }
</style>
<!-- END: Head -->

<body class="main">
    <!-- BEGIN: Mobile Menu -->
    <div class="mobile-menu md:hidden">
        <div class="mobile-menu-bar">
            <a href="{{ route('home') }}" class="flex mr-auto">
                {{-- <img alt="sbonline247.com" class="w-3/4"
                    src="https://sbonline247.com/temp-order/images/logo-sbonline247.png"> --}}
                <h1 style="color:white">HuyTheme</h1>
            </a>
            <a href="javascript:;" id="mobile-menu-toggler"> <svg xmlns="http://www.w3.org/2000/svg" width="24"
                    height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                    stroke-linecap="round" stroke-linejoin="round"
                    class="feather feather-bar-chart-2 w-8 h-8 text-white transform -rotate-90">
                    <line x1="18" y1="20" x2="18" y2="10"></line>
                    <line x1="12" y1="20" x2="12" y2="4"></line>
                    <line x1="6" y1="20" x2="6" y2="14"></line>
                </svg> </a>
        </div>
        <ul class="border-t border-theme-2 py-5 hidden" id="menu">
            <li>
                <a href="javascript:;.html" class="menu menu--active">
                    <div class="menu__icon">
                        <lord-icon src="https://cdn.lordicon.com/gmzxduhd.json" trigger="loop"
                            colors="primary:#fff,secondary:#08a88a" style="width:30px;height:30px">
                        </lord-icon>
                    </div>
                    <div class="menu__title"> Home <i data-feather="chevron-down"
                            class="menu__sub-icon transform rotate-180"></i></div>
                </a>
                <ul class="" id="side-menu__choose-mobile">
                    <li>
                        <a href="{{ route('home') }}" class="menu">
                            <div class="menu__icon">
                                <i data-feather="activity"></i>
                            </div>
                            <div class="menu__title">Trang Chủ</div>
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:;" class="menu">
                    <div class="menu__icon">
                        <lord-icon src="https://cdn.lordicon.com/nobciafz.json" trigger="loop"
                            colors="primary:#fff,secondary:#08a88a" style="width:30px;height:30px">
                        </lord-icon>
                    </div>
                    <div class="menu__title"> Profile <i data-feather="chevron-down" class="menu__sub-icon "></i></div>
                </a>
                <ul class="" id="side-menu__choose-mobile">
                    <li>
                        <a href="{{ route('profile') }}" class="menu">
                            <div class="menu__icon">
                                <i data-feather="activity"></i>
                            </div>
                            <div class="menu__title"> Hồ Sơ</div>
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:;" class="menu">
                    <div class="menu__icon">
                        <lord-icon src="https://cdn.lordicon.com/yeallgsa.json" trigger="loop"
                            colors="primary:#fff,secondary:#08a88a" style="width:30px;height:30px">
                        </lord-icon>
                    </div>
                    <div class="menu__title"> Payment <i data-feather="chevron-down" class="menu__sub-icon "></i>
                    </div>
                </a>
                <ul class="" id="side-menu__choose-mobile">
                    <li>
                        <a href="{{ route('banking') }}" class="menu">
                            <div class="menu__icon">
                                <i data-feather="activity"></i>
                            </div>
                            <div class="menu__title">Nạp Tiền</div>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="menu__devider my-6"></li>
            {{-- dịch vụ fb huycode --}}
            @if ($site_config->getValueByName('subgiare') == 'show')
                <li>
                    <a href="javascript:;" class="menu">
                        <div class="menu__icon">
                            <img src="{{ asset('huycode/images/client/facebook.png') }}" alt="facebook"
                                width="30px" height="30px">
                        </div>
                        <div class="menu__title"> Facebook <i data-feather="chevron-down"
                                class="menu__sub-icon "></i>
                        </div>
                    </a>
                    <ul class="">
                        <li>
                            <a href="javascript:;" class="menu">
                                <div class="menu__icon">
                                    <i data-feather="activity"></i>
                                </div>
                                <div class="menu__title"> Vip Facebook<i data-feather="chevron-down"
                                        class="menu__sub-icon "></i>
                                </div>
                            </a>
                            <ul class="" id="side-menu__choose-mobile">
                                <li>
                                    <a href="{{ route('service.facebook-v2', 'like-sale') }}" class="menu">
                                        <div class="menu__icon">
                                            <i data-feather="zap"></i>
                                        </div>
                                        <div class="menu__title"> Like Sale</div>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('service.facebook-v2', 'like-speed') }}" class="menu">
                                        <div class="menu__icon">
                                            <i data-feather="zap"></i>
                                        </div>
                                        <div class="menu__title"> Like Speed</div>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('service.facebook-v2', 'like-comment') }}" class="menu">
                                        <div class="menu__icon">
                                            <i data-feather="zap"></i>
                                        </div>
                                        <div class="menu__title"> Like Comment</div>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript:;" class="menu">
                                <div class="menu__icon">
                                    <i data-feather="activity"></i>
                                </div>
                                <div class="menu__title"> Follow Facebook<i data-feather="chevron-down"
                                        class="menu__sub-icon "></i>
                                </div>
                            </a>
                            <ul class="" id="side-menu__choose-mobile">
                                <li>
                                    <a href="{{ route('service.facebook-v2', 'sub-vip') }}" class="menu">
                                        <div class="menu__icon">
                                            <i data-feather="zap"></i>
                                        </div>
                                        <div class="menu__title"> Follow Vip</div>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('service.facebook-v2', 'sub-quality') }}" class="menu">
                                        <div class="menu__icon">
                                            <i data-feather="zap"></i>
                                        </div>
                                        <div class="menu__title"> Follow Quality</div>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('service.facebook-v2', 'sub-sale') }}" class="menu">
                                        <div class="menu__icon">
                                            <i data-feather="zap"></i>
                                        </div>
                                        <div class="menu__title"> Follow Sale</div>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('service.facebook-v2', 'sub-speed') }}" class="menu">
                                        <div class="menu__icon">
                                            <i data-feather="zap"></i>
                                        </div>
                                        <div class="menu__title"> Follow Speed</div>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript:;" class="menu">
                                <div class="menu__icon">
                                    <i data-feather="activity"></i>
                                </div>
                                <div class="menu__title"> Eyes Facebook <i data-feather="chevron-down"
                                        class="menu__sub-icon "></i>
                                </div>
                            </a>
                            <ul class="" id="side-menu__choose-mobile">
                                <li>
                                    <a href="{{ route('service.facebook-v2', 'eye-live') }}" class="menu">
                                        <div class="menu__icon">
                                            <i data-feather="zap"></i>
                                        </div>
                                        <div class="menu__title"> Eyes Live</div>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript:;" class="menu">
                                <div class="menu__icon">
                                    <i data-feather="activity"></i>
                                </div>
                                <div class="menu__title"> Comment Facebook <i data-feather="chevron-down"
                                        class="menu__sub-icon "></i>
                                </div>
                            </a>
                            <ul class="" id="side-menu__choose-mobile">
                                <li>
                                    <a href="{{ route('service.facebook-v2', 'comment-sale') }}" class="menu">
                                        <div class="menu__icon">
                                            <i data-feather="zap"></i>
                                        </div>
                                        <div class="menu__title"> Comment Sale</div>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('service.facebook-v2', 'comment-speed') }}" class="menu">
                                        <div class="menu__icon">
                                            <i data-feather="zap"></i>
                                        </div>
                                        <div class="menu__title"> Comment Speed</div>
                                    </a>
                                </li>

                            </ul>
                        </li>
                        <li>
                            <a href="javascript:;" class="menu">
                                <div class="menu__icon">
                                    <i data-feather="activity"></i>
                                </div>
                                <div class="menu__title"> Share Facebook <i data-feather="chevron-down"
                                        class="menu__sub-icon "></i>
                                </div>
                            </a>
                            <ul class="" id="side-menu__choose-mobile">
                                <li>
                                    <a href="{{ route('service.facebook-v2', 'share-profile') }}" class="menu">
                                        <div class="menu__icon">
                                            <i data-feather="zap"></i>
                                        </div>
                                        <div class="menu__title"> Share Profile</div>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript:;" class="menu">
                                <div class="menu__icon">
                                    <i data-feather="activity"></i>
                                </div>
                                <div class="menu__title"> View Video & Story <i data-feather="chevron-down"
                                        class="menu__sub-icon "></i>
                                </div>
                            </a>
                            <ul class="" id="side-menu__choose-mobile">
                                <li>
                                    <a href="{{ route('service.facebook-v2', 'view-video') }}" class="menu">
                                        <div class="menu__icon">
                                            <i data-feather="zap"></i>
                                        </div>
                                        <div class="menu__title"> View Video</div>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('service.facebook-v2', 'view-story') }}" class="menu">
                                        <div class="menu__icon">
                                            <i data-feather="zap"></i>
                                        </div>
                                        <div class="menu__title"> View Story </div>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript:;" class="menu">
                                <div class="menu__icon">
                                    <i data-feather="activity"></i>
                                </div>
                                <div class="menu__title"> Member Group <i data-feather="chevron-down"
                                        class="menu__sub-icon "></i>
                                </div>
                            </a>
                            <ul class="" id="side-menu__choose-mobile">
                                <li>
                                    <a href="{{ route('service.facebook-v2', 'member-group') }}" class="menu">
                                        <div class="menu__icon">
                                            <i data-feather="zap"></i>
                                        </div>
                                        <div class="menu__title"> Member Group</div>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
            @endif

            {{-- dịch vụ ig huycode --}}
            @if ($site_config->getValueByName('subgiare') == 'show')
                <li>
                    <a href="javascript:;" class="menu">
                        <div class="menu__icon">
                            <img src="{{ asset('huycode/images/client/instagram.png') }}" alt="instagram"
                                width="30px" height="30px">
                        </div>
                        <div class="menu__title"> Instagram <i data-feather="chevron-down"
                                class="menu__sub-icon "></i>
                        </div>
                    </a>
                    <ul class="">
                        <li>
                            <a href="javascript:;" class="menu">
                                <div class="menu__icon">
                                    <i data-feather="activity"></i>
                                </div>
                                <div class="menu__title"> Like Instagram<i data-feather="chevron-down"
                                        class="menu__sub-icon "></i>
                                </div>
                            </a>
                            <ul class="" id="side-menu__choose-mobile">
                                <li>
                                    <a href="{{ route('service.instagram-v2', 'like-post') }}" class="menu">
                                        <div class="menu__icon">
                                            <i data-feather="zap"></i>
                                        </div>
                                        <div class="menu__title"> Like Instagram</div>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript:;" class="menu">
                                <div class="menu__icon">
                                    <i data-feather="activity"></i>
                                </div>
                                <div class="menu__title"> Follow Instagram<i data-feather="chevron-down"
                                        class="menu__sub-icon "></i>
                                </div>
                            </a>
                            <ul class="" id="side-menu__choose-mobile">
                                <li>
                                    <a href="{{ route('service.instagram-v2', 'follow') }}" class="menu">
                                        <div class="menu__icon">
                                            <i data-feather="zap"></i>
                                        </div>
                                        <div class="menu__title"> Tăng Follow</div>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
            @endif
            {{-- dịch vụ tiktok huycode --}}
            @if ($site_config->getValueByName('subgiare') == 'show')
                <li>
                    <a href="javascript:;" class="menu">
                        <div class="menu__icon">
                            <img src="{{ asset('huycode/images/client/tiktok.png') }}" alt="tiktok" width="30px"
                                height="30px">
                        </div>
                        <div class="menu__title"> TikTok <i data-feather="chevron-down" class="menu__sub-icon "></i>
                        </div>
                    </a>
                    <ul class="">
                        <li>
                            <a href="javascript:;" class="menu">
                                <div class="menu__icon">
                                    <i data-feather="activity"></i>
                                </div>
                                <div class="menu__title"> Like Tiktok<i data-feather="chevron-down"
                                        class="menu__sub-icon "></i>
                                </div>
                            </a>
                            <ul class="" id="side-menu__choose-mobile">
                                <li>
                                    <a href="{{ route('service.tiktok-v2', 'like') }}" class="menu">
                                        <div class="menu__icon">
                                            <i data-feather="zap"></i>
                                        </div>
                                        <div class="menu__title"> Tăng Tym</div>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript:;" class="menu">
                                <div class="menu__icon">
                                    <i data-feather="activity"></i>
                                </div>
                                <div class="menu__title"> Follow Tiktok<i data-feather="chevron-down"
                                        class="menu__sub-icon "></i>
                                </div>
                            </a>
                            <ul class="" id="side-menu__choose-mobile">
                                <li>
                                    <a href="{{ route('service.tiktok-v2', 'sub') }}" class="menu">
                                        <div class="menu__icon">
                                            <i data-feather="zap"></i>
                                        </div>
                                        <div class="menu__title"> Tăng Follow</div>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript:;" class="menu">
                                <div class="menu__icon">
                                    <i data-feather="activity"></i>
                                </div>
                                <div class="menu__title"> Comment Tiktok<i data-feather="chevron-down"
                                        class="menu__sub-icon "></i>
                                </div>
                            </a>
                            <ul class="" id="side-menu__choose-mobile">
                                <li>
                                    <a href="{{ route('service.tiktok-v2', 'comment') }}" class="menu">
                                        <div class="menu__icon">
                                            <i data-feather="zap"></i>
                                        </div>
                                        <div class="menu__title"> Tăng Comment</div>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript:;" class="menu">
                                <div class="menu__icon">
                                    <i data-feather="activity"></i>
                                </div>
                                <div class="menu__title"> View Tiktok<i data-feather="chevron-down"
                                        class="menu__sub-icon "></i>
                                </div>
                            </a>
                            <ul class="" id="side-menu__choose-mobile">
                                <li>
                                    <a href="{{ route('service.tiktok-v2', 'view') }}" class="menu">
                                        <div class="menu__icon">
                                            <i data-feather="zap"></i>
                                        </div>
                                        <div class="menu__title"> Tăng View</div>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript:;" class="menu">
                                <div class="menu__icon">
                                    <i data-feather="activity"></i>
                                </div>
                                <div class="menu__title">Share Tiktok<i data-feather="chevron-down"
                                        class="menu__sub-icon "></i>
                                </div>
                            </a>
                            <ul class="" id="side-menu__choose-mobile">
                                <li>
                                    <a href="{{ route('service.tiktok-v2', 'share') }}" class="menu">
                                        <div class="menu__icon">
                                            <i data-feather="zap"></i>
                                        </div>
                                        <div class="menu__title"> Tăng Share</div>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
            @endif
            {{-- dịch vụ youtube huycode --}}
            <li>
                <a href="javascript:;" class="menu">
                    <div class="menu__icon">
                        <img src="{{ asset('huycode/images/client/youtube.png') }}" alt="youtube" width="30px"
                            height="30px">
                    </div>
                    <div class="menu__title"> Youtube <i data-feather="chevron-down" class="menu__sub-icon "></i>
                    </div>
                </a>
                <ul class="">
                    <li>
                        <a href="javascript:;" class="menu">
                            <div class="menu__icon">
                                <i data-feather="activity"></i>
                            </div>
                            <div class="menu__title"> Watch Youtube<i data-feather="chevron-down"
                                    class="menu__sub-icon "></i>
                            </div>
                        </a>
                        <ul class="" id="side-menu__choose-mobile">
                            <li>
                                <a href="#" class="menu">
                                    <div class="menu__icon">
                                        <i data-feather="zap"></i>
                                    </div>
                                    <div class="menu__title"> Watch V1</div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;" class="menu">
                            <div class="menu__icon">
                                <i data-feather="activity"></i>
                            </div>
                            <div class="menu__title"> Follow Youtube<i data-feather="chevron-down"
                                    class="menu__sub-icon "></i>
                            </div>
                        </a>
                        <ul class="" id="side-menu__choose-mobile">
                            <li>
                                <a href="#" class="menu">
                                    <div class="menu__icon">
                                        <i data-feather="zap"></i>
                                    </div>
                                    <div class="menu__title"> Follow V1</div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;" class="menu">
                            <div class="menu__icon">
                                <i data-feather="activity"></i>
                            </div>
                            <div class="menu__title"> Comment Youtube<i data-feather="chevron-down"
                                    class="menu__sub-icon "></i>
                            </div>
                        </a>
                        <ul class="" id="side-menu__choose-mobile">
                            <li>
                                <a href="#" class="menu">
                                    <div class="menu__icon">
                                        <i data-feather="zap"></i>
                                    </div>
                                    <div class="menu__title"> Comment V1</div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;" class="menu">
                            <div class="menu__icon">
                                <i data-feather="activity"></i>
                            </div>
                            <div class="menu__title"> View Youtube<i data-feather="chevron-down"
                                    class="menu__sub-icon "></i>
                            </div>
                        </a>
                        <ul class="" id="side-menu__choose-mobile">
                            <li>
                                <a href="#" class="menu">
                                    <div class="menu__icon">
                                        <i data-feather="zap"></i>
                                    </div>
                                    <div class="menu__title"> View V1</div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;" class="menu">
                            <div class="menu__icon">
                                <i data-feather="activity"></i>
                            </div>
                            <div class="menu__title"> Like Youtube<i data-feather="chevron-down"
                                    class="menu__sub-icon "></i>
                            </div>
                        </a>
                        <ul class="" id="side-menu__choose-mobile">
                            <li>
                                <a href="#" class="menu">
                                    <div class="menu__icon">
                                        <i data-feather="zap"></i>
                                    </div>
                                    <div class="menu__title"> Like V1</div>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
            {{-- dịch vụ Twitter huycode --}}
            <li>
                <a href="javascript:;" class="menu">
                    <div class="menu__icon">
                        <img src="{{ asset('huycode/images/client/twitter.png') }}" alt="twitter" width="30px"
                            height="30px">
                    </div>
                    <div class="menu__title"> Twitter <i data-feather="chevron-down" class="menu__sub-icon "></i>
                    </div>
                </a>
                <ul class="">
                    <li>
                        <a href="javascript:;" class="menu">
                            <div class="menu__icon">
                                <i data-feather="activity"></i>
                            </div>
                            <div class="menu__title"> Follow Twitter<i data-feather="chevron-down"
                                    class="menu__sub-icon "></i>
                            </div>
                        </a>
                        <ul class="" id="side-menu__choose-mobile">
                            <li>
                                <a href="#" class="menu">
                                    <div class="menu__icon">
                                        <i data-feather="zap"></i>
                                    </div>
                                    <div class="menu__title"> Follow V1</div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;" class="menu">
                            <div class="menu__icon">
                                <i data-feather="activity"></i>
                            </div>
                            <div class="menu__title"> View Twitter<i data-feather="chevron-down"
                                    class="menu__sub-icon "></i>
                            </div>
                        </a>
                        <ul class="" id="side-menu__choose-mobile">
                            <li>
                                <a href="#" class="menu">
                                    <div class="menu__icon">
                                        <i data-feather="zap"></i>
                                    </div>
                                    <div class="menu__title"> View V1</div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;" class="menu">
                            <div class="menu__icon">
                                <i data-feather="activity"></i>
                            </div>
                            <div class="menu__title"> Like Twitter<i data-feather="chevron-down"
                                    class="menu__sub-icon "></i>
                            </div>
                        </a>
                        <ul class="" id="side-menu__choose-mobile">
                            <li>
                                <a href="#" class="menu">
                                    <div class="menu__icon">
                                        <i data-feather="zap"></i>
                                    </div>
                                    <div class="menu__title"> Like V1</div>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
            {{-- dịch vụ Shopee huycode --}}
            <li>
                <a href="javascript:;" class="menu">
                    <div class="menu__icon">
                        <img src="{{ asset('huycode/images/client/shopee.png') }}" alt="shopee" width="30px"
                            height="30px">
                    </div>
                    <div class="menu__title"> Shopee <i data-feather="chevron-down" class="menu__sub-icon "></i>
                    </div>
                </a>
                <ul class="">
                    <li>
                        <a href="javascript:;" class="menu">
                            <div class="menu__icon">
                                <i data-feather="activity"></i>
                            </div>
                            <div class="menu__title"> Follow Shopee<i data-feather="chevron-down"
                                    class="menu__sub-icon "></i>
                            </div>
                        </a>
                        <ul class="" id="side-menu__choose-mobile">
                            <li>
                                <a href="#" class="menu">
                                    <div class="menu__icon">
                                        <i data-feather="zap"></i>
                                    </div>
                                    <div class="menu__title"> Follow V1</div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;" class="menu">
                            <div class="menu__icon">
                                <i data-feather="activity"></i>
                            </div>
                            <div class="menu__title"> Like Shopee<i data-feather="chevron-down"
                                    class="menu__sub-icon "></i>
                            </div>
                        </a>
                        <ul class="" id="side-menu__choose-mobile">
                            <li>
                                <a href="#" class="menu">
                                    <div class="menu__icon">
                                        <i data-feather="zap"></i>
                                    </div>
                                    <div class="menu__title"> Like V1</div>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
            {{-- dịch vụ Telegram huycode --}}
            <li>
                <a href="javascript:;" class="menu">
                    <div class="menu__icon">
                        <img src="{{ asset('huycode/images/client/telegram.png') }}" alt="telegram" width="30px"
                            height="30px">
                    </div>
                    <div class="menu__title"> Telegram <i data-feather="chevron-down" class="menu__sub-icon "></i>
                    </div>
                </a>
                <ul class="">
                    <li>
                        <a href="javascript:;" class="menu">
                            <div class="menu__icon">
                                <i data-feather="activity"></i>
                            </div>
                            <div class="menu__title"> Member Telegram<i data-feather="chevron-down"
                                    class="menu__sub-icon "></i>
                            </div>
                        </a>
                        <ul class="" id="side-menu__choose-mobile">
                            <li>
                                <a href="#" class="menu">
                                    <div class="menu__icon">
                                        <i data-feather="zap"></i>
                                    </div>
                                    <div class="menu__title"> Member V1</div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;" class="menu">
                            <div class="menu__icon">
                                <i data-feather="activity"></i>
                            </div>
                            <div class="menu__title"> View Telegram<i data-feather="chevron-down"
                                    class="menu__sub-icon "></i>
                            </div>
                        </a>
                        <ul class="" id="side-menu__choose-mobile">
                            <li>
                                <a href="#" class="menu">
                                    <div class="menu__icon">
                                        <i data-feather="zap"></i>
                                    </div>
                                    <div class="menu__title"> View V1</div>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
            {{-- Kết Nối API --}}
            <li>
                <a href="javascript:;" class="menu">
                    <div class="menu__icon">
                        <img src="{{ asset('huycode/images/client/code.png') }}" alt="telegram" width="30px"
                            height="30px">
                    </div>
                    <div class="menu__title"> Kết Nối API
                    </div>
                </a>

            </li>
            {{-- admin lê quóc huy --}}
            @if (Auth::user()->level == 'admin')
                <li>
                    <a href="{{ route('admin.index') }}" class="menu">
                        <div class="menu__icon">
                            <img src="{{ asset('huycode/images/client/user (1).png') }}" alt="admin"
                                width="30px" height="30px">
                        </div>
                        <div class="menu__title"> Trang quản trị
                        </div>
                    </a>

                </li>
            @endif
            {{-- end Bản Quyền Huycode !! --}}
        </ul>
    </div>

    <?php
    // public function getMbBank(Request $request)
    // {
    //     $url = "http://".$_SERVER['SERVER_NAME']."/api/mbbank";
    //     $ch = curl_init();
    //     curl_setopt($ch, CURLOPT_URL, $url);
    //     curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    //     curl_setopt($ch, CURLOPT_HEADER, 0);
    //     $result = json_decode(curl_exec($ch), true);
    //     curl_close($ch);
    //     return $result;
    // }
    // $list = getMbBank();
    // for ($i=0; $i < count($list); $i++) {
    //     $type = $list[$i]['type'];
    //     if ($type == '+') {
    //         $body = $list[$i]['body'];
    //         $creditAmount = $list[$i]['creditAmount'];
    //         $content = $list[$i]['description'];
    //         $time = $list[$i]['transactionDate'];
    //         $transid = $list[$i]['transactionId'];
    //         $mess =  $site_config->getValueByName('transfer_code').Auth::user()->id;
    //         if ($creditAmount == 0) {
    //             continue;
    //         } elseif ($creditAmount >= $min_bank && strpos($content, $mess) !== false) {
    //             $checkMgd = history_bank::where('transid', $transid)->first();
    //             if ($checkMgd) {
    //                 continue;
    //             } else {
    //                 $user = User::find($iduser);
    //                 if (!$user) {
    //                     continue;
    //                 } else {
    //                     $new_money = $user->money + $creditAmount;
    //                     $new_total_charge = $user->total_charge + $creditAmount;
    //                     $user->money = $new_money;
    //                     $user->total_charge = $new_total_charge;
    //                     $user->save();
    //                     history_bank::create([
    //                         'username' => $user->username,
    //                         'transid' => $refNo,
    //                         'thucnhan' => $creditAmount,
    //                         'type' => 'banking',
    //                         'bank_name' => 'mbbank',
    //                         'status' => 'Success',
    //                         'name' => $user->username,
    //                         'created_at' => Carbon::now(),
    //                         'updated_at' => Carbon::now()
    //                     ]);
    //                     account_history::create([
    //                         'username' => $user->username,
    //                         'content' => 'Bạn đã nạp tiền từ ngân hàng Mb với số tiền là: ' . $creditAmount . ' VNĐ',
    //                         'created_at' => Carbon::now(),
    //                     ]);
    //                     return true;
    //                 }
    //             }
    //         } else {
    //             return response()->json(['error' => 'Không hợp lệ'], 200);
    //         }
    //     }
    // }
    ?>
