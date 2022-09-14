@inject('site_config', 'App\Models\site_config')
@extends('app')
@section('content')
    <!-- BEGIN: Content -->
    <div class="content">
        <div class="intro-y flex items-center mt-8">
            <h2 class="text-lg font-medium mr-auto">
                Hồ sơ thành viên
            </h2>
        </div>
        <!-- BEGIN: Profile Info -->
        <div class="intro-y box px-5 pt-5 mt-5">
            <div class="flex flex-col lg:flex-row border-b border-gray-200 dark:border-dark-5 pb-5 -mx-5">
                <div class="flex flex-1 px-5 items-center justify-center lg:justify-start">
                    <div class="w-20 h-20 sm:w-24 sm:h-24 flex-none lg:w-32 lg:h-32 image-fit relative">
                        <img alt="Icewall Tailwind HTML Admin Template" class="rounded-full"
                            src="{{ asset('huycode/images/users/user.png') }}">
                    </div>
                    <div class="ml-5">
                        <div class="w-24 sm:w-40 truncate sm:whitespace-normal font-medium text-lg">
                            {{ Auth::user()->name }}</div>
                        <div class="text-gray-600">
                            {{ Auth::user()->level }}
                        </div>
                    </div>
                </div>
                <div
                    class="mt-6 lg:mt-0 flex-1 dark:text-gray-300 px-5 border-l border-r border-gray-200 dark:border-dark-5 border-t lg:border-t-0 pt-5 lg:pt-0">
                    <div class="font-medium text-center lg:text-left lg:mt-3">Thông tin liên hệ</div>
                    <div class="flex flex-col justify-center lg:items-start mt-4">
                        <div class="truncate sm:whitespace-normal flex items-center"><i data-feather="mail"
                                class="w-4 h-4 mr-2"></i> {{ Auth::user()->email }}
                        </div>
                        <div class="truncate sm:whitespace-normal flex items-center mt-3"><i data-feather="facebook"
                                class="w-4 h-4 mr-2"></i> {{ Auth::user()->fb_id }}
                        </div>
                        <div class="truncate sm:whitespace-normal flex items-center mt-3"><i data-feather="phone"
                                class="w-4 h-4 mr-2"></i> {{ Auth::user()->number }}
                        </div>
                    </div>
                </div>
                <div
                    class="grid grid-cols-12 mt-6 lg:mt-0 flex-1 flex items-center justify-center px-5 border-t lg:border-0 border-gray-200 dark:border-dark-5 pt-5 lg:pt-0">
                    <div class="text-center rounded-md py-3 col-span-12 sm:col-span-6 xl:col-span-6">
                        <div class="font-medium dark:text-theme-3 text-xl" style="color: red">
                            {{ number_format(Auth::user()->money) }}
                            đ
                        </div>
                        <div class="text-gray-600">Số dư</div>
                    </div>
                    <div class="text-center rounded-md py-3 col-span-12 sm:col-span-6 xl:col-span-6">
                        <div class="font-medium text-theme-10 dark:text-theme-3 text-xl">
                            {{ number_format(Auth::user()->total_charge) }}
                            đ
                        </div>
                        <div class="text-gray-600">Tổng nạp</div>
                    </div>
                    {{-- <div class="text-center rounded-md py-3 col-span-12 sm:col-span-6 xl:col-span-12">
                        <div class="font-medium text-theme-17 dark:text-theme-3 text-xl">{{ $orders }}</div>
                        <div class="text-gray-600">Đơn hàng</div>
                    </div> --}}
                </div>
            </div>


        </div>
        <!-- END: Profile Info -->
        <div class="tab-content mt-5">
            <div id="profile" class="tab-pane active" role="tabpanel" aria-labelledby="profile-tab">
                <div class="grid grid-cols-12 gap-6">
                    <!-- BEGIN: Latest Uploads -->
                    <div class="intro-y box col-span-12 lg:col-span-6">
                        <div class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200 dark:border-dark-5">
                            <h2 class="font-medium text-base mr-auto">
                                Thông tin cá nhân
                            </h2>
                        </div>
                        <div class="p-1">
                            <div id="form-validation" class="p-5">
                                <div class="preview">
                                    <!-- BEGIN: Validation Form -->
                                    <form class="validate-form" action="{{ route('change-password') }}"
                                        ajax-request="huycoder" method="POST">
                                        @csrf
                                        <div class="input-form">
                                            <label for="validation-form-1"
                                                class="form-label w-full flex flex-col sm:flex-row"> Tài khoản <span
                                                    class="sm:ml-auto mt-1 sm:mt-0 text-xs text-gray-600">* Tên tài
                                                    khoản</span>
                                            </label>
                                            <input id="validation-form-1" type="text" name="username"
                                                class="form-control" placeholder="Username"
                                                value="{{ Auth::user()->username }}" readonly>
                                        </div>
                                        <div class="input-form mt-3">
                                            <label for="validation-form-2"
                                                class="form-label w-full flex flex-col sm:flex-row"> Số dư <span
                                                    class="sm:ml-auto mt-1 sm:mt-0 text-xs text-gray-600">* Số dư tài
                                                    khoản</span>
                                            </label>
                                            <input id="validation-form-2" type="text" name="balance" class="form-control"
                                                placeholder="Số dư tài khoản"
                                                value="{{ number_format(Auth::user()->money) }}" readonly>
                                        </div>
                                        <div class="input-form mt-3">
                                            <label for="validation-form-3"
                                                class="form-label w-full flex flex-col sm:flex-row"> Địa chỉ email
                                                <span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-gray-600">* Nhập địa chỉ
                                                    email của bạn</span>
                                            </label>
                                            <input id="validation-form-3" type="email" name="email" class="form-control"
                                                placeholder="Địa chỉ email" value="{{ Auth::user()->email }}" readonly>
                                        </div>
                                        <div class="input-form mt-3">
                                            <label for="validation-form-3"
                                                class="form-label w-full flex flex-col sm:flex-row"> Số điện thoại
                                                <span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-gray-600">* Nhập đúng số
                                                    điện thoại của bạn</span>
                                            </label>
                                            <input id="validation-form-3" type="number" name="mobile" class="form-control"
                                                placeholder="Số điện thoại" value="{{ Auth::user()->number }}" readonly>
                                        </div>
                                        <div class="input-form mt-3">
                                            <label for="validation-form-4"
                                                class="form-label w-full flex flex-col sm:flex-row"> Facebook ID
                                                <span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-gray-600">* Tự động get
                                                    ID Facebook khi nhập links</span>
                                            </label>
                                            <input id="validation-form-4" type="text" name="fb_id" class="form-control"
                                                placeholder="Nhập links Facebook" value="{{ Auth::user()->fb_id }}"
                                                readonly>
                                        </div>
                                        <div class="input-form mt-3">
                                            <label for="validation-form-5"
                                                class="form-label w-full flex flex-col sm:flex-row"> Mật khẩu mới
                                                <span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-gray-600">* Bỏ trống nếu
                                                    không thay đổi</span>
                                            </label>
                                            <input type="password" name="pass_new" class="form-control" id="pass_new"
                                                placeholder="Nhập mật khẩu mới">
                                        </div>
                                        <div class="input-form mt-3">
                                            <label for="validation-form-6"
                                                class="form-label w-full flex flex-col sm:flex-row"> Nhập lại mật
                                                khẩu mới <span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-gray-600">* Bỏ
                                                    trống nếu không thay đổi</span>
                                            </label>
                                            <input id="comfirm" type="password" name="comfrim_pass"
                                                class="form-control" placeholder="Nhập mật lại khẩu mới">
                                        </div>
                                        <div class="input-form mt-3">
                                            <label for="validation-form-6"
                                                class="form-label w-full flex flex-col sm:flex-row"> Mật khẩu hiện
                                                tại <span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-gray-600">* Bắt buộc
                                                    phải nhập</span>
                                            </label>
                                            <input id="pass_old" type="password" name="pass_old" class="form-control"
                                                placeholder="Nhập mật khẩu hiện tại" required>
                                        </div>
                                        <button type="submit" class="btn btn-primary block w-40 mx-auto mt-5">Cập nhật
                                        </button>
                                    </form>
                                    <!-- END: Validation Form -->
                                    <!-- BEGIN: Success Notification Content -->
                                    {{-- <div id="success-notification-content" class="toastify-content hidden flex">
                                        <i class="text-theme-10" data-feather="check-circle"></i>
                                        <div class="ml-4 mr-4">
                                            <div class="font-medium">Thông báo!</div>
                                            <div class="text-gray-600 mt-1"> Vui lòng chờ một chút để thông tin được cập
                                                nhật.
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END: Success Notification Content -->
                                    <!-- BEGIN: Failed Notification Content -->
                                    <div id="failed-notification-content" class="toastify-content hidden flex">
                                        <i class="text-theme-24" data-feather="x-circle"></i>
                                        <div class="ml-4 mr-4">
                                            <div class="font-medium">Thông báo!</div>
                                            <div class="text-gray-600 mt-1"> Cập nhật thất bại, vui lòng điền đầy đủ
                                                thông tin.
                                            </div>
                                        </div>
                                    </div> --}}
                                    <!-- END: Failed Notification Content -->
                                </div>
                                <div class="source-code hidden">
                                    <button data-target="#copy-form-validation"
                                        class="copy-code btn py-1 px-2 btn-outline-secondary"><i data-feather="file"
                                            class="w-4 h-4 mr-2"></i>
                                        Copy example code
                                    </button>
                                    <div class="overflow-y-auto mt-3 rounded-md">
                                        <pre id="copy-form-validation" class="source-preview"> <code
                                         class="text-xs p-0 rounded-md html pl-5 pt-8 pb-4 -mb-10 -mt-10"> HTMLOpenTag!-- BEGIN: Validation Form --HTMLCloseTag HTMLOpenTagform class=&quot;validate-form&quot;HTMLCloseTag HTMLOpenTagdiv class=&quot;input-form&quot;HTMLCloseTag HTMLOpenTaglabel for=&quot;validation-form-1&quot; class=&quot;form-label w-full flex flex-col sm:flex-row&quot;HTMLCloseTag Name HTMLOpenTagspan class=&quot;sm:ml-auto mt-1 sm:mt-0 text-xs text-gray-600&quot;HTMLCloseTagRequired, at least 2 charactersHTMLOpenTag/spanHTMLCloseTag HTMLOpenTag/labelHTMLCloseTag HTMLOpenTaginput id=&quot;validation-form-1&quot; type=&quot;text&quot; name=&quot;name&quot; class=&quot;form-control&quot; placeholder=&quot;John Legend&quot; minlength=&quot;2&quot; requiredHTMLCloseTag HTMLOpenTag/divHTMLCloseTag HTMLOpenTagdiv class=&quot;input-form mt-3&quot;HTMLCloseTag HTMLOpenTaglabel for=&quot;validation-form-2&quot; class=&quot;form-label w-full flex flex-col sm:flex-row&quot;HTMLCloseTag Email HTMLOpenTagspan class=&quot;sm:ml-auto mt-1 sm:mt-0 text-xs text-gray-600&quot;HTMLCloseTagRequired, email address formatHTMLOpenTag/spanHTMLCloseTag HTMLOpenTag/labelHTMLCloseTag HTMLOpenTaginput id=&quot;validation-form-2&quot; type=&quot;email&quot; name=&quot;email&quot; class=&quot;form-control&quot; placeholder=&quot;example@gmail.com&quot; requiredHTMLCloseTag HTMLOpenTag/divHTMLCloseTag HTMLOpenTagdiv class=&quot;input-form mt-3&quot;HTMLCloseTag HTMLOpenTaglabel for=&quot;validation-form-3&quot; class=&quot;form-label w-full flex flex-col sm:flex-row&quot;HTMLCloseTag Password HTMLOpenTagspan class=&quot;sm:ml-auto mt-1 sm:mt-0 text-xs text-gray-600&quot;HTMLCloseTagRequired, at least 6 charactersHTMLOpenTag/spanHTMLCloseTag HTMLOpenTag/labelHTMLCloseTag HTMLOpenTaginput id=&quot;validation-form-3&quot; type=&quot;password&quot; name=&quot;password&quot; class=&quot;form-control&quot; placeholder=&quot;secret&quot; minlength=&quot;6&quot; requiredHTMLCloseTag HTMLOpenTag/divHTMLCloseTag HTMLOpenTagdiv class=&quot;input-form mt-3&quot;HTMLCloseTag HTMLOpenTaglabel for=&quot;validation-form-4&quot; class=&quot;form-label w-full flex flex-col sm:flex-row&quot;HTMLCloseTag Age HTMLOpenTagspan class=&quot;sm:ml-auto mt-1 sm:mt-0 text-xs text-gray-600&quot;HTMLCloseTagRequired, integer only &amp; maximum 3 charactersHTMLOpenTag/spanHTMLCloseTag HTMLOpenTag/labelHTMLCloseTag HTMLOpenTaginput id=&quot;validation-form-4&quot; type=&quot;number&quot; name=&quot;age&quot; class=&quot;form-control&quot; placeholder=&quot;21&quot; requiredHTMLCloseTag HTMLOpenTag/divHTMLCloseTag HTMLOpenTagdiv class=&quot;input-form mt-3&quot;HTMLCloseTag HTMLOpenTaglabel for=&quot;validation-form-5&quot; class=&quot;form-label w-full flex flex-col sm:flex-row&quot;HTMLCloseTag Profile URL HTMLOpenTagspan class=&quot;sm:ml-auto mt-1 sm:mt-0 text-xs text-gray-600&quot;HTMLCloseTagOptional, URL formatHTMLOpenTag/spanHTMLCloseTag HTMLOpenTag/labelHTMLCloseTag HTMLOpenTaginput id=&quot;validation-form-5&quot; type=&quot;url&quot; name=&quot;url&quot; class=&quot;form-control&quot; placeholder=&quot;https://google.com&quot;HTMLCloseTag HTMLOpenTag/divHTMLCloseTag HTMLOpenTagdiv class=&quot;input-form mt-3&quot;HTMLCloseTag HTMLOpenTaglabel for=&quot;validation-form-6&quot; class=&quot;form-label w-full flex flex-col sm:flex-row&quot;HTMLCloseTag Comment HTMLOpenTagspan class=&quot;sm:ml-auto mt-1 sm:mt-0 text-xs text-gray-600&quot;HTMLCloseTagRequired, at least 10 charactersHTMLOpenTag/spanHTMLCloseTag HTMLOpenTag/labelHTMLCloseTag HTMLOpenTagtextarea id=&quot;validation-form-6&quot; class=&quot;form-control&quot; name=&quot;comment&quot; placeholder=&quot;Type your comments&quot; minlength=&quot;10&quot; requiredHTMLCloseTagHTMLOpenTag/textareaHTMLCloseTag HTMLOpenTag/divHTMLCloseTag HTMLOpenTagbutton type=&quot;submit&quot; class=&quot;btn btn-primary mt-5&quot;HTMLCloseTagRegisterHTMLOpenTag/buttonHTMLCloseTag HTMLOpenTag/formHTMLCloseTag HTMLOpenTag!-- END: Validation Form --HTMLCloseTag HTMLOpenTag!-- BEGIN: Success Notification Content --HTMLCloseTag HTMLOpenTagdiv id=&quot;success-notification-content&quot; class=&quot;toastify-content hidden flex&quot; HTMLCloseTag HTMLOpenTagi class=&quot;text-theme-10&quot; data-feather=&quot;check-circle&quot;HTMLCloseTagHTMLOpenTag/iHTMLCloseTag HTMLOpenTagdiv class=&quot;ml-4 mr-4&quot;HTMLCloseTag HTMLOpenTagdiv class=&quot;font-medium&quot;HTMLCloseTagRegistration success!HTMLOpenTag/divHTMLCloseTag HTMLOpenTagdiv class=&quot;text-gray-600 mt-1&quot;HTMLCloseTag Please check your e-mail for further info! HTMLOpenTag/divHTMLCloseTag HTMLOpenTag/divHTMLCloseTag HTMLOpenTag/divHTMLCloseTag HTMLOpenTag!-- END: Success Notification Content --HTMLCloseTag HTMLOpenTag!-- BEGIN: Failed Notification Content --HTMLCloseTag HTMLOpenTagdiv id=&quot;failed-notification-content&quot; class=&quot;toastify-content hidden flex&quot; HTMLCloseTag HTMLOpenTagi class=&quot;text-theme-24&quot; data-feather=&quot;x-circle&quot;HTMLCloseTagHTMLOpenTag/iHTMLCloseTag HTMLOpenTagdiv class=&quot;ml-4 mr-4&quot;HTMLCloseTag HTMLOpenTagdiv class=&quot;font-medium&quot;HTMLCloseTagRegistration failed!HTMLOpenTag/divHTMLCloseTag HTMLOpenTagdiv class=&quot;text-gray-600 mt-1&quot;HTMLCloseTag Please check the fileld form. HTMLOpenTag/divHTMLCloseTag HTMLOpenTag/divHTMLCloseTag HTMLOpenTag/divHTMLCloseTag HTMLOpenTag!-- END: Failed Notification Content --HTMLCloseTag </code> </pre>
                                    </div>
                                </div>
                            </div>
                            <i style="color: red;text-align:center">Cập nhật lần cuối vào 2022-07-18 17:31:34</i>
                        </div>
                    </div>
                    <!-- END: Latest Uploads -->
                    <!-- BEGIN: Work In Progress -->
                    <div class="intro-y box col-span-12 lg:col-span-6">
                        <div class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200 dark:border-dark-5">
                            <h2 class="font-medium text-base mr-auto">
                                Lịch sử người dùng
                            </h2>
                            <div class="dropdown ml-auto sm:hidden">
                                <a class="dropdown-toggle w-5 h-5 block" href="javascript:;" aria-expanded="false"> <i
                                        data-feather="more-horizontal"
                                        class="w-5 h-5 text-gray-600 dark:text-gray-300"></i> </a>
                                <div class="nav nav-tabs dropdown-menu w-40" role="tablist">
                                    <div class="dropdown-menu__content box dark:bg-dark-1 p-2"><a
                                            id="work-in-progress-new-tab" href="javascript:;" data-toggle="tab"
                                            data-target="#work-in-progress-new"
                                            class="block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md"
                                            role="tab" aria-controls="work-in-progress-new"
                                            aria-selected="true">New</a>
                                        <a id="work-in-progress-last-week-tab" href="javascript:;" data-toggle="tab"
                                            data-target="#work-in-progress-last-week"
                                            class="block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md"
                                            role="tab" aria-selected="false">Last Week</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="p-4">
                            <div class="overflow-x-auto bg-white rounded-lg shadow overflow-y-auto relative">
                                <table id="dataTable"
                                    class=" table-responsive border-collapse bg-white cust-datatable no-footer"
                                    style="
                                    font-size: 14px;">
                                    <thead>
                                        <tr class="text-left">
                                            <th style="min-width: 50px;text-align:center"
                                                class=" py-2 px-3 sticky top-0 border-b border-gray-200 bg-gray-100">
                                                <label
                                                    class="text-teal-500 inline-flex hover:bg-gray-200 px-2 py-2 rounded-lg cursor-pointer">
                                                    #ID
                                                </label>
                                            </th>

                                            <th style="min-width: 150px;text-align:center"
                                                class="py-2 px-3 sticky top-0 border-b border-gray-200 bg-gray-100">
                                                <label
                                                    class="text-teal-500 inline-flex hover:bg-gray-200 px-2 py-2 rounded-lg cursor-pointer">
                                                    Nội dung
                                                </label>
                                            </th>
                                            </pre>

                                            <th style="min-width: 100px;text-align:center"
                                                class="py-2 px-3 sticky top-0 border-b border-gray-200 bg-gray-100">
                                                <label
                                                    class="text-teal-500 inline-flex hover:bg-gray-200 px-2 py-2 rounded-lg cursor-pointer">
                                                    Số dư
                                                </label>
                                            </th>


                                            <th style="min-width: 100px;text-align:center"
                                                class="py-2 px-3 sticky top-0 border-b border-gray-200 bg-gray-100">
                                                <label
                                                    class="text-teal-500 inline-flex hover:bg-gray-200 px-2 py-2 rounded-lg cursor-pointer">
                                                    Thời gian
                                                </label>
                                            </th>

                                        </tr>
                                    </thead>
                                    <tbody class="p-4">
                                        @foreach ($listHuycode as $item)
                                            <tr>
                                                <td style="text-align:center" class="p-4">{{ $item->id }}</td>
                                                <td>{{ $item->content }}</td>
                                                <td style="text-align:center"> {{ number_format(Auth::user()->money) }}
                                                </td>
                                                <td style="text-align:center">{{ $item->created_at }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>

                                    </pre>
                            </div>
                        </div>
                    </div>
                    <!-- END: Work In Progress -->
                </div>
            </div>
        </div>
    </div>
    <!-- END: Content -->
@endsection
