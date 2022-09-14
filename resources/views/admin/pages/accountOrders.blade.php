@inject('notice_accfbs', 'App\Models\notice_accfbs')
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
            </div>
        </div>
        <div class="col-xl-4">
            <div class="card">
                <div class="card-inner">
                    <h4>Loại tài khoản Clone</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.service.account.type.post', 'clone') }}" ajax-request="huycoder"
                        method="POST">
                        <div class="form-group">
                            <label for="amount" class="form-label">Giá</label>
                            <input type="text" name="amount" id="amount" class="form-control"
                                placeholder="Giá sản phẩm" value="{{ $notice_accfbs->price('clone') }}">
                        </div>
                        <div class="form-group">
                            <label for="ghichu" class="form-label">Sản phẩm tên</label>
                            <textarea name="ghichu" id="ghichu" cols="30" rows="10" class="form-control"
                                placeholder="Nội dung sản phẩm">{{ $notice_accfbs->content('clone') }}</textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block btn-lg">Lưu</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-xl-4">
            <div class="card">
                <div class="card-inner">
                    <h4>Loại tài khoản Via</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.service.account.type.post', 'via') }}" ajax-request="huycoder"
                        method="POST">
                        <div class="form-group">
                            <label for="amount" class="form-label">Giá</label>
                            <input type="text" name="amount" id="amount" class="form-control"
                                placeholder="Giá sản phẩm" value="{{ $notice_accfbs->price('via') }}">
                        </div>
                        <div class="form-group">
                            <label for="ghichu" class="form-label">Sản phẩm tên</label>
                            <textarea name="ghichu" id="ghichu" cols="30" rows="10" class="form-control"
                                placeholder="Nội dung sản phẩm">{{ $notice_accfbs->content('via') }}</textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block btn-lg">Lưu</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-xl-4">
            <div class="card">
                <div class="card-inner">
                    <h4>Loại tài khoản XU TDS</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.service.account.type.post', 'tds') }}" ajax-request="huycoder"
                        method="POST">
                        <div class="form-group">
                            <label for="amount" class="form-label">Giá</label>
                            <input type="text" name="amount" id="amount" class="form-control"
                                placeholder="Giá sản phẩm" value="{{ $notice_accfbs->price('tds') }}">
                        </div>
                        <div class="form-group">
                            <label for="ghichu" class="form-label">Sản phẩm tên</label>
                            <textarea name="ghichu" id="ghichu" cols="30" rows="10" class="form-control"
                                placeholder="Nội dung sản phẩm">{{ $notice_accfbs->content('tds') }}</textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block btn-lg">Lưu</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-xl-12">
            <div class="card">
                <div class="card-inner">
                    <h4>Thêm tài khoản</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.service.account.orders.post') }}" ajax-request="huycoder" method="POST">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="type_account" class="form-label">Loại tài khoản</label>
                                </div>
                                <div class="col-md-9">
                                    <select name="type_account" id="type_account" class="form-control">
                                        <option value="">Chọn loại tài khoản</option>
                                        <option value="clone">Clone</option>
                                        <option value="via">Via</option>
                                        <option value="tds">Xu TDS</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="list_account" class="form-label">Danh sách tài khoản</label>
                                </div>
                                <div class="col-md-9">
                                    <textarea name="list_account" id="list_account" cols="30" rows="10" class="form-control"
                                        placeholder="UID|PASS|2FA|Cookie|TOKEN|MAIL|PASSMAIL"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="notice" class="form-label">Ghi chú</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" name="notice" id="notice" placeholder="Nhập ghi chú"
                                        class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block btn-lg">Thêm tài khoản</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-xl-12">
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
                    <h4>Loại tài khoản chưa bán</h4>
                    <table class="datatable-init table">
                        <thead>
                            <tr>
                                <th>Sản phẩm</th>
                                <th>Hiện còn</th>
                                <th>Giá</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($type as $item)
                                @if ($item->type == 'clone')
                                    <tr>
                                        <td>{{ $item->content }}</td>
                                        <td><span class="badge bg-success">{{ number_format($clone->count()) }}</span>
                                        </td>
                                        <td> <span class="badge bg-success"> {{ number_format($item->price) }}</span></td>
                                    </tr>
                                @endif
                                @if ($item->type == 'via')
                                    <tr>
                                        <td>{{ $item->content }}</td>
                                        <td><span class="badge bg-success">{{ number_format($via->count()) }}</span></td>
                                        <td> <span class="badge bg-success"> {{ number_format($item->price) }}</span></td>
                                    </tr>
                                @endif
                                @if ($item->type == 'tds')
                                    <tr>
                                        <td>{{ $item->content }}</td>
                                        <td><span class="badge bg-success">{{ number_format($tds->count()) }}</span></td>
                                        <td> <span class="badge bg-success"> {{ number_format($item->price) }}</span></td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-xl-12">
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
                    <h4>Loại tài khoản đã bán</h4>
                    <table class="datatable-init table">
                        <thead>
                            <tr>
                                <th>Người dùng</th>
                                <th>Sản phẩm</th>
                                <th>Số lượng</th>
                                <th>Giá</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $item)
                                @if ($item->type == 'clone')
                                    <tr>
                                        <td>{{ $item->username }}</td>
                                        <td>{{ $item->notice }}</td>
                                        <td>{{ $item->count() }}</td>
                                        <td>{{ $item->price }}</td>
                                    </tr>
                                @endif
                                @if ($item->type == 'via')
                                    <tr>
                                        <td>{{ $item->username }}</td>
                                        <td>{{ $item->notice }}</td>
                                        <td>{{ $item->count() }}</td>
                                        <td>{{ $item->price }}</td>
                                    </tr>
                                @endif
                                @if ($item->type == 'tds')
                                    <tr>
                                        <td>{{ $item->username }}</td>
                                        <td>{{ $item->notice }}</td>
                                        <td>{{ $item->count() }}</td>
                                        <td>{{ $item->price }}</td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
