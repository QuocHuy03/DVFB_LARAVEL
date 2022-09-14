@inject('site_config', 'App\Models\site_config')
@extends('app')
@section('title', 'Payment')
@section('content')


    <div class="content">
        <div class="intro-y grid grid-cols-12 gap-6 mt-5">
            <div class="intro-y col-span-12 lg:col-span-12 bg-theme-7 p-2" style="border-radius: 5px">
                <!DOCTYPE html>
                <html>

                <body>
                    <h6 style="font-family: VIEAvantGardeRegular, sans-serif; line-height: 1.5; color: rgb(33, 37, 41);">Bạn
                        vui lòng chuyển khoản chính xác nội dung chuyển khoản bên dưới hệ thống sẽ tự động cộng tiền cho bạn
                        trong vòng phút sau khi nhận được tiền.</h6>
                    <h6 style="font-family: VIEAvantGardeRegular, sans-serif; line-height: 1.5; color: rgb(33, 37, 41);">
                    </h6>
                    <h6
                        style="font-family: &quot;Source Sans Pro&quot;, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;; line-height: 1.5; color: rgb(0, 0, 0);">
                        <font style="font-family: VIEAvantGardeRegular, sans-serif;">
                            <font color="#ff0000"><span style="font-weight: bolder;">Nếu bạn nạp sai nội dung cũng như sai
                                    số
                                    momo , stk thì sẽ bị trừ phí 10% - Tối đa phạt 50k</span></font><br>
                        </font>
                    </h6>
                    <h6
                        style="font-family: &quot;Source Sans Pro&quot;, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;; line-height: 1.5; color: rgb(0, 0, 0);">
                        <font color="#212529" style="font-family: VIEAvantGardeRegular, sans-serif;">Những ngân hàng hỗ trợ
                            nạp tự động (chỉ hoạt động từ 8h sáng tới 23h59) :&nbsp;</font>
                        <font color="#ff0000"><span style="font-weight: bolder;">MB bank , Vietcombank</span></font>
                    </h6>
                    <h6
                        style="font-family: &quot;Source Sans Pro&quot;, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;; line-height: 1.5; color: rgb(0, 0, 0);">
                        <span style="font-weight: bolder;">
                            <font color="#0000ff">Momo nạp auto nhanh trong vòng 15 phút nên anh em ưu tiên</font>
                        </span>
                    </h6>
                    <h6 style="font-family: VIEAvantGardeRegular, sans-serif; line-height: 1.5; color: rgb(33, 37, 41);">Nếu
                        chuyển khác ngân hàng sẽ mất thời gian lâu hơn, tùy thời gian xử lý của mỗi ngân hàng.</h6>
                    <p style="color: rgb(0, 0, 0); line-height: 1.5; font-family: VIEAvantGardeRegular, sans-serif;">
                        <font color="#0000ff"><span style="font-weight: bolder;">Đối với nạp card sẽ triết khấu % theo loại
                                thẻ - nên nạp thẻ loại trên 50k để đỡ trừ chiết khấu cao.</span></font>
                    </p>
                    <p style="color: rgb(0, 0, 0); line-height: 1.5; font-family: VIEAvantGardeRegular, sans-serif;">
                        <font color="#0000ff"><span style="font-weight: bolder;">Nếu sai mệnh giá nạp thì chỉ nhận được
                                50%
                                giá trị.</span></font>
                    </p>
                    <h6 style="font-family: VIEAvantGardeRegular, sans-serif; line-height: 1.5; color: rgb(0, 0, 0);"><span
                            style="color: rgb(33, 37, 41);">Nếu sau 10 phút từ khi tiền trong tài khoản của bạn bị trừ mà
                            vẫn chưa được cộng tiền vui lòng nhấn&nbsp;<a href="https://www.facebook.com/lqh.coder/"
                                class="font-bold event-click" style="font-family: VIEAvantGardeDemiBold;">vào
                                đây</a>&nbsp;hoặc liên hệ zalo
                            :&nbsp;</span>
                        <font color="#ff0000"><span style="font-weight: bolder;">077.550.2724</span></font>
                        <font color="#212529">&nbsp;để liên hệ hỗ trợ.</font>
                    </h6>
                </body>

                </html>
            </div>
            <!-- BEGIN: Blog Layout -->
            @foreach ($banks as $item)
                <div class="intro-y col-span-12 md:col-span-6 xl:col-span-4 box">
                    <div class="flex items-center border-b border-gray-200 dark:border-dark-5 px-5 py-4">
                        <div class="w-10 h-10 flex-none image-fit">
                            <img alt="Logo" class="rounded-full" src="{{ asset('huycode/images/users/user.png') }}">
                        </div>
                        <div class="ml-3 mr-auto">
                            <a href="" class="font-medium">ADSCODE</a>
                            <div class="flex text-gray-600 truncate text-xs mt-0.5"><a
                                    class="text-theme-17 dark:text-gray-500 inline-block truncate" href="">Giao dịch
                                    viên</a>
                                <span class="mx-1">•</span> 23 seconds ago
                            </div>
                        </div>
                        <div class="dropdown ml-3">
                            <a href="javascript:;" class="dropdown-toggle w-5 h-5 text-gray-600 dark:text-gray-300"
                                aria-expanded="false"> <i data-feather="more-vertical" class="w-4 h-4"></i> </a>
                            <div class="dropdown-menu w-40">
                                <div class="dropdown-menu__content box dark:bg-dark-1 p-2">
                                    <a href=""
                                        class="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md">
                                        <i data-feather="edit-2" class="w-4 h-4 mr-2"></i> Edit Post </a>
                                    <a href=""
                                        class="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md">
                                        <i data-feather="trash" class="w-4 h-4 mr-2"></i> Delete Post </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="p-5">
                        <div class="h-40 2xl:h-56 image-fit">
                            <img alt="Logo Wallet" class="rounded-md m-auto" src="{{ $item->logo }}"
                                style="height: unset!important;">
                        </div>
                        <table>
                            <tr>
                                <td>
                                    <h2 class="font-normal text-base mt-3 mb-2"><i data-feather="credit-card"></i>
                                        &ensp; Số tài khoản : </h2>
                                </td>
                                <td>
                                    <a class="text-danger"
                                        style="border: 2px dashed #e04f1a30; padding: 3px; color: #e53e3e !important; margin-left: 10px"
                                        href="javascript:;" onclick="coppy('stk{{ $item->id }}');">
                                        <b id="stk{{ $item->id }}">{{ $item->account_number }}</b>
                                        <i data-feather="copy" style="width: 18px"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h2 class="font-normal text-base mt-3 mb-2"><i data-feather="user"></i> &ensp;
                                        Chủ tài khoản : </h2>
                                </td>
                                <td>
                                    <b style="color: blue ; margin-left: 10px">{{ $item->account_name }}</b>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h2 class="font-normal text-base mt-3 mb-2"><i data-feather="home"></i> &ensp;
                                        Ngân hàng : </h2>
                                </td>
                                <td>
                                    <b style="margin-left: 10px">{{ $item->bank_name }}</b>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h2 class="font-normal text-base mt-3 mb-2"><i data-feather="edit"></i> &ensp;
                                        Nội dung CK : </h2>
                                </td>
                                <td>
                                    <a class="text-danger"
                                        style="border: 2px dashed #e04f1a30; padding: 3px; color: #e53e3e !important; margin-left: 10px"
                                        href="javascript:;" onclick="coppy('transfer_code');">
                                        <b
                                            id="transfer_code">{{ $site_config->getValueByName('transfer_code') }}{{ Auth::user()->id }}</b>
                                        <i data-feather="copy" style="width: 18px"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h2 class="font-normal text-base mt-3 mb-2"><i data-feather="alert-octagon"></i> &ensp;
                                        Nạp Tối Thiểu : </h2>
                                </td>
                                <td>
                                    <b class="text-danger"
                                        style="border: 2px dashed #e04f1a30; padding: 3px; color: #e53e3e !important; margin-left: 10px">{{ number_format($item->min_bank) }}
                                        VNĐ</b>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2" style="padding-top: 20px"><i>***Vui lòng điền đúng nội dung, để được
                                        cộng
                                        tiền***</i></td>
                            </tr>
                        </table>
                    </div>
                </div>
            @endforeach
            <!-- END: Blog Layout -->
        </div>
        <div class="intro-y box col-span-12 lg:col-span-6 mt-6">
            <div class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200 dark:border-dark-5">
                <h2 class="font-medium text-base mr-auto">
                    Lịch sử nạp tiền
                </h2>
                <div class="dropdown ml-auto sm:hidden">
                    <a class="dropdown-toggle w-5 h-5 block" href="javascript:;" aria-expanded="false"> <i
                            data-feather="more-horizontal" class="w-5 h-5 text-gray-600 dark:text-gray-300"></i>
                    </a>
                    <div class="nav nav-tabs dropdown-menu w-40" role="tablist">
                        <div class="dropdown-menu__content box dark:bg-dark-1 p-2"><a id="work-in-progress-new-tab"
                                href="javascript:;" data-toggle="tab" data-target="#work-in-progress-new"
                                class="block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md"
                                role="tab" aria-controls="work-in-progress-new" aria-selected="true">New</a>
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
                    <table id="dataTable" class=" table-responsive border-collapse bg-white cust-datatable no-footer"
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
                                        Thời Gian
                                    </label>
                                </th>


                                {{-- <th style="min-width: 100px;text-align:center"
                                    class="py-2 px-3 sticky top-0 border-b border-gray-200 bg-gray-100">
                                    <label
                                        class="text-teal-500 inline-flex hover:bg-gray-200 px-2 py-2 rounded-lg cursor-pointer">
                                        Ngân Hàng
                                    </label>
                                </th> --}}


                                <th style="min-width: 100px;text-align:center"
                                    class="py-2 px-3 sticky top-0 border-b border-gray-200 bg-gray-100">
                                    <label
                                        class="text-teal-500 inline-flex hover:bg-gray-200 px-2 py-2 rounded-lg cursor-pointer">
                                        Mã Giao Dịch
                                    </label>
                                </th>

                                <th style="min-width: 100px;text-align:center"
                                    class="py-2 px-3 sticky top-0 border-b border-gray-200 bg-gray-100">
                                    <label
                                        class="text-teal-500 inline-flex hover:bg-gray-200 px-2 py-2 rounded-lg cursor-pointer">
                                        Thực Nhận
                                    </label>
                                </th>

                                {{-- <th style="min-width: 100px;text-align:center"
                                    class="py-2 px-3 sticky top-0 border-b border-gray-200 bg-gray-100">
                                    <label
                                        class="text-teal-500 inline-flex hover:bg-gray-200 px-2 py-2 rounded-lg cursor-pointer">
                                        Nội Dung
                                    </label>
                                </th> --}}


                            </tr>
                        </thead>

                        <tbody class="p-4">

                            @foreach ($history as $huy)
                                <tr>
                                    <td style="text-align:center" class="p-4">{{ $huy->id }}</td>
                                    <td style="text-align:center">{{ $huy->created_at }}</td>
                                    {{-- <td style="text-align:center">{{ $huy->bank_name }}</td> --}}
                                    <td style="text-align:center">{{ $huy->transactionId }} </td>
                                    <td style="text-align:center">{{ number_format($huy->creditAmount) }}</td>
                                    {{-- <td style="text-align:center">{{ $huy->noidung }}</td> --}}
                                </tr>
                            @endforeach
                        </tbody>

                </div>
            </div>
        </div>
    </div>



    <!-- END: Content -->

    <script>
        $(document).ready(function() {
            Swal.fire({
                title: 'Thông báo',
                text: 'Vui lòng chuyển khoản đúng nội dung nhé !',
                icon: 'warning',
                confirmButtonText: 'Đóng'
            })
        });
    </script>
    </div>
    </div>
@endsection
