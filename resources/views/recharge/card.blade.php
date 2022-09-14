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
                    <div class="col-xl-12 col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('card.post') }}" ajax-request="huycoder" method="POST">
                                    <h4 class="card-title">Tỷ giá: 1 VNĐ = 1 coin</h4>
                                    <div class="row mt-2">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="card_type" class="form-label">Loại thẻ</label>
                                                {{-- select --}}
                                                @if ($site_config->getValuebyName('card_type') == 'thesieure')
                                                    <select class="form-control select2 form-select " name="card_type"
                                                        id="card_type" data-placeholder="Chọn loại thẻ">
                                                        <option label="Chọn loại thẻ"></option>
                                                        <option value="VIETTEL">Viettel (Chiết khấu
                                                            {{ $site_config->getValuebyName('card_discount') }}%)</option>
                                                        <option value="MOBIFONE">Mobifone (Chiết khấu
                                                            {{ $site_config->getValuebyName('card_discount') }}%)</option>
                                                        <option value="VINAPHONE">Vinaphone (Chiết khấu
                                                            {{ $site_config->getValuebyName('card_discount') }}%)</option>
                                                        <option value="VNMOBI">Vietnamobile (Chiết khấu
                                                            {{ $site_config->getValuebyName('card_discount') }}%)</option>
                                                    </select>
                                                @elseif ($site_config->getValuebyName('card_type') == 'ttvpay')
                                                    <select class="form-control select2 form-select " name="card_type"
                                                        id="card_type" data-placeholder="Chọn loại thẻ">
                                                        <option label="Chọn loại thẻ"></option>
                                                        <option value="Viettel">Viettel (Chiết khấu
                                                            {{ $site_config->getValuebyName('card_discount') }}%)</option>
                                                        <option value="MobiFone">Mobifone (Chiết khấu
                                                            {{ $site_config->getValuebyName('card_discount') }}%)</option>
                                                        <option value="VinaPhone">Vinaphone (Chiết khấu
                                                            {{ $site_config->getValuebyName('card_discount') }}%)</option>
                                                        <option value="Vietnamobile">Vietnamobile (Chiết khấu
                                                            {{ $site_config->getValuebyName('card_discount') }}%)</option>
                                                    </select>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="card_price" class="form-label">Mệnh giá</label>
                                                {{-- select --}}
                                                <select class="form-control select2 form-select" name="card_price"
                                                    id="card_price" data-placeholder="Chọn mệnh giá">
                                                    <option label="Chọn loại thẻ"></option>
                                                    <option value="10000">10.000</option>
                                                    <option value="20000">20.000</option>
                                                    <option value="30000">30.000</option>
                                                    <option value="50000">50.000</option>
                                                    <option value="100000">100.000</option>
                                                    <option value="200000">200.000</option>
                                                    <option value="300000">300.000</option>
                                                    <option value="500000">500.000</option>
                                                    <option value="1000000">1.000.000</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="seri" class="form-label">Seri</label>
                                                <input type="number" id="seri" name="seri"
                                                    placeholder="Nhập seri của thẻ" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="code" class="form-label">Mã thẻ</label>
                                                <input type="number" id="code" name="code"
                                                    placeholder="Nhập mã thẻ của thẻ" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-1">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary btn-block btn-lg">Nạp thẻ
                                                ngay</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-12 col-md-12 col-lg-12">
                        <div class="card">
                            <div class="card-header border-bottom">
                                <h3 class="card-title">Lịch sử nạp</h3>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered text-nowrap border-bottom w-100 text-center"
                                        id="responsive-datatable">
                                        <thead>
                                            <tr>
                                                <th class="wd-15p border-bottom-0">ID</th>
                                                <th class="wd-15p border-bottom-0">Thời gian</th>
                                                <th class="wd-20p border-bottom-0">Loại thẻ</th>
                                                <th class="wd-15p border-bottom-0">Mệnh giá</th>
                                                <th class="wd-10p border-bottom-0">Seri</th>
                                                <th class="wd-25p border-bottom-0">Mã thẻ</th>
                                                <th class="wd-25p border-bottom-0">Trạng thái</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="odd">
                                                <td valign="top" colspan="100%">
                                                    <center> <img src="/img/nodata.svg" alt="" width="80"
                                                            height="80" class="pt-3">
                                                        <p class="pt-3">Không có dữ liệu để hiển thị</p>
                                                    </center>
                                                </td>
                                            </tr>
                                        </tbody>
                                        <tbody>
                                            @foreach ($history as $item)
                                                <tr>
                                                    <td>{{ $item->id }}</td>
                                                    <td>{{ $item->created_at }}</td>
                                                    <td>{{ $item->card_type }}</td>
                                                    <td>{{ $item->card_price }}</td>
                                                    <td>{{ $item->seri }}</td>
                                                    <td>{{ $item->code }}</td>
                                                    <td>
                                                        @if ($item->status == '0')
                                                            <span class="badge badge-warning">Chờ duyệt</span>
                                                        @elseif ($item->status == '1')
                                                            <span class="badge badge-success">Thành công</span>
                                                        @elseif ($item->status == '2')
                                                            <span class="badge badge-danger">Thẻ sai</span>
                                                        @endif
                                                    </td>
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
    <script>
        $(document).ready(function() {
            Swal.fire({
                title: 'Thông báo',
                text: 'Vui lòng chọn đúng mệnh giá thẻ nạp nhé !',
                icon: 'warning',
                confirmButtonText: 'Đóng'
            })
        });
    </script>
@endsection
