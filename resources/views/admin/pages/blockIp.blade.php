@extends('admin.layouts.app')
@section('content')
    <div class="row g-gs">
        <div class="col-xl-12">
            <div class="nk-block nk-block-lg">
                <div class="nk-block-head">
                    <div class="nk-block-head-content">
                        <h4 class="nk-block-title">Quản lí IP</h4>
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
                            <form action="{{ route('admin.block-ip.post') }}" ajax-request="huycoder" method="POST">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label for="ip" class="form-label">IP Cần block</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" id="ip" name="blockIp" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label for="reason" class="form-label">Lí do</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" id="reason" name="reason" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-block">Khóa ip</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="nk-block nk-block-lg">
                <div class="nk-block-head">
                    <div class="nk-block-head-content">
                        <h4 class="nk-block-title">Danh sách bị chặn</h4>
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
                                            <th>IP</th>
                                            <th>Lí do</th>
                                            <th>Ngày ban</th>
                                            <th>Hành động</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($ip as $item)
                                            <tr>
                                                <td>{{ $item->id }}</td>
                                                <td>{{ $item->ip }}</td>
                                                <td>{{ $item->reason }}</td>
                                                <td>{{ $item->updated_at }}</td>
                                                <td>
                                                    <a href="{{ route('admin.block-ip.delete', $item->id) }}"
                                                        class="btn btn-danger">Xóa</a>
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
