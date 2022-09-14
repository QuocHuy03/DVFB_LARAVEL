{{-- @inject('site_config', 'App\Models\site_config')
@extends('app')
@section('title', 'Facebook V1')
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
                    <div id="orders" class="tab-pane mt-5" role="tabpanel" aria-labelledby="orders-tab">
                        <div class="box p-5 mt-5">
                            <div class="overflow-x-auto bg-white rounded-lg shadow overflow-y-auto relative">
                                <table id="dataTable"
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
                                                    Mã Đơn
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
                                                    Tương Tác
                                                </label>
                                            </th>
                                            <th class="py-2 px-3 sticky top-0 border-b border-gray-200 bg-gray-100">
                                                <label
                                                    class="text-teal-500 inline-flex hover:bg-gray-200 px-2 py-2 rounded-lg cursor-pointer">
                                                    Số Lượng
                                                </label>
                                            </th>
                                            <th class="py-2 px-3 sticky top-0 border-b border-gray-200 bg-gray-100 w-40">
                                                <label
                                                    class="text-teal-500 inline-flex hover:bg-gray-200 px-2 py-2 rounded-lg cursor-pointer">
                                                    Bắt Đầu
                                                </label>
                                            </th>
                                            <th class="py-2 px-3 sticky top-0 border-b border-gray-200 bg-gray-100 w-40">
                                                <label
                                                    class="text-teal-500 inline-flex hover:bg-gray-200 px-2 py-2 rounded-lg cursor-pointer">
                                                    Đã Tăng
                                                </label>
                                            </th>
                                            <th class="py-2 px-3 sticky top-0 border-b border-gray-200 bg-gray-100 w-40">
                                                <label
                                                    class="text-teal-500 inline-flex hover:bg-gray-200 px-2 py-2 rounded-lg cursor-pointer">
                                                    Giá
                                                </label>
                                            </th>
                                            <th class="py-2 px-3 sticky top-0 border-b border-gray-200 bg-gray-100 w-40">
                                                <label
                                                    class="text-teal-500 inline-flex hover:bg-gray-200 px-2 py-2 rounded-lg cursor-pointer">
                                                    Tổng Tiền
                                                </label>
                                            </th>
                                            <th class="py-2 px-3 sticky top-0 border-b border-gray-200 bg-gray-100 w-40">
                                                <label
                                                    class="text-teal-500 inline-flex hover:bg-gray-200 px-2 py-2 rounded-lg cursor-pointer">
                                                    Trạng Thái
                                                </label>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($orders as $item)
                                            <tr>
                                                <td>{{ $item->id }}</td>
                                                <td>{{ $item->created_at }}</td>
                                                <td>{{ $item->id_order }}</td>
                                                <td>{{ $item->link_order }}</td>
                                                <td>{{ $item->server_order }}</td>
                                                <td>{{ $item->interactive }}</td>
                                                <td>{{ $item->amount }}</td>
                                                <td>{{ $item->startWith }}</td>
                                                <td>{{ $item->buff }}</td>
                                                <td>{{ $item->price }}</td>
                                                <td>{{ $item->total_money }}</td>
                                                <td>
                                                    @if ($item->status == 'Start')
                                                        <span class="badge badge-success">Đang chạy</span>
                                                    @elseif ($item->status == 'Pending')
                                                        <span class="badge badge-warning">Chờ xử lý</span>
                                                    @elseif ($item->status == 'Success')
                                                        <span class="badge badge-success">Đã hoàn thành</span>
                                                    @elseif ($item->status == 'Cancel')
                                                        <span class="badge badge-danger">Đã hủy</span>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- END: Form Validation -->
                </div>
            </div>
            <div class="intro-y col-span-12 lg:col-span-4 bg-theme-7 p-2" style="border-radius: 5px">
                <p style=""><span class="font-bold" style=""><b>
                            <font color="#ff0000">VIP LIKE V1</font>
                        </b>&nbsp;</span>là gói Vip Like giá rẻ tự động tăng Like mỗi khi bạn đăng bài viết
                    mới&nbsp;<b><span class="font-bold text-danger" style="">tối đa cho 5 bài viết 1
                            ngày</span>.</b> Người Like là tài khoản Facebook Việt Nam có Avatar.</p>
                <p style="">- Hệ thống tăng tối đa cho mỗi bài viết:&nbsp;<span class="font-bold text-danger"
                        style=""><b>2.000 Like</b></span>, tức gói VIP Like cao nhất là:&nbsp;<span
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
    @endsection --}}
