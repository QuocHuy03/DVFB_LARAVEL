@inject('site_config', 'App\Models\site_config')
@extends('app')
@section('title', 'Facebook')
@section('content')

    <div class="content">
        <div class="intro-y flex items-center mt-8">
            <h2 class="text-lg font-medium mr-auto">
                {{ $title }}
            </h2>
        </div>
        <div class="grid grid-cols-12 gap-6 mt-5 pos">
            <div class="intro-y col-span-12 lg:col-span-8">
                <div class="intro-y">
                    <div class="box p-2">
                        <div class="pos__tabs nav nav-tabs justify-center" role="tablist">
                            <a id="create-tab" data-toggle="tab" data-target="#create" href="javascript:;"
                                class="flex-1 py-2 rounded-md text-center active" role="tab" aria-controls="create"
                                aria-selected="true">Mua dịch vụ</a>
                            <a id="orders-tab" data-toggle="tab" data-target="#orders" href="javascript:;"
                                class="flex-1 py-2 rounded-md text-center" role="tab" aria-controls="orders"
                                aria-selected="false">Dịch vụ đã mua</a>
                        </div>
                    </div>
                </div>
                <!-- BEGIN: Form Validation -->
                <div class="tab-content intro-y">
                    <div id="create" class="tab-pane box active mt-5" role="tabpanel" aria-labelledby="create-tab">
                        <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200 dark:border-dark-5">
                            <h2 class="font-medium text-base mr-auto">
                                Cài dịch vụ
                            </h2>
                        </div>
                        <div id="form-validation" class="p-5 pt-2">
                            <div class="preview">
                                <!-- BEGIN: Validation Form -->
                                <form class="validate-form" action="{{ route('api.service.facebook-v2', $type) }}"
                                    ajax-request="huycoder" method="POST">
                                    {{-- like --}}
                                    @if ($type == 'like-sale' ||
                                        $type == 'like-speed' ||
                                        $type == 'comment-sale' ||
                                        $type == 'comment-speed' ||
                                        $type == 'eye-live' ||
                                        $type == 'share-profile')
                                        <div class="input-form mt-3">
                                            <label for="validation-form-5"
                                                class="form-label w-full flex flex-col sm:flex-row"> Links bài viết <span
                                                    class="sm:ml-auto mt-1 sm:mt-0 text-xs text-gray-600">Vui lòng nhập
                                                    links bài viết</span>
                                            </label>
                                            <input type="url" name="idpost" id="idpost"
                                                class="form-control url_service" placeholder="https://facebook.com"
                                                required="">
                                        </div>
                                    @endif


                                    {{-- sub --}}

                                    @if ($type == 'sub-vip' || $type == 'sub-quality' || $type == 'sub-sale' || $type == 'sub-speed')
                                        <div class="input-form mt-3">
                                            <label for="validation-form-5"
                                                class="form-label w-full flex flex-col sm:flex-row"> Links hoặc ID
                                                profile <span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-gray-600">Vui lòng
                                                    nhập links hoặc ID trang cá nhân</span>
                                            </label>
                                            <input type="text" name="idpost" id="idpost"
                                                class="form-control fanpage_id" onchange="getIDPOST()"
                                                placeholder="https://www.facebook.com/lqh.coder/" required="">
                                        </div>
                                    @endif

                                    {{-- member-group --}}

                                    @if ($type == 'member-group')
                                        <div class="input-form mt-3">
                                            <label for="validation-form-5"
                                                class="form-label w-full flex flex-col sm:flex-row">
                                                Links hoặc ID group
                                                <span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-gray-600">Vui lòng nhập
                                                    links
                                                    hoặc ID group</span>
                                            </label>
                                            <input type="text" name="idgroup" id="idgroup"
                                                class="form-control fanpage_id" onchange="getIDPOST()"
                                                placeholder="https://www.facebook.com/groups/.........." value=""
                                                required="">
                                        </div>
                                    @endif

                                    {{-- view-story --}}


                                    @if ($type == 'view-story')
                                        <div class="input-form mt-3">
                                            <label for="validation-form-5"
                                                class="form-label w-full flex flex-col sm:flex-row"> Links Story <span
                                                    class="sm:ml-auto mt-1 sm:mt-0 text-xs text-gray-600">Vui lòng nhập
                                                    links story</span>
                                            </label>
                                            <input type="text" name="idstory" id="idstory" class="form-control link"
                                                placeholder="https://www.facebook.com/stories/...../UzpfSVNDOjUyODc4MzM2NTM2NzgzNA=="
                                                value="" required="">
                                        </div>
                                    @endif

                                    {{-- like-page --}}

                                    @if ($type == 'like-page-quality' || $type == 'like-page-sale' || $type == 'like-page-speed')
                                        <div class="input-form mt-3">
                                            <label for="validation-form-5"
                                                class="form-label w-full flex flex-col sm:flex-row"> Links hoặc ID
                                                fanpage <span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-gray-600">Vui lòng
                                                    nhập links hoặc ID fanpage</span>
                                            </label>
                                            <input type="text" name="idpage" id="idpage"
                                                class="form-control fanpage_id" onchange="getIDPOST()"
                                                placeholder="https://www.facebook.com/....." value="" required="">
                                        </div>
                                    @endif

                                    {{-- like-comment --}}
                                    @if ($type == 'like-comment')
                                        <div class="input-form mt-3">
                                            <label for="validation-form-5"
                                                class="form-label w-full flex flex-col sm:flex-row"> Links Comment<span
                                                    class="sm:ml-auto mt-1 sm:mt-0 text-xs text-gray-600">Vui lòng nhập
                                                    links comment</span>
                                            </label>
                                            <input type="text" name="idcomment" id="idcomment"
                                                class="form-control facebook_id"
                                                placeholder="https://www.facebook.com/.../posts/457d47273472893?comment_id=*******"
                                                value="" required="">
                                        </div>
                                    @endif

                                    {{-- view-video --}}
                                    @if ($type == 'view-video')
                                        <div class="input-form mt-3">
                                            <label for="validation-form-5"
                                                class="form-label w-full flex flex-col sm:flex-row"> Links Hoặc ID Video
                                                <span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-gray-600">Vui lòng nhập
                                                    links hoặc ID video</span>
                                            </label>
                                            <input type="text" name="link_video" id="link_video"
                                                class="form-control link_or_id"
                                                placeholder="https://www.facebook.com/..../videos/7347243423424"
                                                value="" required="">
                                        </div>
                                    @endif

                                    {{-- comment-sale --}}
                                    @if ($type == 'comment-sale' || $type == 'comment-speed')
                                        <div class="input-form mt-3">
                                            <label for="validation-form-6"
                                                class="form-label w-full flex flex-col sm:flex-row"> Nội dung
                                                comment<span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-gray-600">Vui lòng
                                                    nhập tối thiểu 10 nội dung</span>
                                            </label>
                                            <textarea rows="5" type="text" class="form-control" name="comment" id="comment"
                                                placeholder="Nhập nội dung comments của bạn , mỗi nội dung 1 dòng nhé"> </textarea>
                                        </div>
                                    @endif

                                    {{-- eyes --}}

                                    @if ($type == 'eye-live')
                                        <div class="input-form mt-3">
                                            <label for="validation-form-4"
                                                class="form-label w-full flex flex-col sm:flex-row"> Số Lượng <span
                                                    class="sm:ml-auto mt-1 sm:mt-0 text-xs text-gray-600">Vui lòng chọn số
                                                    lượng tối thiểu 50</span>
                                            </label>
                                            <div class="form-group">
                                                <select class="form-control" name="amount" id="amount"
                                                    onkeyup="bill()" required="">
                                                    <option value="50">Gói 50 mắt</option>
                                                    <option value="100">Gói 100 mắt</option>
                                                    <option value="120">Gói 120 mắt</option>
                                                    <option value="150">Gói 150 mắt</option>
                                                    <option value="200">Gói 200 mắt</option>
                                                    <option value="300">Gói 300 mắt</option>
                                                    <option value="400">Gói 400 mắt</option>
                                                    <option value="500">Gói 500 mắt</option>
                                                    <option value="1000">Gói 1000 mắt</option>
                                                </select>
                                            </div>
                                            <div class="input-form mt-3">
                                                <label for="validation-form-4"
                                                    class="form-label w-full flex flex-col sm:flex-row"> Thời gian tối đa 1
                                                    livestream<span
                                                        class="sm:ml-auto mt-1 sm:mt-0 text-xs text-gray-600">Vui lòng chọn
                                                        thời gian tối thiểu 90 phút 1 live</span>
                                                </label>
                                                <div class="form-group">
                                                    <select class="form-control" name="minutes" id="minutes"
                                                        onkeyup="bill()" required="">
                                                        <option value="90">90 phút 1 live</option>
                                                        <option value="120">120 phút 1 live</option>
                                                        <option value="180">180 phút 1 live</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    @endif

                                    {{-- like --}}


                                    @if ($type == 'like-sale' || $type == 'like-speed' || $type == 'like-comment')
                                        <div class="input-form mt-3">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <label for="reaction" class="form-label">Cảm xúc</label>
                                                </div>
                                                <div class="col-md-9"
                                                    style="
                                                display: flex;
                                                gap: 20px;
                                                flex-wrap: wrap;">
                                                    <div
                                                        class="custom-control
                                                    custom-radio custom-control-inline mt-2">
                                                        <input type="radio" id="reaction1" name="reaction"
                                                            class="custom-control-input" checked value="like">
                                                        <label class="custom-control-label" for="reaction1">
                                                            <span class="badge bg-primary">{{ __('Like') }}</span>
                                                        </label>
                                                    </div>
                                                    <div class="custom-control custom-radio custom-control-inline mt-2">
                                                        <input type="radio" id="reaction2" name="reaction"
                                                            class="custom-control-input" value="love">
                                                        <label class="custom-control-label" for="reaction2">
                                                            <span class="badge bg-primary">{{ __('Love') }}</span>
                                                        </label>
                                                    </div>
                                                    <div class="custom-control custom-radio custom-control-inline mt-2">
                                                        <input type="radio" id="reaction3" name="reaction"
                                                            class="custom-control-input" value="haha">
                                                        <label class="custom-control-label" for="reaction3">
                                                            <span class="badge bg-primary">{{ __('Haha') }}</span>
                                                        </label>
                                                    </div>
                                                    <div class="custom-control custom-radio custom-control-inline mt-2">
                                                        <input type="radio" id="reaction4" name="reaction"
                                                            class="custom-control-input" value="wow">
                                                        <label class="custom-control-label" for="reaction4">
                                                            <span class="badge bg-primary">{{ __('Wow') }}</span>
                                                        </label>
                                                    </div>
                                                    <div class="custom-control custom-radio custom-control-inline mt-2">
                                                        <input type="radio" id="reaction5" name="reaction"
                                                            class="custom-control-input" value="sad">
                                                        <label class="custom-control-label" for="reaction5">
                                                            <span class="badge bg-primary">{{ __('Sad') }}</span>
                                                        </label>
                                                    </div>
                                                    <div class="custom-control custom-radio custom-control-inline mt-2">
                                                        <input type="radio" id="reaction6" name="reaction"
                                                            class="custom-control-input" value="angry">
                                                        <label class="custom-control-label" for="reaction6">
                                                            <span class="badge bg-primary">{{ __('Angry') }}</span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="mt-3" id="show_Reaction"></div>
                                            </div>
                                        </div>
                                    @endif
                                    {{-- check tốc độ --}}
                                    @if ($type == 'like-speed' || $type == 'like-comment')
                                        <div class="input-form mt-3">
                                            <label for="validation-form-6"
                                                class="form-label w-full flex flex-col sm:flex-row">
                                                Chọn tốc độ <span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-gray-600">Vui
                                                    lòng
                                                    chọn tốc
                                                    độ chạy mà bạn mong muốn</span>
                                            </label>
                                            <div class="form-check mt-2">
                                                <input type="radio" id="speed3" name="speed"
                                                    class="form-check-input" type="radio" name="speed"
                                                    value="slow" checked>
                                                <label class="form-check-label" for="radio-switch-1">Chậm</label>
                                            </div>
                                            <div class="form-check mt-2">
                                                <input type="radio" id="speed" name="speed"
                                                    class="form-check-input" type="radio" value="fast" checked>
                                                <label class="form-check-label" for="radio-switch-4">Nhanh</label>
                                            </div>
                                        </div>
                                    @endif

                                    {{-- kiểm tra thời gian view video --}}
                                    @if ($type == 'view-video')
                                        <div class="input-form mt-3">
                                            <label for="validation-form-6"
                                                class="form-label w-full flex flex-col sm:flex-row">
                                                Chọn Time <span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-gray-600">Vui
                                                    lòng chọn
                                                    server buff mà bạn mong muốn</span>
                                            </label>

                                            <div class="form-check mt-2">
                                                <input id="radio-switch-4" class="form-check-input channel"
                                                    type="radio" id="time" name="time" checked value="3">
                                                <label class="form-check-label" for="radio-switch-4">View 3s
                                                </label>
                                            </div>

                                            <div class="form-check mt-2">
                                                <input id="radio-switch-5" class="form-check-input channel"
                                                    type="radio" id="time1" name="time" checked value="10">
                                                <label class="form-check-label" for="radio-switch-5">View 10s
                                                </label>
                                            </div>
                                            <div class="form-check mt-2">
                                                <input id="radio-switch-6" class="form-check-input channel"
                                                    type="radio" id="time2" name="time" checked value="15">
                                                <label class="form-check-label" for="radio-switch-6">View 15s
                                                </label>
                                            </div>
                                        </div>
                                    @endif

                                    {{-- server --}}

                                    <div class="input-form mt-3">
                                        <label for="validation-form-6"
                                            class="form-label w-full flex flex-col sm:flex-row"> Chọn
                                            Server <span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-gray-600">Vui lòng
                                                chọn
                                                server buff mà bạn mong muốn tăng</span>
                                        </label>
                                        @foreach ($server as $item)
                                            <div class="custom-control custom-radio custom-control-inline mt-3">
                                                <input type="radio" id="server{{ $item->id }}" name="server_order"
                                                    onchange="bill()" price="{{ $item->rate_server }}"
                                                    notice="{{ $item->content_server }}" class="custom-control-input"
                                                    checked value="{{ $item->server_service }}">

                                                <label class="custom-control-label" for="server{{ $item->id }}">
                                                    {{ $item->server_service }} - [ {{ $item->title_server }} ]
                                                    <span
                                                        class="justify-center bg-theme-17 rounded-md text-white w-24 text-center px-2 py-1 mx-auto my-auto"
                                                        style="font-size:12px;">{{ $item->rate_server }}
                                                        Coin</span>
                                                    @if ($item->status_server == 'on')
                                                        <span class="badge"
                                                            style="color:rgb(53, 181, 36);font-weight:700">(
                                                            {{ __('Hoạt Động') }}
                                                            )</span>
                                                    @else
                                                        <span class="badge"
                                                            style="color:rgb(240, 56, 56);font-weight:700">(
                                                            {{ __('Bảo Trì') }} )</span>
                                                    @endif
                                                </label>
                                            </div>
                                        @endforeach
                                        <div id="noticeServer"></div>
                                    </div>
                                    @if ($type == 'like-sale' ||
                                        $type == 'like-speed' ||
                                        $type == 'like-comment' ||
                                        $type == 'comment-sale' ||
                                        $type == 'sub-vip' ||
                                        $type == 'sub-quanlity' ||
                                        $type == 'sub-sale' ||
                                        $type == 'sub-speed' ||
                                        $type == 'sub-quality' ||
                                        $type == 'like-page-sale' ||
                                        $type == 'like-page-speed' ||
                                        $type == 'view-video' ||
                                        $type == 'share-profile' ||
                                        $type == 'member-group' ||
                                        $type == 'view-story')
                                        <div class="input-form mt-3">
                                            <label for="validation-form-4"
                                                class="form-label w-full flex flex-col sm:flex-row">
                                                Số lượng <span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-gray-600">Vui
                                                    lòng
                                                    nhập số
                                                    lượng tối thiểu 1000</span>
                                            </label>
                                            <input type="number" name="amount" id="amount" class="form-control"
                                                placeholder="Vui lòng nhập số lượng" onkeyup="bill()" value="1000">
                                        </div>
                                    @endif



                                    <div class="input-form mt-3">
                                        <label for="validation-form-6"
                                            class="form-label w-full flex flex-col sm:flex-row"> Ghi
                                            Chú <span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-gray-600">Ghi chú nếu
                                                cần</span>
                                        </label>
                                        <textarea class="form-control" name="note" id="note" placeholder="Nhập ghi chú của bạn"></textarea>
                                    </div>

                                    <div class="input-form mt-3">
                                        <div class="btn btn-primary block p-4 mx-auto text-center" role="alert">
                                            <h4 style="font-size: 20px"> Tổng thanh
                                                toán : <span id="payment"></span>
                                                Coin</h4>
                                        </div>
                                    </div>



                                    <button type="submit"
                                        @if ($type == 'comment-speed') show="Lưu ý số lượng sẽ bằng 1 comment xuống dòng nếu dòng đó không có gì vẫn sẽ tính là 1 nên các bạn cần lưu ý"
                                    @else
                                    show="Bạn có chắc chắn muốn mua đơn hàng này?" @endif
                                        class="btn btn-primary block w-40 mx-auto mt-5">
                                        Khởi Tạo
                                    </button>

                                </form>
                                {{-- <!-- END: Validation Form -->
                                <!-- BEGIN: Success Notification Content -->
                                <div id="success-notification-content" class="toastify-content hidden flex">
                                    <i class="text-theme-10" data-feather="check-circle"></i>
                                    <div class="ml-4 mr-4">
                                        <div class="font-medium">Đang khởi tạo!</div>
                                        <div class="text-gray-600 mt-1"> Vui lòng chờ trong giây lát ...</div>
                                    </div>
                                </div>
                                <!-- END: Success Notification Content -->
                                <!-- BEGIN: Failed Notification Content -->
                                <div id="failed-notification-content" class="toastify-content hidden flex">
                                    <i class="text-theme-24" data-feather="x-circle"></i>
                                    <div class="ml-4 mr-4">
                                        <div class="font-medium">Khởi tạo thất bại!</div>
                                        <div class="text-gray-600 mt-1"> Vui lòng điền đầy đủ và kiểm tra lại thông tin
                                            ...
                                        </div>
                                    </div>
                                </div> --}}
                                <!-- END: Failed Notification Content -->
                            </div>
                        </div>
                    </div>
                    {{-- order --}}
                    <div id="orders" class="tab-pane mt-5" role="tabpanel" aria-labelledby="orders-tab">
                        <div class="box p-5 mt-5">
                            {{-- <div class="overflow-x-auto bg-white rounded-lg shadow overflow-y-auto relative">
                                <table id="dataTable" style="overflow-y: auto"
                                    class="border-collapse table-auto w-full whitespace-no-wrap bg-white table-striped relative">
                                    <thead>
                                        <tr class="text-left">
                                            <th class="py-2 px-3 sticky top-0 border-b border-gray-200 bg-gray-100">
                                                <label
                                                    class="text-teal-500 inline-flex hover:bg-gray-200 px-2 py-2 rounded-lg cursor-pointer">
                                                    #ID
                                                </label>
                                            </th>
                                            <th class="py-2 px-3 sticky top-0 border-b border-gray-200 bg-gray-100">
                                                <label
                                                    class="text-teal-500 inline-flex hover:bg-gray-200 px-2 py-2 rounded-lg cursor-pointer">
                                                    Thời Gian
                                                </label>
                                            </th>
                                            <th class="py-2 px-3 sticky top-0 border-b border-gray-200 bg-gray-100">
                                                <label
                                                    class="text-teal-500 inline-flex hover:bg-gray-200 px-2 py-2 rounded-lg cursor-pointer">
                                                    Đơn Hàng
                                                </label>
                                            </th>

                                            <th class="py-2 px-3 sticky top-0 border-b border-gray-200 bg-gray-100">
                                                <label
                                                    class="text-teal-500 inline-flex hover:bg-gray-200 px-2 py-2 rounded-lg cursor-pointer">
                                                    Link
                                                </label>
                                            </th>
                                            <th class="py-2 px-3 sticky top-0 border-b border-gray-200 bg-gray-100">
                                                <label
                                                    class="text-teal-500 inline-flex hover:bg-gray-200 px-2 py-2 rounded-lg cursor-pointer">
                                                    Máy Chủ
                                                </label>
                                            </th>

                                            <th class="py-2 px-3 sticky top-0 border-b border-gray-200 bg-gray-100">
                                                <label
                                                    class="text-teal-500 inline-flex hover:bg-gray-200 px-2 py-2 rounded-lg cursor-pointer">
                                                    Số Lượng
                                                </label>
                                            </th>


                                            <th class="py-2 px-3 sticky top-0 border-b border-gray-200 bg-gray-100">
                                                <label
                                                    class="text-teal-500 inline-flex hover:bg-gray-200 px-2 py-2 rounded-lg cursor-pointer">
                                                    Giá
                                                </label>
                                            </th>
                                            <th class="py-2 px-3 sticky top-0 border-b border-gray-200 bg-gray-100">
                                                <label
                                                    class="text-teal-500 inline-flex hover:bg-gray-200 px-2 py-2 rounded-lg cursor-pointer">
                                                    Tổng Tiền
                                                </label>
                                            </th>
                                            <th class="py-2 px-3 sticky top-0 border-b border-gray-200 bg-gray-100">
                                                <label
                                                    class="text-teal-500 inline-flex hover:bg-gray-200 px-2 py-2 rounded-lg cursor-pointer">
                                                    Trạng Thái
                                                </label>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($listOrder as $item)
                                            <tr style="text-align:center">
                                                <td>{{ $item->id }}</td>
                                                <td>{{ $item->created_at }}</td>
                                                <td>{{ $item->type }}</td>
                                           
                                                <td>{{ $item->link_order }}</td>
                                                <td>{{ $item->server_order }}</td>
                                                <td>{{ $item->amount }}</td>
                                                <td>{{ $item->price }}</td>
                                                <td>{{ $item->total_money }}</td>
                                                <td>
                                                    @if ($item->status == 'Start')
                                                        <span
                                                            style="background:#51b714;padding:4px 6px;border-radius:7px;color:#fff">Đang
                                                            chạy</span>
                                                    @elseif ($item->status == 'Pending')
                                                        <span class="badge badge-warning">Chờ xử lý</span>
                                                    @elseif ($item->status == 'Success')
                                                        <span
                                                            style="background:#51b714;padding:4px 6px;border-radius:7px;color:#fff">Đã
                                                            hoàn thành</span>
                                                    @elseif ($item->status == 'Cancel')
                                                        <span class="badge badge-danger">Đã hủy</span>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div> --}}

                            <div class="overflow-x-auto bg-white rounded-lg shadow overflow-y-auto relative">
                                <div id="dataTable_wrapper" class="dataTables_wrapper no-footer">
                                    <table id="dataTable"
                                        class="border-collapse table-auto w-full whitespace-no-wrap bg-white table-striped relative dataTable no-footer"
                                        style="
                                        font-size: 14px;" role="grid"
                                        aria-describedby="dataTable_info">
                                        <thead>
                                            <tr class="text-left" role="row">
                                                <th class="py-2 px-3 sticky top-0 border-b border-gray-200 bg-gray-100 sorting"
                                                    tabindex="0" aria-controls="dataTable" rowspan="1"
                                                    colspan="1"
                                                    aria-label="
                                            
                                                #ID
                                            
                                        : activate to sort column ascending"
                                                    style="min-width: 30px">
                                                    <label
                                                        class="text-teal-500 inline-flex hover:bg-gray-200 px-2 py-2 rounded-lg cursor-pointer">
                                                        #ID
                                                    </label>
                                                </th>
                                                <th class="py-2 px-3 sticky top-0 border-b border-gray-200 bg-gray-100 sorting"
                                                    tabindex="0" aria-controls="dataTable" rowspan="1"
                                                    colspan="1"
                                                    aria-label="
                                            
                                                Đơn Hàng
                                            
                                        : activate to sort column ascending"
                                                    style="min-width:80px">
                                                    <label
                                                        class="text-teal-500 inline-flex hover:bg-gray-200 px-2 py-2 rounded-lg cursor-pointer">
                                                        Đơn Hàng
                                                    </label>
                                                </th>
                                                <th class="py-2 px-3 sticky top-0 border-b border-gray-200 bg-gray-100 sorting"
                                                    tabindex="0" aria-controls="dataTable" rowspan="1"
                                                    colspan="1"
                                                    aria-label="
                                            
                                                 Link
                                            
                                        : activate to sort column ascending"
                                                    style="min-width: 140px">
                                                    <label
                                                        class="text-teal-500 inline-flex hover:bg-gray-200 px-2 py-2 rounded-lg cursor-pointer">
                                                        Link
                                                    </label>
                                                </th>
                                                <th class="py-2 px-3 sticky top-0 border-b border-gray-200 bg-gray-100 sorting"
                                                    tabindex="0" aria-controls="dataTable" rowspan="1"
                                                    colspan="1"
                                                    aria-label="
                                            
                                                 Máy Chủ
                                            
                                        : activate to sort column ascending"
                                                    style="min-width: 80px">
                                                    <label
                                                        class="text-teal-500 inline-flex hover:bg-gray-200 px-2 py-2 rounded-lg cursor-pointer">
                                                        Máy Chủ
                                                    </label>
                                                </th>
                                                <th class="py-2 px-3 sticky top-0 border-b border-gray-200 bg-gray-100 sorting"
                                                    tabindex="0" aria-controls="dataTable" rowspan="1"
                                                    colspan="1"
                                                    aria-label="
                                            
                                                Số Lượng
                                            
                                        : activate to sort column ascending"
                                                    style="min-width: 90px">
                                                    <label
                                                        class="text-teal-500  hover:bg-gray-200 px-2 py-2 rounded-lg cursor-pointer">
                                                        Số Lượng
                                                    </label>
                                                </th>

                                                <th class="py-2 px-3 sticky top-0 border-b border-gray-200 bg-gray-100 sorting"
                                                    tabindex="0" aria-controls="dataTable" rowspan="1"
                                                    colspan="1"
                                                    aria-label="
                                            
                                                Giá
                                            
                                        : activate to sort column ascending"
                                                    style="min-width: 30px">
                                                    <label
                                                        class="text-teal-500 inline-flex hover:bg-gray-200 px-2 py-2 rounded-lg cursor-pointer">
                                                        Giá
                                                    </label>
                                                </th>
                                                <th class="py-2 px-3 sticky top-0 border-b border-gray-200 bg-gray-100 w-40 sorting"
                                                    tabindex="0" aria-controls="dataTable" rowspan="1"
                                                    colspan="1"
                                                    aria-label="
                                            
                                                Trạng thái
                                            
                                        : activate to sort column ascending"
                                                    style="min-width: 70px">
                                                    <label
                                                        class="text-teal-500 inline-flex hover:bg-gray-200 px-2 py-2 rounded-lg cursor-pointer">
                                                        Trạng thái
                                                    </label>
                                                </th>
                                                <th class="py-2 px-3 sticky top-0 border-b border-gray-200 bg-gray-100 sorting sorting_desc"
                                                    tabindex="0" aria-controls="dataTable" rowspan="1"
                                                    colspan="1"
                                                    aria-label="
                                            
                                                Tạo lúc


                                            
                                        : activate to sort column ascending"
                                                    style="min-width: 60px" aria-sort="descending">
                                                    <label
                                                        class="text-teal-500 inline-flex hover:bg-gray-200 px-2 py-2 rounded-lg cursor-pointer">
                                                        Tạo lúc
                                                    </label>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($listOrder as $item)
                                                <tr>
                                                    <td style="text-align:center">{{ $item->id }}</td>
                                                    <td style="text-align:center">{{ $item->type }}</td>
                                                    <td style="text-align:left">{{ $item->link_order }}</td>
                                                    <td style="text-align:center">{{ $item->server_order }}</td>
                                                    <td style="text-align:center">{{ $item->amount }}</td>
                                                    <td style="text-align:center">{{ $item->price }}</td>
                                                    <td style="text-align:center">
                                                        @if ($item->status == 'Start')
                                                            <span
                                                                style="background:#55b714;padding:4px 6px;border-radius:7px;color:#fff;font-size:13px">Đang
                                                                chạy</span>
                                                        @elseif ($item->status == 'Pending')
                                                            <span
                                                                style="background:#3796e9;padding:4px 6px;border-radius:7px;color:#fff;font-size:13px">Chờ
                                                                xử lý</span>
                                                        @elseif ($item->status == 'Success')
                                                            <span
                                                                style="background:#51b714;padding:4px 6px;border-radius:7px;color:#fff;font-size:13px">Đã
                                                                hoàn thành</span>
                                                        @elseif ($item->status == 'Cancel')
                                                            <span
                                                                style="background:#da2f29;padding:4px 6px;border-radius:7px;color:#fff;font-size:13px">Đã
                                                                hủy</span>
                                                        @endif
                                                    </td>
                                                    <td style="text-align:center">{{ $item->created_at }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>

                                </div>
                            </div>


                        </div>



                    </div>
                    <!-- END: Form Validation -->
                </div>
            </div>
            {{-- thông báo like --}}
            @if ($type == 'like-sale' || $type == 'like-speed' || $type == 'like-comment')
                <div class="intro-y col-span-12 lg:col-span-4 bg-theme-7 p-2" style="border-radius: 5px">
                    <p style=""><span class="font-bold" style=""><b>
                                <font color="#ff0000">{{ $title }} </font>
                            </b>&nbsp;</span>là gói {{ $title }} giá rẻ tự động tăng Like mỗi khi bạn đăng bài viết
                        mới&nbsp;<b><span class="font-bold text-danger" style="">tối đa cho 5 bài viết 1
                                ngày</span>.</b> Người Like là tài khoản Facebook Việt Nam có Avatar.</p>
                    <p style="">- Hệ thống tăng tối đa cho mỗi bài viết:&nbsp;<span class="font-bold text-danger"
                            style=""><b>2.000 Like</b></span>, tức gói {{ $title }} cao nhất là:&nbsp;<span
                            class="font-bold text-danger" style=""><b>2.000 Like</b></span></p>
                    <p style=""><span class="font-bold text-danger" style=""><b>
                                <font color="#ff0000">- Hệ thống chạy like tự động từ 7h sáng tới 23h đêm - ngoài thời gian
                                    này sẽ không lên like</font>
                            </b></span></p>
                    <p class="font-bold text-danger mb-0" style=""><b>
                            <font color="#0000ff">- Hệ thống chỉ tăng Like cho các bài viết đăng mới, công khai , chỉ tăng
                                cho trang cá nhân và fanpage (không hỗ trợ nhóm).</font>
                        </b></p>
                    <p class="font-bold text-danger mb-0" style=""><b>
                            <font color="#0000ff">- Vui lòng không cài viplike nhiều server để tránh tình trạng lên like
                                thiếu</font>
                        </b></p>
                </div>
            @endif
            {{-- thông báo sub --}}
            @if ($type == 'sub-vip' || $type == 'sub-quality' || $type == 'sub-sale' || $type == 'sub-speed')
                <div class="intro-y col-span-12 lg:col-span-4 bg-theme-7 p-2" style="border-radius: 5px">
                    <p>
                        <font color="#ff0000"><b>{{ $title }}</b></font>
                    </p>
                    <p>+ Tài nguyên clone nuôi có tương tác</p>
                    <p>+ Tùy lượng đơn mỗi ngày hệ thống có lúc nhanh - chậm&nbsp;</p>
                    <p>+ Tăng được cho page profile , profile&nbsp;</p>
                    <p><span style="outline: none !important;"><span style="font-weight: bolder;">
                                <font color="#ff0000">Hủy Đơn</font>
                            </span></span><span style="outline: none !important;">&nbsp;: sẽ được hoàn tiền số follow chưa
                            tăng</span></p>
                    <p><span style="outline: none !important;"><b>
                                <font color="#ff0000">Đối với {{ $title }} cho trang cá nhân yêu cầu cài đặt
                                    :&nbsp;</font>
                            </b><br></span>+ Phải trên 18 tuổi</p>
                    <p>+ Hiện số lượng follow -&gt; chỉnh sửa chi tiết trong trang cá nhân</p>
                    <p>+ Công khai : cài đặt -&gt; Bài viết công khai -&gt; Ai có thể theo dõi tôi (Mọi người)&nbsp;</p>
                    <p>+ Công khai : cài đặt -&gt; Quyền riêng tư -&gt; Ai có thể gửi cho bạn lời mời kết bạn (Mọi
                        người)&nbsp;</p>
                    <p><b>
                            <font color="#ff0000">NGHIÊM CẤM {{ $title }} ĐỂU BÊN KHÁC XONG QUAY SANG BÊN MÌNH BUFF
                                TIẾP
                            </font>
                            <font color="#0000ff">-&gt;</font>
                            <font color="#ff0000"> ĐẾN KHI TỤT </font>
                            <font color="#0000ff">-&gt;</font>
                            <font color="#ff0000"> KHÔNG HỖ TRỢ BẢO HÀNH&nbsp;</font>
                        </b></p>
                    <p><b>
                            <font color="#ff0000">KHÔNG ĐƯỢC {{ $title }} NHIỀU SERVER CÙNG LÚC </font>
                            <font color="#0000ff">-&gt;</font>
                            <font color="#ff0000"> TRÁNH LÊN THIẾU</font>
                        </b></p>
                </div>
            @endif
            {{-- eyes --}}
            @if ($type == 'eye-live')
                <div class="intro-y col-span-12 lg:col-span-4 bg-theme-7 p-2" style="border-radius: 5px">


                    <p style="margin-right: 0px; margin-bottom: 0px; margin-left: 0px; outline: none !important;"><span
                            style="outline: none !important;"><span
                                style="color: rgb(255, 0, 0); font-weight: 700;">{{ $title }}</span><br></span></p>
                    <p style="margin-right: 0px; margin-bottom: 0px; margin-left: 0px; outline: none !important;"><span
                            style="outline: none !important;">- Hoạt động 24/24</span></p>
                    <p style="margin: 5px 0px 0px; outline: none !important;"><span style="outline: none !important;">- Tỷ
                            lệ lên mắt từ 80%- 100% ( thời điểm hiện tại Facebook đang quét mạnh )</span></p>
                    <p style="margin: 5px 0px 0px; outline: none !important;"><span style="font-size: 1rem;">-
                            {{ $title }}
                            đôi lúc có 1 số server lỗi hoặc gặp vấn đề không mong muốn bạn vui lòng ib&nbsp; mình sẽ xử lý
                            nhé</span><br></p>
                    <p style="margin: 5px 0px 0px; outline: none !important;"><span style="outline: none !important;">-
                            hiện tại {{ $title }} đang ổn định</span></p>
                </div>
            @endif

            {{-- comment --}}

            @if ($type == 'comment-sale' || $type == 'comment-speed')
                <div class="intro-y col-span-12 lg:col-span-4 bg-theme-7 p-2" style="border-radius: 5px">
                    <p style="margin-right: 0px; margin-bottom: 0px; margin-left: 0px; outline: none !important;"><span
                            style="outline: none !important;"><span style="outline: none !important;"><span
                                    style="outline: none !important;">
                                    <font color="#ff0000"><b> {{ $title }}</b></font><br>
                                </span></span></span></p>
                    <p style="margin-right: 0px; margin-bottom: 0px; margin-left: 0px; outline: none !important;"><span
                            style="outline: none !important;"><span style="outline: none !important;"><span
                                    style="outline: none !important;"> {{ $title }} do FB hạn chế nên đôi lúc sẽ
                                    thiếu
                                    comment ( bên mình sẽ không bảo hành )</span></span></span></p>
                    <p style="margin: 5px 0px 0px; outline: none !important;"><span
                            style="outline: none !important;"><span style="outline: none !important;"><span
                                    style="outline: none !important;">Vui lòng buff test 1 ít comment xem đơn có lên được
                                    không</span></span></span></p>
                    <p style="margin: 5px 0px 0px; outline: none !important;"><span
                            style="outline: none !important;"><span style="outline: none !important;"><span
                                    style="outline: none !important;"><b>
                                        <font color="#0000ff"> {{ $title }} loại 1</font>
                                    </b></span></span></span></p>
                    <p style="margin: 5px 0px 0px; outline: none !important;"><span
                            style="outline: none !important;"><span style="outline: none !important;"><span
                                    style="outline: none !important;"> {{ $title }} không lên được trong nhóm vì
                                    tài khoản
                                    phải tham gia nhóm với comment được cái này là điều đương nhiên tránh 1 số câu hỏi hơi
                                    thừa&nbsp;</span></span></span></p>
                    <p style="margin: 5px 0px 0px; outline: none !important;"><span
                            style="outline: none !important;"><span style="outline: none !important;">+ Người thật hoạt
                                động đi comment</span></span></p>
                    <p style="margin: 5px 0px 0px; outline: none !important;"><span
                            style="outline: none !important;"><span style="outline: none !important;">+ Loại 1 vui lòng
                                buff số lượng ít ( nên dưới 50 comment )</span></span></p>
                    <p style="margin: 5px 0px 0px; outline: none !important;"><span
                            style="outline: none !important;"><span style="outline: none !important;">+ Nên buff test
                                trước 5-10 comment xem có lên không vì đôi lúc comment bị ẩn và lên thiếu</span></span></p>
                    <p style="margin: 5px 0px 0px; outline: none !important;"><span
                            style="outline: none !important;"><span style="outline: none !important;">+ Chỉ buff được cho
                                bài post thôi nhé</span></span></p>
                    <p style="margin: 5px 0px 0px; outline: none !important;"><span
                            style="outline: none !important;"><span style="outline: none !important;"><span
                                    style="outline: none !important;"><b>
                                        <font color="#0000ff"> {{ $title }} loại 2</font>
                                    </b></span></span></span></p>
                    <p style="margin: 5px 0px 0px; outline: none !important;"><span style="outline: none !important;">+
                            Không buff được cho live stream</span></p>
                    <p style="margin: 5px 0px 0px; outline: none !important;"><span style="outline: none !important;">+
                            Tài nguyên đã số là nữ comment</span></p>
                    <p style="margin: 5px 0px 0px; outline: none !important;"><span style="outline: none !important;">+
                            Loại này lên ổn định nhất&nbsp;</span></p>
                    <p style="margin: 5px 0px 0px; outline: none !important;"><span style="outline: none !important;">+
                            Nên buff test trước</span></p>
                    <p style="margin: 5px 0px 0px; outline: none !important;"><span style="outline: none !important;">+
                            không&nbsp;dùng được icon&nbsp;</span></p>
                    <p style="margin: 5px 0px 0px; outline: none !important;"><span
                            style="outline: none !important;">+không lên dạng video</span></p>
                    <p style="margin: 5px 0px 0px; outline: none !important;"><span
                            style="outline: none !important;"><span style="outline: none !important;"><span
                                    style="outline: none !important;"><b>
                                        <font color="#0000ff"> {{ $title }} loại 3 ( lên nhanh )</font>
                                    </b></span></span></span></p>
                    <p style="margin: 5px 0px 0px; outline: none !important;"><span
                            style="outline: none !important;"><span style="outline: none !important;">+ Có thể buff đơn
                                lớn 200-500 cmt</span></span></p>
                    <p style="margin: 5px 0px 0px; outline: none !important;"><span
                            style="outline: none !important;"><span style="outline: none !important;">+
                                {{ $title }} loại
                                3 hay sảy ra hiện tương lặp comment nên mọi người chú ý trước khi cài</span></span></p>
                    <p style="margin: 5px 0px 0px; outline: none !important;"><span
                            style="outline: none !important;"><span style="outline: none !important;">+ Nên buff test
                                trước&nbsp;</span></span></p>
                    <p style="margin: 5px 0px 0px; outline: none !important;"><span
                            style="outline: none !important;"><span style="outline: none !important;">+ Nếu buff đơn lớn
                                vui lòng chia nhiều lần buff tầm 50-100 cmt / lần</span></span></p>
                    <p style="margin: 5px 0px 0px; outline: none !important;"><span
                            style="outline: none !important;"><span style="outline: none !important;">+ Hạn chế nội dung
                                quá nhiều ( chỉ cần 10-20 nội dung thôi )&nbsp;</span></span></p>
                    <p style="margin: 5px 0px 0px; outline: none !important;"><span style="outline: none !important;">+
                            Không dùng icon khi buff</span></p>
                    <p style="margin: 5px 0px 0px; outline: none !important;"><span
                            style="outline: none !important;"><span style="outline: none !important;"><span
                                    style="outline: none !important;"><b>
                                        <font color="#0000ff"> {{ $title }} loại 4 ( lên nhanh )</font>
                                    </b></span></span></span></p>
                    <p style="margin: 5px 0px 0px; outline: none !important;"><span
                            style="outline: none !important;"><span style="outline: none !important;">+ lên nhanh trong 5-
                                10 phút</span></span></p>
                    <p style="margin: 5px 0px 0px; outline: none !important;"><span
                            style="outline: none !important;"><span style="outline: none !important;">+ lên được cho live
                                stream</span></span></p>
                    <p style="margin: 5px 0px 0px; outline: none !important;"><span
                            style="outline: none !important;"><span style="outline: none !important;">+ nên test 1 ít
                                trước khi buff nhé</span></span></p>
                    <p style="margin: 5px 0px 0px; outline: none !important;"><span
                            style="outline: none !important;"><span style="outline: none !important;">+ sử dụng được
                                icon&nbsp;</span></span></p>
                    <p style="margin: 5px 0px 0px; outline: none !important;"><span
                            style="outline: none !important;"><span style="outline: none !important;">+ lên được cho bài
                                trong group&nbsp;</span></span></p>
                    <p style="margin: 5px 0px 0px; outline: none !important;"><span
                            style="outline: none !important;"><span
                                style="outline: none !important;">+&nbsp;</span></span>Tạo comment cho group thì group phải
                        công khai và object_id phải là dạng groupId_postId, ví dụ: 231350177556959_53684602739369</p>
                    <p style="margin: 5px 0px 0px; outline: none !important;"><span style="font-weight: bolder;">
                            <font color="#0000ff"> {{ $title }} loại 5 ( bảo trì )</font>
                        </span></p>
                    <p style="margin: 5px 0px 0px; outline: none !important;"><span
                            style="outline: none !important;"><span style="outline: none !important;"><span
                                    style="outline: none !important;"><span style="font-weight: bolder;">
                                        <font color="#0000ff"> {{ $title }} loại 6 ( lên nhanh )</font>
                                    </span></span></span></span></p>
                    <p style="margin: 5px 0px 0px; outline: none !important;"><span style="outline: none !important;">+
                            lên nhanh trong 5- 10 phút</span></p>
                    <p style="margin: 5px 0px 0px; outline: none !important;"><span style="font-size: 1rem;">+ nên test 1
                            ít trước khi buff nhé</span><br></p>
                    <p style="margin: 5px 0px 0px; outline: none !important;"><span style="outline: none !important;">+ sử
                            dụng được icon&nbsp;</span></p>
                    <p style="margin: 5px 0px 0px; outline: none !important;"><span
                            style="outline: none !important;"><span style="outline: none !important;"><span
                                    style="outline: none !important;"><span style="font-weight: bolder;">
                                        <font color="#0000ff"> {{ $title }} loại 7 ( lên nhanh )</font>
                                    </span></span></span></span></p>
                    <p style="margin: 5px 0px 0px; outline: none !important;"><span style="outline: none !important;">+
                            lên nhanh trong 5- 10 phút</span></p>
                    <p style="margin: 5px 0px 0px; outline: none !important;"><span style="outline: none !important;">+
                            lên được cho live stream</span></p>
                    <p style="margin: 5px 0px 0px; outline: none !important;"><span style="outline: none !important;">+
                            nên test 1 ít trước khi buff nhé</span></p>
                    <p style="margin: 5px 0px 0px; outline: none !important;"><span style="outline: none !important;">+ sử
                            dụng được icon&nbsp;</span></p>
                    <p style="margin: 5px 0px 0px; outline: none !important;"><span
                            style="outline: none !important;"></span></p>
                    <ul style="margin-right: 0px; margin-left: 0px; padding: 0px;">
                        <li style="margin: 0px; padding: 0px;"><b>
                                <font color="#ff0000">- Nghiêm cấm những bình luận có cử chỉ, lời nói thô bạo, khiêu khích,
                                    trêu ghẹo, xúc phạm nhân phẩm, danh dự của Cá nhân hoặc Tổ chức.</font>
                            </b></li>
                        <li style="margin: 0px; padding: 0px;"><b>
                                <font color="#ff0000">- Nếu cố tình buff bạn sẽ bị trừ hết tiền và ban khỏi hệ thống vĩnh
                                    viễn, và phải chịu hoàn toàn trách nhiệm trước pháp luật.</font>
                            </b></li>
                    </ul>
                </div>
            @endif

            {{-- share profile --}}
            @if ($type == 'share-profile')
                <div class="intro-y col-span-12 lg:col-span-4 bg-theme-7 p-2" style="border-radius: 5px">


                    <p
                        style="margin-right: 0px; margin-bottom: 0px; margin-left: 0px; color: rgb(0, 0, 0); font-family: &quot;Helvetica Neue&quot;, Roboto, Arial, &quot;Droid Sans&quot;, sans-serif; font-size: 13px; outline: none !important;">
                        <span style="color: rgb(231, 76, 60); outline: none !important;"><span
                                style="outline: none !important;"><span
                                    style="font-weight: 700; outline: none !important;"><span
                                        style="color: rgb(255, 0, 0); font-family: &quot;Source Sans Pro&quot;, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;; font-size: 16px;">{{ $title }}</span><br></span></span></span>
                    </p>
                    <p style="margin-right: 0px; margin-bottom: 0px; margin-left: 0px; outline: none !important;"><span
                            style="outline: none !important;"><span style="outline: none !important;">
                                <font color="#0000ff"><b>Buff &nbsp;server 1</b></font>
                            </span></span></p>
                    <p style="margin: 5px 0px 0px; outline: none !important;">+ min 100 share</p>
                    <p style="margin: 5px 0px 0px; outline: none !important;">+ thời gian hoạt động từ 8h đến 24h nhé</p>
                    <p style="margin: 5px 0px 0px; outline: none !important;">+ share được bài post , group công khai , bài
                        viết trên page , live stream</p>
                    <p style="margin: 5px 0px 0px; outline: none !important;"><b style="font-size: 1rem;">
                            <font color="#0000ff"><span style="font-size: 1rem;">Buff server 2 ( share profile
                                    )&nbsp;</span>
                            </font>
                        </b><br></p>
                    <p style="margin: 5px 0px 0px; outline: none !important;"><span style="outline: none !important;">+
                            min 100 share</span></p>
                    <p style="margin: 5px 0px 0px; outline: none !important;">+ share lên nhanh vào profile</p>
                    <p style="margin: 5px 0px 0px; outline: none !important;"><span
                            style="outline: none !important;"><span style="outline: none !important;">
                                <font color="#0000ff"><b>Buff server 3 ( share profile )</b></font>
                            </span></span></p>
                    <p style="margin: 5px 0px 0px; outline: none !important;">+&nbsp; min 100 share</p>
                    <p style="margin: 5px 0px 0px; outline: none !important;">+ thời gian hoạt động 8h đến 22h&nbsp;<br
                            style="outline: none !important;">+ nên dùng buff server 1 nhé</p>
                </div>
            @endif

            {{-- view --}}

            @if ($type == 'view-video' || $type == 'view-story')
                <div class="intro-y col-span-12 lg:col-span-4 bg-theme-7 p-2" style="border-radius: 5px">
                    <p style="margin-right: 0px; margin-bottom: 0px; margin-left: 0px; outline: none !important;"><span
                            style="outline: none !important;"><span
                                style="color: rgb(255, 0, 0); font-weight: 700;">{{ $title }}</span><br></span></p>
                    <p style="margin-right: 0px; margin-bottom: 0px; margin-left: 0px; outline: none !important;"><span
                            style="outline: none !important;">- Hoạt động 24/24</span></p>
                    <p style="margin: 5px 0px 0px; outline: none !important;"><span style="font-size: 1rem;">-
                            {{ $title }}
                            đôi lúc có 1 số server lỗi hoặc gặp vấn đề không mong muốn bạn vui lòng ib&nbsp; mình sẽ xử lý
                            nhé</span><br></p>
                    <p style="margin: 5px 0px 0px; outline: none !important;"><span style="outline: none !important;">-
                            hiện tại {{ $title }} đang ổn định</span></p>
                    <h6 style="line-height: 1.1; margin-top: 10px; margin-bottom: 10px; outline: none !important;"
                        class=""><b>
                            <font color="#ff0000">Lưu ý các dịch vụ phải sử dụng&nbsp;Access Token (cookies)</font>
                        </b><b style="font-family: inherit; font-size: 1rem;">
                            <font color="#ff0000" style="">&nbsp;vào nên sử dụng clone tránh die tài khoản chính
                            </font>
                        </b></h6>
                    <p style="margin-right: 0px; margin-bottom: 0px; margin-left: 0px; outline: none !important;">các dịch
                        vụ như :</p>
                    <p style="margin-right: 0px; margin-bottom: 0px; margin-left: 0px; outline: none !important;">+ Xem on
                        live</p>
                    <p style="margin-right: 0px; margin-bottom: 0px; margin-left: 0px; outline: none !important;">+ Xem on
                        live 60k phút : <b>
                            <font color="#0000ff">Nên set 1 tài khoản clone có quyền trong page (thấp nhất là nhà quảng cáo
                                hoặc biên tập viên) Khi live stream thì live ít nhất 4 giờ</font>
                        </b><br style="outline: none !important;"></p>
                    <p style="margin-right: 0px; margin-bottom: 0px; margin-left: 0px; outline: none !important;">+ Xem on
                        live 100k phút :&nbsp;<span style="font-weight: bolder;">
                            <font color="#0000ff">Nên set 1 tài khoản clone có quyền trong page (thấp nhất là nhà quảng cáo
                                hoặc biên tập viên) Khi live stream thì live ít nhất 4 giờ</font>
                        </span><br></p>
                    <p style="margin-right: 0px; margin-bottom: 0px; margin-left: 0px; outline: none !important;">
                        +&nbsp;15k tương tác</p>
                    <p style="margin: 5px 0px 0px; outline: none !important;">+ Xem 600k phút :&nbsp;&nbsp;:&nbsp;<span
                            style="font-weight: bolder;">
                            <font color="#0000ff">Nên set 1 tài khoản clone có quyền trong page (thấp nhất là nhà quảng cáo
                                hoặc biên tập viên) Độ dài video từ 2h3s</font>
                        </span><br style="outline: none !important;">+&nbsp;Xem 600k phút, 60k phút live<span
                            style="font-size: 1rem;">&nbsp;</span><span style="font-size: 1rem;">:&nbsp;</span><span
                            style="font-size: 1rem; font-weight: bolder;">
                            <font color="#0000ff">Nên set 1 tài khoản clone có quyền trong page (thấp nhất là nhà quảng cáo
                                hoặc biên tập viên) Khi live stream thì live ít nhất 4 giờ</font>
                        </span></p>
                    <p style="margin: 5px 0px 0px; outline: none !important;"><span
                            style="outline: none !important;"></span></p>
                    <p style="margin: 5px 0px 0px; outline: none !important;">có<span
                            style="color: rgb(255, 0, 0); font-weight: bolder; font-size: 1rem;">&nbsp;</span>Access
                        Token<span style="font-size: 1rem;">&nbsp;(cookies) của page đó mới check được số view đã lên chính
                            xác</span></p>
                </div>
            @endif

            {{-- member-group --}}

            @if ($type == 'member-group')
                <div class="intro-y col-span-12 lg:col-span-4 bg-theme-7 p-2" style="border-radius: 5px">


                    <p>
                        <font color="#ff0000"><span style="font-weight: bolder;">BUFF&nbsp; {{ $title }}</span>
                        </font>
                    </p>
                    <p>+ Tài nguyên clone nuôi có tương tác</p>
                    <p>+ Tùy lượng đơn mỗi ngày hệ thống có lúc nhanh - chậm&nbsp;</p>
                    <p>+&nbsp;Hiện tại chưa thấy tụt</p>
                    <p><span style="outline: none !important;">
                            <font color="#0000ff"><b>- Vui lòng tắt duyệt thành viên ở mục cài đặt ( tự động phê duyệt
                                    thành viên ).</b></font>
                        </span></p>
                    <p><span style="outline: none !important;">
                            <font color="#0000ff"><b>- Tắt câu hỏi khi tham gia nhóm</b></font>
                        </span><br></p>
                    <p><span style="outline: none !important;"><span style="font-weight: bolder;">
                                <font color="#ff0000">Hủy Đơn</font>
                            </span></span><span style="outline: none !important;">&nbsp;: sẽ được hoàn tiền số member chưa
                            tăng</span></p>
                    <p><span style="font-weight: bolder;">
                            <font color="#ff0000">NGHIÊM CẤM BUFF&nbsp;</font>
                        </span><span style="color: rgb(255, 0, 0); font-weight: 700;">{{ $title }}</span><span
                            style="color: rgb(255, 0, 0); font-weight: 700;">&nbsp;</span><span
                            style="font-weight: bolder;">
                            <font color="#ff0000">ĐỂU BÊN KHÁC XONG QUAY SANG BÊN MÌNH BUFF TIẾP&nbsp;</font>
                            <font color="#0000ff">-&gt;</font>
                            <font color="#ff0000">&nbsp;ĐẾN KHI TỤT&nbsp;</font>
                            <font color="#0000ff">-&gt;</font>
                            <font color="#ff0000">&nbsp;KHÔNG HỖ TRỢ&nbsp;</font>
                        </span></p>
                    <p><span style="font-weight: bolder;">
                            <font color="#ff0000">KHÔNG ĐƯỢC BUFF&nbsp;</font>
                        </span><span style="color: rgb(255, 0, 0); font-weight: 700;">{{ $title }}</span><span
                            style="color: rgb(255, 0, 0); font-weight: 700;">&nbsp;</span><span
                            style="font-weight: bolder;">
                            <font color="#ff0000">NHIỀU SERVER CÙNG LÚC&nbsp;</font>
                            <font color="#0000ff">-&gt;</font>
                            <font color="#ff0000">&nbsp;TRÁNH LÊN THIẾU</font>
                        </span></p>
                </div>
            @endif
        </div>
        <!-- END: Content -->

    @endsection
    @if ($type == 'like-sale' || $type == 'like-speed' || $type == 'like-comment')
        @section('script')
            <script>
                $(document).ready(function() {
                    var like = "{{ asset('huycode/images/service/like.png') }}";
                    var love = "{{ asset('huycode/images/service/love.png') }}";
                    var haha = "{{ asset('huycode/images/service/haha.png') }}";
                    var wow = "{{ asset('huycode/images/service/wow.png') }}";
                    var sad = "{{ asset('huycode/images/service/sad.png') }}";
                    var angry = "{{ asset('huycode/images/service/angry.png') }}";
                    var reaction = $('input[name="reaction"]:checked').val();
                    if (reaction == 'like') {
                        $('#show_Reaction').html('<img src="' + like + '" ">');
                    } else if (reaction == 'love') {
                        $('#show_Reaction').html('<img src="' + love + '" ">');
                    } else if (reaction == 'haha') {
                        $('#show_Reaction').html('<img src="' + haha + '" ">');
                    } else if (reaction == 'wow') {
                        $('#show_Reaction').html('<img src="' + wow + '" ">');
                    } else if (reaction == 'sad') {
                        $('#show_Reaction').html('<img src="' + sad + '" ">');
                    } else if (reaction == 'angry') {
                        $('#show_Reaction').html('<img src="' + angry + '" ">');
                    }
                    $('input[name="reaction"]').change(function() {
                        reaction = $('input[name="reaction"]:checked').val();
                        if (reaction == 'like') {
                            $('#show_Reaction').html('<img src="' + like + '" ">');
                        } else if (reaction == 'love') {
                            $('#show_Reaction').html('<img src="' + love + '" ">');
                        } else if (reaction == 'haha') {
                            $('#show_Reaction').html('<img src="' + haha + '" ">');
                        } else if (reaction == 'wow') {
                            $('#show_Reaction').html('<img src="' + wow + '" ">');
                        } else if (reaction == 'sad') {
                            $('#show_Reaction').html('<img src="' + sad + '" ">');
                        } else if (reaction == 'angry') {
                            $('#show_Reaction').html('<img src="' + angry + '" ">');
                        }
                    });
                });
            </script>
        @endsection
    @endif
    @if ($type == 'comment-sale' || $type == 'comment-speed')
        @section('script')
            <script>
                $(document).ready(function() {
                    $('#comment').keyup(function() {
                        var comment = $(this).val();
                        var lines = comment.split('\n').length;
                        let prices = $('input[name=server_order]:checked').attr('price');
                        var amount = Math.round(lines * prices) ?? 0;
                        $('#amount').html(lines);
                        $('#payment').html(Intl.NumberFormat().format(amount));
                    });
                });
            </script>
        @endsection
    @endif

    @section('script')
        <script src="{{ asset('') }}huycode/plugins/datatable/js/jquery.dataTables.min.js"></script>
        <script src="{{ asset('') }}huycode/plugins/datatable/js/dataTables.bootstrap5.js"></script>
        <script src="{{ asset('') }}huycode/plugins/datatable/js/dataTables.buttons.min.js"></script>
        <script src="{{ asset('') }}huycode/plugins/datatable/js/buttons.bootstrap5.min.js"></script>
        <script src="{{ asset('') }}huycode/plugins/datatable/js/jszip.min.js"></script>
        <script src="{{ asset('') }}huycode/plugins/datatable/pdfmake/pdfmake.min.js"></script>
        <script src="{{ asset('') }}huycode/plugins/datatable/pdfmake/vfs_fonts.js"></script>
        <script src="{{ asset('') }}huycode/plugins/datatable/js/buttons.html5.min.js"></script>
        <script src="{{ asset('') }}huycode/plugins/datatable/js/buttons.print.min.js"></script>
        <script src="{{ asset('') }}huycode/plugins/datatable/js/buttons.colVis.min.js"></script>
        <script src="{{ asset('') }}huycode/plugins/datatable/dataTables.responsive.min.js"></script>
        <script src="{{ asset('') }}huycode/plugins/datatable/responsive.bootstrap5.min.js"></script>
        <script src="{{ asset('') }}huycode/js/table-data.js"></script>
    @endsection
