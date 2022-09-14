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
                                    <textarea name="noticeHome" class="form-control" id="tbday" cols="30" rows="5">{{ $notice }}</textarea>
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
                        <h4 class="nk-block-title">Thông báo</h4>
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
                                            <th>Thông báo</th>
                                            <th>Ngày tạo</th>
                                            <th>Ngày cập nhật</th>
                                            <th>Hành động</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($list_notice as $item)
                                            <tr>
                                                <td>{{ $item->id }}</td>
                                                <td>{{ $item->content }}</td>
                                                <td>{{ $item->created_at }}</td>
                                                <td>{{ $item->updated_at }}</td>
                                                <td>
                                                    <a href="{{ route('admin.notice.delete', ['id' => $item->id]) }}"
                                                        class="btn btn-danger btn-sm">Xóa</a>
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
@endsection
