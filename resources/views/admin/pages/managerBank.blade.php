@extends('admin.layouts.app')
@section('content')
<div class="row g-gs">
    <div class="col-xl-12">
        <div class="nk-block nk-block-lg">
            <div class="nk-block-head">
                <div class="nk-block-head-content">
                    <h4 class="nk-block-title">Quản lí nạp tiền</h4>
                    <div class="nk-block-des">
                    </div>
                </div>
            </div>
            <div class="card card-bordered card-preview">
                @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @elseif (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
                @endif
                <div class="card-inner">
                    <h4>Nạp ATm</h4>
                    <table class="datatable-init table">
                        <thead>
                            <tr>
                                <th>Username</th>
                                <th>Loại ngân hàng</th>
                                <th>Người chuyển</th>
                                <th>Số tiền</th>
                                <th>Trạng thái</th>
                                <th>Mã gd</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($bank as $item)
                                @if ($item->type == 'bank')
                                    <tr>
                                        <td>{{ $item->username }}</td>
                                        <td>{{ $item->bank_name }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->thucnhan }}</td>
                                        <td>@if ($item->status == 2)
                                            <span class="badge badge-success">Thành công</span>
                                            @else
                                            <span class="badge badge-danger">Thất bại</span>
                                            @endif</td>
                                            <td>{{ $item->transid }}</td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-inner">
                    <h4>Nạp Card</h4>
                    <table class="datatable-init table">
                        <thead>
                            <tr>
                                <th>Username</th>
                                <th>Loại thẻ</th>
                                <th>Mệnh giá</th>
                                <th>Serial</th>
                                <th>Code</th>
                                <th>Nhận</th>
                                <th>Trạng thái</th>
                                <th>Mã gd</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($bank as $item)
                            @if ($item->type == 'card')
                                <tr>
                                    <td>{{ $item->username }}</td>
                                    <td>{{ $item->card_type }}</td>
                                    <td>{{ $item->card_price }}</td>
                                    <td>{{ $item->serial }}</td>
                                    <td>{{ $item->code }}</td>
                                    <td>{{ $item->thucnhan }}</td>
                                    <td>@if ($item->status == 2)
                                        <span class="badge badge-success">Thành công</span>
                                        @elseif ($item->status == 0)
                                        <span class="badge badge-warning">Chờ xử lý</span>
                                        @else
                                        <span class="badge badge-danger">Thất bại</span>
                                        @endif</td>
                                        <td>{{ $item->transid }}</td>
                                </tr>
                            @endif
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection