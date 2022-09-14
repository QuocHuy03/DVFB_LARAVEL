@inject('site_config', 'App\Models\site_config')
@extends('layouts.app')
@section('content')
    <!--app-content open-->
    <div class="app-content main-content mt-0">
        <div class="side-app">

            <!-- CONTAINER -->
            <div class="main-container container-fluid">
                <!-- PAGE-HEADER -->
                <div class="page-header">
                    <div>
                        <h1 class="page-title">Trang chủ</h1>
                    </div>
                    <div class="ms-auto pageheader-btn">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Recharge</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Banking</li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12 col-md-12 col-lg-12">
                        <div class="card">
                            <div class="card-header border-bottom">
                                <h3 class="card-title">Lịch sử đơn hàng</h3>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered text-nowrap border-bottom w-100 text-center" id="responsive-datatable">
                                        <thead>
                                            <tr>
                                                <th class="wd-15p border-bottom-0">ID</th>
                                                <th class="wd-15p border-bottom-0">Thời gian</th>
                                                <th class="wd-20p border-bottom-0">Mã đơn</th>
                                                <th class="wd-15p border-bottom-0">Link</th>
                                                <th class="wd-10p border-bottom-0">Máy chủ</th>
                                                <th class="wd-25p border-bottom-0">Tương tác</th>
                                                <th class="wd-25p border-bottom-0">Số lượng</th>
                                                <th class="wd-25p border-bottom-0">Bắt đầu</th>
                                                <th class="wd-25p border-bottom-0">Đã tăng</th>
                                                <th class="wd-25p border-bottom-0">Giá</th>
                                                <th class="wd-25p border-bottom-0">Tổng tiền</th>
                                                <th class="wd-25p border-bottom-0">Trạng thái</th>
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
                                                    <td>@if ($item->status == 'Start')
                                                        <span class="badge badge-success">Đang chạy</span>
                                                    @elseif ($item->status == 'Pending')
                                                        <span class="badge badge-warning">Chờ xử lý</span>
                                                    @elseif ($item->status == 'Success')
                                                        <span class="badge badge-success">Đã hoàn thành</span>
                                                    @elseif ($item->status == 'Cancel')
                                                        <span class="badge badge-danger">Đã hủy</span>
                                                    @endif</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- CONTAINER CLOSED -->
    </div>
@endsection
@section('script')
    <script src="{{ asset('') }}lbd/plugins/datatable/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('') }}lbd/plugins/datatable/js/dataTables.bootstrap5.js"></script>
    <script src="{{ asset('') }}lbd/plugins/datatable/js/dataTables.buttons.min.js"></script>
    <script src="{{ asset('') }}lbd/plugins/datatable/js/buttons.bootstrap5.min.js"></script>
    <script src="{{ asset('') }}lbd/plugins/datatable/js/jszip.min.js"></script>
    <script src="{{ asset('') }}lbd/plugins/datatable/pdfmake/pdfmake.min.js"></script>
    <script src="{{ asset('') }}lbd/plugins/datatable/pdfmake/vfs_fonts.js"></script>
    <script src="{{ asset('') }}lbd/plugins/datatable/js/buttons.html5.min.js"></script>
    <script src="{{ asset('') }}lbd/plugins/datatable/js/buttons.print.min.js"></script>
    <script src="{{ asset('') }}lbd/plugins/datatable/js/buttons.colVis.min.js"></script>
    <script src="{{ asset('') }}lbd/plugins/datatable/dataTables.responsive.min.js"></script>
    <script src="{{ asset('') }}lbd/plugins/datatable/responsive.bootstrap5.min.js"></script>
    <script src="{{ asset('') }}lbd/js/table-data.js"></script>
@endsection