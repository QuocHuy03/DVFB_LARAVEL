@extends('admin.layouts.app')
@section('content')
<div class="row g-gs">
    <div class="col-xl-12">
        <div class="nk-block nk-block-lg">
            <div class="nk-block-head">
                <div class="nk-block-head-content">
                    <h4 class="nk-block-title">Quản lí người dùng</h4>
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
                    <table class="datatable-init table">
                        <thead>
                            <tr>
                                <th>Tên</th>
                                <th>Username</th>
                                <th>Cấp bậc</th>
                                <th>Số tiền</th>
                                <th>Tổng nạp</th>
                                <th>Tổng mua</th>
                                <th>Ip</th>
                                <th>Ngày tạo</th>
                                <th>Chức năng</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $item)
                                <tr>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->username }}</td>
                                    <td>
                                        @if ($item->level == 'member')
                                            <span class="badge bg-success">Thành viên</span>
                                        @elseif ($item->level == 'ctv')
                                            <span class="badge bg-warning">Cộng tác viên</span>
                                        @elseif ($item->level == 'dl')
                                            <span class="badge badge-danger">Đại lý</span>
                                        @elseif ($item->level == 'npp')
                                            <span class="badge bg-info">Nhà phân phối</span>
                                        @elseif ($item->level == 'admin')
                                            <span class="badge bg-primary">Admin</span>
                                        @endif
                                    </td>
                                    <td>{{ number_format($item->money) }}</td>
                                    <td>{{ number_format($item->total_charge) }}</td>
                                    <td>{{ number_format($item->total_minus) }}</td>
                                    <td>{{ $item->ip }}</td>
                                    <td>{{ $item->created_at }}</td>
                                    <td>
                                        <a href="{{ route('admin.clients.edit', $item->id) }}" class="btn btn-primary">Sửa</a>
                                        <a href="{{ route('admin.clients.delete', $item->id) }}" class="btn btn-danger">Xóa</a>
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
@endsection