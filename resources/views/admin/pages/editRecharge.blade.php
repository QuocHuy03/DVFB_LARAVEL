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
                    <div class="card-inner">
                        <form action="{{ route('admin.recharge.edit.post', $account->id) }}" ajax-request="huycoder"
                            method="POST">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label for="type_bank" class="form-label">Loại web</label>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" id="type_bank"
                                            value="{{ $account->type }}" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label for="bank_name" class="form-label">Loại ngân hàng</label>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" id="bank_name"
                                            value="{{ $account->bank_name }}" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label for="account_name" class="form-label">Tên tài khoản</label>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="account_name" id="account_name"
                                            value="{{ $account->account_name }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label for="account_number" class="form-label">Số tài khoản</label>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="account_number" id="account_number"
                                            value="{{ $account->account_number }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label for="password" class="form-label">Mật khẩu</label>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="password" id="password"
                                            value="{{ $account->password }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label for="min_bank" class="form-label">Min bank</label>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="min_bank" id="min_bank"
                                            value="{{ $account->min_bank }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label for="notice" class="form-label">Thông báo</label>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="notice" id="notice"
                                            value="{{ $account->notice }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label for="token" class="form-label">Token</label>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="token" id="token"
                                            value="{{ $account->token }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mt-2">
                                <button type="submit" class="btn btn-primary btn-block">Cập nhật</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
