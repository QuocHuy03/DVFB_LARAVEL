@extends('app')
@section('content')
    <!-- BEGIN: Content -->
    <div class="content">
        <div class="grid grid-cols-12 gap-6">
            <div class="col-span-12 2xl:col-span-12">
                <div class="grid grid-cols-12 gap-6">
                    <!-- BEGIN: General Report -->
                    <div class="col-span-12 mt-8">
                        <div class="intro-y flex items-center h-10">
                            <h2 class="text-lg font-medium truncate mr-5">
                                Thống kê
                            </h2>
                            <a href="" class="ml-auto flex items-center text-theme-26 dark:text-theme-33">
                                <lord-icon src="https://cdn.lordicon.com/nxaaasqe.json" trigger="loop"
                                    colors="primary:#121331,secondary:#08a88a" style="width:25px;height:25px"
                                    class="w-4 h-4 mr-3">
                                </lord-icon> Reload Data
                            </a>
                        </div>
                        <div class="grid grid-cols-12 gap-6 mt-5">
                            <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                                <div class="report-box zoom-in">
                                    <div class="box p-5">
                                        <div class="flex">
                                            <lord-icon src="https://cdn.lordicon.com/slkvcfos.json" trigger="loop"
                                                colors="primary:#121331,secondary:#08a88a" style="width:45px;height:45px">
                                            </lord-icon>
                                            <div class="ml-auto">
                                                <div class="report-box__indicator bg-theme-10 tooltip cursor-pointer"
                                                    title="33% Higher than last month"> 33% <i data-feather="chevron-up"
                                                        class="w-4 h-4 ml-0.5"></i></div>
                                            </div>
                                        </div>
                                        <div class="text-2xl font-medium leading-8 mt-4">
                                            {{ $orders }}
                                        </div>
                                        <div class="text-base text-gray-600 mt-1">Tổng đơn hàng đã cài</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                                <div class="report-box zoom-in">
                                    <div class="box p-5">
                                        <div class="flex">
                                            {{-- <i data-feather="credit-card" class="report-box__icon text-theme-22"></i> --}}

                                            <lord-icon src="https://cdn.lordicon.com/vaeagfzc.json" trigger="loop"
                                                colors="primary:#405189,secondary:#0ab39c" style="width:45px;height:45px">
                                            </lord-icon>

                                            <div class="ml-auto">
                                                <div class="report-box__indicator bg-theme-24 tooltip cursor-pointer"
                                                    title="2% Lower than last month"> 2% <i data-feather="chevron-down"
                                                        class="w-4 h-4 ml-0.5"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-2xl font-medium leading-8 mt-4">
                                            {{ number_format(Auth::user()->money) }}
                                            đ
                                        </div>
                                        <div class="text-base text-gray-600 mt-1">Số dư</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                                <div class="report-box zoom-in">
                                    <div class="box p-5">
                                        <div class="flex">
                                            {{-- <i data-feather="monitor" class="report-box__icon text-theme-23"></i> --}}
                                            <lord-icon src="https://cdn.lordicon.com/qhviklyi.json" trigger="loop"
                                                colors="primary:#405189,secondary:#0ab39c" style="width:45px;height:45px">
                                            </lord-icon>
                                            <div class="ml-auto">
                                                <div class="report-box__indicator bg-theme-10 tooltip cursor-pointer"
                                                    title="12% Higher than last month"> 12% <i data-feather="chevron-up"
                                                        class="w-4 h-4 ml-0.5"></i></div>
                                            </div>
                                        </div>
                                        <div class="text-2xl font-medium leading-8 mt-4">
                                            {{ number_format(Auth::user()->total_charge) }}
                                            đ
                                        </div>
                                        <div class="text-base text-gray-600 mt-1">Tổng nạp</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                                <div class="report-box zoom-in">
                                    <div class="box p-5">
                                        <div class="flex">
                                            {{-- <i data-feather="user" class="report-box__icon text-theme-10"></i> --}}

                                            <lord-icon src="https://cdn.lordicon.com/dxjqoygy.json" trigger="loop"
                                                colors="primary:#121331,secondary:#08a88a" style="width:45px;height:45px">
                                            </lord-icon>
                                            <div class="ml-auto">
                                                <div class="report-box__indicator bg-theme-10 tooltip cursor-pointer"
                                                    title="22% Higher than last month"> 22% <i data-feather="chevron-up"
                                                        class="w-4 h-4 ml-0.5"></i></div>
                                            </div>
                                        </div>
                                        <div class="text-2xl font-medium leading-8 mt-4">
                                            @if (Auth::user()->level == 'member')
                                                <span class="text-success">Thành viên</span>
                                            @elseif (Auth::user()->level == 'DL')
                                                <span class="text-info">Đại lý</span>
                                            @elseif (Auth::user()->level == 'NPP')
                                                <span class="text-warning">Nhà phân phối</span>
                                            @elseif (Auth::user()->level == 'admin')
                                                <span class="text-danger">Quản trị viên</span>
                                            @endif
                                        </div>
                                        <div class="text-base text-gray-600 mt-1">Chức vụ</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END: General Report -->
                        <div class="intro-y grid grid-cols-12 gap-6 mt-10">
                            <!-- BEGIN: Blog Layout -->
                            <div class="intro-y col-span-12 md:col-span-6 xl:col-span-7">
                                <div class="intro-y col-span-12 md:col-span-6 xl:col-span-4">
                                    <div class="intro-x flex items-center h-10">
                                        <h2 class="text-lg font-medium truncate mr-5">
                                            Thông báo hệ thống
                                        </h2>
                                    </div>
                                    <div class="mt-5" id="notification-systems">
                                        <div class="intro-x box mb-3">
                                            @foreach ($notice as $item)
                                                <div
                                                    class="flex items-center border-b border-gray-200 dark:border-dark-5 px-5 py-4">
                                                    <div class="w-10 h-10 flex-none image-fit">
                                                        <img alt="Logo" class="rounded-full"
                                                            src="{{ asset('huycode/images/users/admin.png') }}">
                                                    </div>
                                                    <div class="ml-3 mr-auto">
                                                        <a href="" class="font-medium">ADSCCODE</a>
                                                        <div class="flex text-gray-600 truncate text-xs mt-0.5"><a
                                                                class="text-theme-17 dark:text-gray-500 inline-block truncate"
                                                                href="">Quản trị viên</a> <span
                                                                class="mx-1">•</span>{{ $item->created_at }}
                                                        </div>
                                                    </div>
                                                    <div class="dropdown ml-3">
                                                        <a href="javascript:;"
                                                            class="dropdown-toggle w-5 h-5 text-gray-600 dark:text-gray-300"
                                                            aria-expanded="false"> <i data-feather="more-vertical"
                                                                class="w-4 h-4"></i> </a>
                                                        <div class="dropdown-menu w-40">
                                                            <div class="dropdown-menu__content box dark:bg-dark-1 p-2">
                                                                <a href=""
                                                                    class="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md">
                                                                    <i data-feather="edit-2" class="w-4 h-4 mr-2"></i>
                                                                    Edit
                                                                    Post </a>
                                                                <a href=""
                                                                    class="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md">
                                                                    <i data-feather="trash" class="w-4 h-4 mr-2"></i>
                                                                    Delete
                                                                    Post </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="p-5">
                                                    <a href="" class="block font-medium text-base mt-5">THÔNG TIN
                                                        HỖ
                                                        TRỢ HỆ THỐNG</a>
                                                    <div class="text-gray-700 dark:text-gray-600 mt-2">
                                                        <p>Nếu quý đối tác có vấn đề gì cần hỗ trợ thì hãy join vào nhóm
                                                            chát
                                                            zalo của hệ thống để cập nhật thông tin mới được nhanh nhất
                                                            :<b>&nbsp;<a href="https://zalo.me/g/ymiatv582"
                                                                    target="_blank">
                                                                    <font color="#9c00ff">https://zalo.me/g/ymiatv582
                                                                    </font>
                                                                </a></b></p>
                                                        <p>Hoặc liên hệ hỗ trợ zalo : <b>
                                                                <font color="#ff0000">090.196.1341</font>
                                                            </b></p>
                                                        <p>Kính chúc quý đối tác sức khỏe dồi dào , làm ăn phát tài phát lộc
                                                        </p>
                                                    </div>
                                                </div>

                                                <div
                                                    class="flex items-center px-5 py-3 border-t border-gray-200 dark:border-dark-5">
                                                    <div class="intro-x flex mr-2">
                                                        <div class="intro-x w-8 h-8 image-fit">
                                                            <img alt="profile-1"
                                                                class="rounded-full border border-white zoom-in tooltip"
                                                                src="{{ asset('huycode/images/users/gai1.jpg') }}"
                                                                title="Robert De Niro">
                                                        </div>
                                                        <div class="intro-x w-8 h-8 image-fit -ml-4">
                                                            <img alt="profile-2"
                                                                class="rounded-full border border-white zoom-in tooltip"
                                                                src="{{ asset('huycode/images/users/gai2.jpg') }}"
                                                                title="Denzel Washington">
                                                        </div>
                                                        <div class="intro-x w-8 h-8 image-fit -ml-4">
                                                            <img alt="profile-3"
                                                                class="rounded-full border border-white zoom-in tooltip"
                                                                src="{{ asset('huycode/images/users/gai3.jpg') }}"
                                                                title="Nicolas Cage">
                                                        </div>
                                                    </div>
                                                    <a href="https://www.facebook.com/lqh.coder"
                                                        class="intro-x w-8 h-8 flex items-center justify-center rounded-full bg-theme-31 dark:bg-dark-5 dark:text-gray-300 text-theme-26 ml-auto tooltip"
                                                        title="facebook"> <img alt="facebook"
                                                            class="rounded-full border border-white zoom-in tooltip"
                                                            src="{{ asset('huycode/images/users/facebook.png') }}"
                                                            title="Facebook"> </a>
                                                </div>
                                                <div class="px-5 pt-3 pb-5 border-t border-gray-200 dark:border-dark-5">
                                                    <div class="w-full flex text-gray-600 text-xs sm:text-sm">
                                                        <div class="mr-2"> Comments: <span
                                                                class="font-medium">5158</span>
                                                        </div>
                                                        <div class="mr-2"> Views: <span class="font-medium">33k</span>
                                                        </div>
                                                        <div class="ml-auto"> Likes: <span class="font-medium">138k</span>
                                                        </div>
                                                    </div>
                                                    <div class="w-full flex items-center mt-3">
                                                        <div class="w-8 h-8 flex-none image-fit mr-3">
                                                            <img alt="user" class="rounded-full"
                                                                src="{{ asset('huycode/images/users/user.png') }}">
                                                        </div>
                                                        <div class="flex-1 relative text-gray-700">
                                                            <input type="text"
                                                                class="form-control form-control-rounded border-transparent bg-gray-200 pr-10 placeholder-theme-8"
                                                                placeholder="Post a comment...">
                                                            <img alt="send"
                                                                class="w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0"
                                                                src="{{ asset('huycode/images/users/telegram.png') }}"
                                                                title="Facebook">
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                        <div id="load_more">
                                            <button type="button" name="load_more_button_notification_systems"
                                                class="intro-x w-full block text-center rounded-md py-3 border border-dotted border-theme-27 dark:border-dark-5 text-theme-28 dark:text-gray-600"
                                                data-id="178" id="load_more_button_notification_systems">Xem
                                                tiếp</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- BEGIN: Transactions -->
                            <div class="intro-y col-span-12 md:col-span-6 xl:col-span-5">
                                <div class="intro-x flex items-center h-10">
                                    <h2 class="text-lg font-medium truncate mr-5">
                                        Danh sách giao dịch
                                    </h2>
                                </div>
                                <div class="mt-5" id="notification-transactions">

                                    <div class="intro-x">
                                        <div class="box px-5 py-3 mb-3 flex items-center zoom-in">
                                            <div class="w-20 h-20 flex-none image-fit rounded-full overflow-hidden">
                                                <img alt="notifications"
                                                    src="{{ asset('huycode/images/users/notification.png') }}">
                                            </div>
                                            <div class="ml-4 mr-auto">
                                                <div class="font-medium">Hệ thống</div>
                                                <div class="text-gray-600 text-xs mt-0.5">Hiện không có thông báo
                                                    nào
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END: Transactions -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END: Content -->
    </div>
    </div>
    <script src="https://cdn.lordicon.com/xdjxvujz.js"></script>
@endsection
