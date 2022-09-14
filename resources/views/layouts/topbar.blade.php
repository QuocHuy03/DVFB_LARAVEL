    <!-- END: Mobile Menu -->
    <!-- BEGIN: Top Bar -->
    <div class="top-bar-boxed border-b border-theme-2 -mt-7 md:-mt-5 -mx-3 sm:-mx-8 px-3 sm:px-8 md:pt-0 mb-12">
        <div class="h-full flex items-center">
            <!-- BEGIN: Logo -->
            <a href="" class="-intro-x hidden md:flex">
                {{-- <img alt="sbonline247.com" class="w-52"
                  src=" https://sbonline247.com/temp-order/images/logo-sbonline247.png"> --}}
                <h1 style="color:white">HuyTheme</h1>
            </a>
            <!-- END: Logo -->
            <!-- BEGIN: Breadcrumb -->
            <div class="-intro-x breadcrumb mr-auto"><a href="">Application</a> <i data-feather="chevron-right"
                    class="breadcrumb__icon"></i> <a href="" class="breadcrumb--active">Home</a>
            </div>
            <!-- END: Breadcrumb -->
            <!-- BEGIN: Search -->
            <div class="intro-x relative mr-3 sm:mr-6">
                <div class="search hidden sm:block">
                    <input type="text"
                        class="search__input form-control dark:bg-dark-1 border-transparent placeholder-theme-8"
                        placeholder="Search...">
                    <i data-feather="search" class="search__icon dark:text-gray-300"></i>
                </div>
                <a class="notification sm:hidden" href=""> <i data-feather="search"
                        class="notification__icon dark:text-gray-300"></i> </a>
                <div class="search-result">
                    <div class="search-result__content">
                        <div class="search-result__content__title">Pages</div>
                        <div class="mb-5">
                            <a href="" class="flex items-center">
                                <div
                                    class="w-8 h-8 bg-theme-29 text-theme-10 flex items-center justify-center rounded-full">
                                    <i class="w-4 h-4" data-feather="inbox"></i>
                                </div>
                                <div class="ml-3">Mail Settings</div>
                            </a>
                            <a href="" class="flex items-center mt-2">
                                <div
                                    class="w-8 h-8 bg-theme-30 text-theme-24 flex items-center justify-center rounded-full">
                                    <i class="w-4 h-4" data-feather="users"></i>
                                </div>
                                <div class="ml-3">Users & Permissions</div>
                            </a>
                            <a href="" class="flex items-center mt-2">
                                <div
                                    class="w-8 h-8 bg-theme-31 text-theme-26 flex items-center justify-center rounded-full">
                                    <i class="w-4 h-4" data-feather="credit-card"></i>
                                </div>
                                <div class="ml-3">Transactions Report</div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END: Search -->
            <!-- BEGIN: Notifications -->
            <div class="intro-x dropdown mr-4 sm:mr-6">
                <div class="dropdown-toggle notification notification--bullet cursor-pointer" role="button"
                    aria-expanded="false"><i data-feather="bell" class="notification__icon dark:text-gray-300"></i>
                </div>
                <div class="notification-content pt-2 dropdown-menu">
                    <div class="notification-content__box dropdown-menu__content box dark:bg-dark-6">
                        <div class="notification-content__title">Notifications</div>
                        <div class="cursor-pointer relative flex items-center ">
                            <div class="w-12 h-12 flex-none image-fit mr-1">
                                <img alt="Icewall Tailwind HTML Admin Template" class="rounded-full"
                                    src="{{ asset('huycode/images/users/user.png') }}">
                                <div
                                    class="w-3 h-3 bg-theme-10 absolute right-0 bottom-0 rounded-full border-2 border-white">
                                </div>
                            </div>
                            <div class="ml-2 overflow-hidden">
                                <div class="flex items-center">
                                    <a href="javascript:;" class="font-medium truncate mr-5">CEO ADSCODE</a>
                                    <div class="text-xs text-gray-500 ml-auto whitespace-nowrap">06:05 AM</div>
                                </div>
                                <div class="w-full truncate text-gray-600 mt-0.5">Lê Quốc Huy Chúc Bạn Một Ngày Làm Việc
                                    Hiệu Quả
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END: Notifications -->
            <!-- BEGIN: Account Menu -->
            <div class="intro-x dropdown w-8 h-8">
                <div class="dropdown-toggle w-8 h-8 rounded-full overflow-hidden shadow-lg image-fit zoom-in scale-110"
                    role="button" aria-expanded="false">
                    <img alt="Admin Lê Quốc Huy" src="{{ asset('huycode/images/users/user.png') }}">
                </div>
                <div class="dropdown-menu w-56">
                    <div class="dropdown-menu__content box bg-theme-11 dark:bg-dark-6 text-white">
                        <div class="p-4 border-b border-theme-12 dark:border-dark-3">
                            <div class="font-medium">{{ Auth::user()->name }}</div>
                            <div class="text-xs text-theme-13 mt-0.5 dark:text-gray-600">
                                @if (Auth::user()->level == 'member')
                                    <span class="text-success">Thành Viên</span>
                                @elseif (Auth::user()->level == 'DL')
                                    <span class="text-info">Đại Lý</span>
                                @elseif (Auth::user()->level == 'NPP')
                                    <span class="text-warning">Nhà Phân Phối</span>
                                @elseif (Auth::user()->level == 'admin')
                                    <span class="text-danger">Quản Trị Viên</span>
                                @endif
                            </div>
                            <div class="text-xs text-theme-13 mt-0.5 dark:text-gray-600">
                                Số dư: {{ number_format(Auth::user()->money) }} đ
                            </div>
                        </div>
                        <div class="p-2">
                            <a href="{{ route('profile') }}"
                                class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 dark:hover:bg-dark-3 rounded-md">
                                <i data-feather="user" class="w-4 h-4 mr-2"></i> Profile </a>
                        </div>
                        <div class="p-2 border-t border-theme-12 dark:border-dark-3">
                            <a href="{{ route('auth.logout') }}"
                                class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 dark:hover:bg-dark-3 rounded-md">
                                <i data-feather="toggle-right" class="w-4 h-4 mr-2"></i> Logout </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END: Account Menu -->
        </div>
    </div>
    <!-- END: Top Bar -->
