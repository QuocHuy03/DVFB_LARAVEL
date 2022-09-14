@inject('site_config', 'App\Models\site_config')
<!DOCTYPE html>

<html lang="en" class="light">
<!-- BEGIN: Head -->

<head>
    <meta charset="utf-8">
    <!-- FAVICON -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ $site_config->getValueByName('favicon') }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description"
        content="SBO là đơn vị hàng đầu Việt Nam chuyên cung cấp các dịch vụ seeding tăng Like, Share, Comment, Follow... cho các Mạng xã hội như Facebook, Instagram, Tiktok ...">
    <meta name="keywords"
        content="dịch vụ mạng xã hội, dịch vụ facebook, dịch vụ instagram, dịch vụ tiktok, dịch vụ youtube, dịch vụ twitter, dịch vụ shopee, dịch vụ telegram">
    <title>Đăng Nhập - QuocHuyCode</title>
    <!-- STYLE CSS -->
    <link rel="stylesheet" href="{{ asset('') }}temp-order/css/app.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    {{-- SCRIPT --}}
    <!-- END: CSS Assets-->
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




<body class="login">
    <div class="container sm:px-10">
        <div class="block xl:grid grid-cols-2 gap-4">
            <!-- BEGIN: Login Info -->
            <div class="hidden xl:flex flex-col min-h-screen">
                <a href="" class="-intro-x flex items-center pt-5">
                    <img alt="sbgroup-img" class="w-2/4"
                        src="https://sbonline247.com/temp-order/images/logo-sbgroup.png">

                </a>
                <div class="my-auto">
                    <img alt="image" class="-intro-x w-1/2 -mt-16"
                        src="{{ asset('') }}huycode/images/illustration.svg">
                    <div class="-intro-x text-white font-medium text-4xl leading-tight mt-10">
                        ADSCODE.NET
                    </div>
                    <div class="-intro-x mt-5 text-lg text-white text-opacity-70 dark:text-gray-500">ADS là đơn vị
                        hàng
                        đầu Việt Nam chuyên cung cấp các dịch vụ seeding tăng Like , Share , Comment , Follow... cho các
                        Mạng xã hội như Facebook , Instagram , Tiktok ...</div>
                </div>
            </div>
            <!-- END: Login Info -->
            <form action="{{ route('auth.register.post') }}" method="post">
                @csrf
                <div class="h-screen xl:h-auto flex py-5 xl:py-0 my-auto xl:my-0">
                    <div
                        class="my-auto mx-auto xl:ml-20 bg-white dark:bg-dark-1 xl:bg-transparent px-5 sm:px-8 py-8 xl:p-0 rounded-md shadow-md xl:shadow-none w-full sm:w-3/4 lg:w-2/4 xl:w-auto mt-5">
                        <h2 class="intro-x font-bold text-2xl xl:text-3xl text-center xl:text-left">
                            Đăng Ký
                        </h2>
                        <div class="intro-x mt-2 text-gray-500 dark:text-gray-500 xl:hidden text-center">ADS là đơn
                            vị
                            hàng đầu
                            Việt Nam chuyên cung cấp các dịch vụ seeding tăng Like, Share, Comment, Follow... cho các
                            Mạng xã
                            hội như Facebook, Instagram, Tiktok ...
                        </div>

                        <div class="intro-x mt-8">
                            @if (session('error'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <span class="alert-inner--text">{{ session('error') }}</span>
                                    <button type="button" class="btn-close" style="top: 7px" data-bs-dismiss="alert"
                                        aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                            @elseif(session('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <span class="alert-inner--text"> {{ session('success') }}</span>
                                    <button type="button" class="btn-close" style="top: 7px" data-bs-dismiss="alert"
                                        aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                            @endif
                            <input type="text" name="name" id="name"
                                class="intro-x login__input form-control py-3 px-4 border-gray-300 block mt-4"
                                placeholder="Họ và tên" value="{{ Request::old('name') }}">
                            <input type="text" name="username" id="username"
                                class="intro-x login__input form-control py-3 px-4 border-gray-300 block mt-4"
                                placeholder="Tên tài khoản" value="{{ Request::old('username') }}">
                            <input type="email" name="email" id="email"
                                class="intro-x login__input form-control py-3 px-4 border-gray-300 block mt-4"
                                placeholder="Địa chỉ email" value="{{ Request::old('email') }}">
                            <input type="number" name="number" id="number"
                                class="intro-x login__input form-control py-3 px-4 border-gray-300 block mt-4"
                                placeholder="Số điện thoại" value="{{ Request::old('number') }}">
                            <input type="text" name="fb_id" id="idpost" onchange="getIDPOST()"
                                class="intro-x login__input form-control py-3 px-4 border-gray-300 block mt-4"
                                placeholder="Links Facebook của bạn" value="{{ Request::old('uid') }}">
                            <input type="password" name="password" id="password"
                                class="intro-x login__input form-control py-3 px-4 border-gray-300 block mt-4"
                                placeholder="Mật khẩu">
                            <input type="password" name="password_confirmation" id="password_confirmation"
                                class="intro-x login__input form-control py-3 px-4 border-gray-300 block mt-4"
                                placeholder="Nhập lại mật khẩu">
                            <input type="text" name="referral_code" id="referral_code"
                                class="intro-x login__input form-control py-3 px-4 border-gray-300 block mt-4"
                                placeholder="Mã giới thiệu (nếu có)">
                        </div>
                        <div
                            class="intro-x flex items-center text-gray-700 dark:text-gray-600 mt-4 text-xs sm:text-sm">
                            <input id="remember-me" type="checkbox" class="form-check-input border mr-2" required>
                            <label class="cursor-pointer select-none" for="remember-me">Tôi hoàn toàn đồng ý
                                với</label>
                            <a class="text-theme-17 dark:text-gray-300 ml-1" href="">Chính sách & Bảo mật quyền
                                riêng tư</a>.
                        </div>
                        <div class="intro-x mt-5 xl:mt-8 text-center xl:text-left">
                            <button type="submit" id="btnSubmit"
                                class="btn btn-primary py-3 px-4 w-full xl:w-32 xl:mr-3 align-top">Đăng kí
                            </button>
                            <a class="btn btn-outline-secondary py-3 px-4 w-full xl:w-32 mt-3 xl:mt-0 align-top"
                                href="{{ route('auth.login') }}">Đăng Nhập</a>
                        </div>
                    </div>
                </div>
            </form>

            <!-- END: Signup Form -->
        </div>
    </div>


    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="{{ asset('') }}lqh/toastr.css" />
    <script src="{{ asset('') }}lqh/toastr.min.js"></script>
    <link rel="stylesheet" href="{{ asset('') }}lqh/dist/sweetalert2.min.css" />
    <script src="{{ asset('') }}lqh/dist/sweetalert2.all.min.js"></script>
    <script src="{{ asset('huycode/js/ajax-huycode.js?') }}{{ time() }}"></script>

    <!-- BEGIN: Dark Mode Switcher-->




    <!-- END: Dark Mode Switcher-->
    <!-- BEGIN: JS Assets-->
    <div id="notifications-modal" class="modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- BEGIN: Modal Header -->
                <div class="modal-header">
                    <h2 class="font-medium text-base mr-auto">
                        HƯỚNG DẪN CÁCH LẤY LẠI QUYỀN TRUY CẬP TÀI KHOẢN SAU BIG UPDATE WEBSITE
                    </h2>
                </div>
                <!-- END: Modal Header -->
                <!-- BEGIN: Modal Body -->
                <div class="modal-body grid grid-cols-12 gap-4 gap-y-3">
                    <div class="col-span-12 sm:col-span-12">
                        <p>
                            <font color="#0000ff"><b>Để lấy lại quyền truy cập tại hệ thống mới , quý đối tác vui lòng
                                    làm theo bước sau (bắt buộc):
                                </b></font>
                        </p>
                        <p>- <b>
                                <font color="#ff0000">Bước 1</font>
                            </b> : Tại trang đăng nhập quý đối tác vui lòng chọn mục <b>
                                <font color="#0000ff">quên mật khẩu</font>
                            </b> .</p>
                        <p>
                            - <b>
                                <font color="#ff0000">Bước 2</font>
                            </b> : nhập email và tài khoản nick rồi ấn <b>
                                <font color="#0000ff">gửi xác thực
                                </font>
                            </b></p>
                        <p>- <b>
                                <font color="#ff0000">Bước 3</font>
                            </b> : Đợi trong vòng 1 phút , hệ thống sẽ gửi email thông báo yêu cầu đặt lại mật khẩu
                            -&gt; ấn dòng chữ <b>
                                <font color="#0000ff">Kích hoạt tài khoản (Nhấp vào đây)</font>
                            </b> để đến trang đặt lại mật khẩu</p>
                        <p>
                            - <b>
                                <font color="#ff0000">Bước 4</font>
                            </b> : Sau khi đặt lại mật khẩu thành công , quý đối tác sẽ phải <b>
                                <font color="#0000ff">điền đầy đủ thông tin (email , số điện thoại , links facebook
                                    chính chủ)</font>
                            </b> để tiện lấy lại mật khẩu khi lỡ may quên</p>
                        <p>
                            - <b>
                                <font color="#ff0000">Bước 5</font>
                            </b> : Sau khi ấn <b>
                                <font color="#0000ff">Cập nhật</font>
                            </b> quý đối tác sẽ có thể trải nghiệm tất cả dịch vụ tại hệ thống</p>
                        <p>
                            - <b>
                                <font color="#ff0000">Vui lòng liên hệ zalo nếu bạn gặp lỗi</font>
                            </b> : <b>
                                <font color="#0000ff">090.196.1341</font>
                            </b></p>
                        </p>
                    </div>
                </div>
                <!-- END: Modal Body -->
                <!-- BEGIN: Modal Footer -->
                <div class="modal-footer text-center">
                    <button class="btn btn-primary w-20" type="button" title="comfirm" data-dismiss="modal">
                        Đã rõ
                    </button>
                </div>
                <!-- END: Modal Footer -->
            </div>
        </div>
    </div>

    <!-- jQuery -->
    {{-- <script type="text/javascript">
        function getHighestZindex() {
            let zIndex = 9999;
            $(".modal").each(function() {
                if (
                    $(this).css("z-index") !== "auto" &&
                    $(this).css("z-index") > zIndex
                ) {
                    zIndex = parseInt($(this).css("z-index"));
                }
            });

            return zIndex;
        }

        // Get scrollbar width
        function getScrollbarWidth(el) {
            return window.innerWidth - $(el)[0].clientWidth;
        }

        function show(el) {
            let events = [];
            if (!$("[data-modal-replacer='" + $(el).attr("id") + "']").length) {
                // Move modal element to body
                $(
                    '<div data-modal-replacer="' + $(el).attr("id") + '"></div>'
                ).insertAfter(el);
                $(el).css({
                    "margin-top": 0,
                    "margin-left": 0,
                });
                $(el).attr("aria-hidden", false).appendTo("body");

                // Show modal by highest z-index
                setTimeout(() => {
                    $(el)
                        .addClass("show")
                        .css("z-index", getHighestZindex() + 1);
                }, 200);

                // Setting up modal scroll
                $("body")
                    .css(
                        "padding-right",
                        parseInt($("body").css("padding-right")) +
                        getScrollbarWidth("html") +
                        "px"
                    )
                    .addClass("overflow-y-hidden");
                $(".modal").removeClass("overflow-y-auto").css("padding-left", "0px");
                $(el)
                    .addClass("overflow-y-auto")
                    .css("padding-left", getScrollbarWidth(el) + "px")
                    .addClass($(".modal.show").length ? "modal-overlap" : "");

                // Trigger callback function
                events.forEach(function(val, key) {
                    if (
                        $(el).attr("id") == $(val.el).attr("id") &&
                        val.event == "on.show"
                    ) {
                        events[key].triggerCallback = true;
                    }
                });
            }
        }

        window.onload = show(document.getElementById('notifications-modal'));
    </script> --}}
    <script src="{{ asset('') }}huycode/js/app.js"></script>


    <!-- END: JS Assets-->
</body>

</html>
