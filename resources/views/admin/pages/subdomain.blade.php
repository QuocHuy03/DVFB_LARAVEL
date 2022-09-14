@extends('admin.layouts.app')
@section('content')
    <div class="row g-gs">
        <div class="col-xl-12">
            <div class="nk-block nk-block-lg">
                <div class="nk-block-head">
                    <div class="nk-block-head-content">
                        <h4 class="nk-block-title">Quản lí thông báo</h4>
                        <div class="nk-block-des">
                        </div>
                    </div>
                </div>
                <div class="card card-bordered card-preview">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @elseif (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                    <div class="card-inner">
                        <div class="card-body">
                            <form action="{{ route('admin.notice.update') }}" ajax-request="huycoder" method="POST">
                                <div class="form-group">
                                    <label for="tbday" class="form-label">Thông báo đẩy trang chủ</label>
                                    <textarea name="noticeHome" class="form-control" id="tbday" cols="30" rows="5"></textarea>
                                </div>
                                <div class="form-group mt-3">
                                    <button type="submit" class="btn btn-primary btn-block">Thay đổi</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-12">
            <div class="card card-bordered card-preview">
                <div class="card-inner">
                    <div class="card-body">
                        <form action="{{ route('admin.notice.add') }}" ajax-request="huycoder" method="post">
                            <div class="form-group">
                                <label for="tbdays" class="form-label">Thông báo</label>
                                <textarea name="content" class="form-control" id="tbdays" cols="30" rows="5"
                                    placeholder="Thêm thông báo ở đây"></textarea>
                            </div>
                            <div class="form-group mt-3">
                                <button type="submit" class="btn btn-primary btn-block">Thêm</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="nk-block nk-block-lg">
                <div class="nk-block-head">
                    <div class="nk-block-head-content">
                        <h4 class="nk-block-title">Danh sách web con chưa duyệt</h4>
                        <div class="nk-block-des">
                        </div>
                    </div>
                </div>
                <div class="card card-bordered card-preview">
                    <div class="card-inner">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th>Username</th>
                                            <th>Ngày tạo</th>
                                            <th>Ngày cập nhật</th>
                                            <th>Tên miền</th>
                                            <th>Trạng thái</th>
                                            <th>Chức năng</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($subdomain as $item)
                                            @if ($item->status == 'Pending')
                                                <tr>
                                                    <td>{{ $item->id }}</td>
                                                    <td>{{ $item->username }}</td>
                                                    <td>{{ $item->created_at }}</td>
                                                    <td>{{ $item->updated_at }}</td>
                                                    <td>{{ $item->domain }}</td>
                                                    <td>
                                                        @if ($item->status == 'Pending')
                                                            <span class="badge bg-warning">Chờ duyệt</span>
                                                        @elseif ($item->status == 'Active')
                                                            <span class="badge bg-success">Đã duyệt</span>
                                                        @elseif ($item->status == 'Deactive')
                                                            <span class="badge bg-danger">Đã hủy</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('admin.subdomain.active', $item->id) }}"
                                                            class="btn btn-success">Duyệt</a>
                                                        <a href="" class="btn btn-danger">Xóa</a>
                                                    </td>
                                                </tr>
                                            @endif
                                            @if ($item->status == 'Active' || $item->status == 'DeActive')
                                                <tr>
                                                    <td>{{ $item->id }}</td>
                                                    <td>{{ $item->username }}</td>
                                                    <td>{{ $item->created_at }}</td>
                                                    <td>{{ $item->updated_at }}</td>
                                                    <td>{{ $item->domain }}</td>
                                                    <td>
                                                        @if ($item->status == 'Pending')
                                                            <span class="badge bg-warning">Chờ duyệt</span>
                                                        @elseif ($item->status == 'Active')
                                                            <span class="badge bg-success">Đã duyệt</span>
                                                        @elseif ($item->status == 'Deactive')
                                                            <span class="badge bg-danger">Đã hủy</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <a href="#" class="btn btn-danger">Xóa</a>
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
        </div>
    </div>
@endsection
