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
                                <th>Username</th>
                                <th>Loại</th>
                                <th>Số lượng</th>
                                <th>Tổng tiền</th>
                                <th>Giá tiền sv</th>
                                <th>Link order</th>
                                <th>Máy chủ</th>
                                <th>Trạng thái</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($order as $item)
                               @if ($item->status == 'Pending')
                               <tr>
                                <td>{{ $item->username }}</td>
                                <td>{{ $item->type }}</td>
                                <td>{{ $item->amount }}</td>
                                <td>{{ $item->total_money }}</td>
                                <td>{{ $item->price }}</td>
                                <td>{{ $item->link_order }}</td>
                                <td>{{ $item->server_order }}</td>
                                <td>@if ($item->status == 'Pending')
                                    <span class="badge bg-warning">Chờ duyệt</span>
                                     @elseif ($item->status == 'Start')
                                     <span class="badge bg-success">Đang hoạt động</span>
                                     @elseif ($item->status == 'Success')
                                     <span class="badge bg-success">Đã hoàn thành</span>
                                  @endif
                                 </td>
                               </tr>
                                @elseif ($item->status == 'Start')
                                <tr>
                                    <td>{{ $item->username }}</td>
                                    <td>{{ $item->type }}</td>
                                    <td>{{ $item->amount }}</td>
                                    <td>{{ $item->total_money }}</td>
                                    <td>{{ $item->price }}</td>
                                    <td>{{ $item->link_order }}</td>
                                    <td>{{ $item->server_order }}</td>
                                    <td>@if ($item->status == 'Pending')
                                        <span class="badge bg-warning">Chờ duyệt</span>
                                         @elseif ($item->status == 'Start')
                                         <span class="badge bg-success">Đang hoạt động</span>
                                         @elseif ($item->status == 'Success')
                                         <span class="badge bg-success">Đã hoàn thành</span>
                                      @endif
                                     </td>
                                </tr>
                                @elseif ($item->status == 'Success')
                                <tr>
                                    <td>{{ $item->username }}</td>
                                    <td>{{ $item->type }}</td>
                                    <td>{{ $item->amount }}</td>
                                    <td>{{ $item->total_money }}</td>
                                    <td>{{ $item->price }}</td>
                                    <td>{{ $item->link_order }}</td>
                                    <td>{{ $item->server_order }}</td>
                                    <td>@if ($item->status == 'Pending')
                                        <span class="badge bg-warning">Chờ duyệt</span>
                                         @elseif ($item->status == 'Start')
                                         <span class="badge bg-success">Đang hoạt động</span>
                                         @elseif ($item->status == 'Success')
                                         <span class="badge bg-success">Đã hoàn thành</span>
                                      @endif
                                     </td>
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