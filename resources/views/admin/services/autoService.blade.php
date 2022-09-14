@extends('admin.layouts.app')
@section('content')
    <div class="row g-gs">
        <div class="col-xl-12">
            <div class="nk-block nk-block-lg">
                <div class="nk-block-head">
                    <div class="nk-block-head-content">
                        <h4 class="nk-block-title">Quản lí {{ $title }}</h4>
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
                        <form action="{{ route('admin.service.update', 'facebook') }}" ajax-request="huycoder"
                            method="POST">
                            <div class="row">
                                <div class="col-xl-6">
                                    <div class="form-group">
                                        <label class="form-label" for="sgr">Dịch vụ api (subgiare)</label>
                                        <div class="form-control-wrap">
                                            <select name="subgiare" id="sgr" class="form-select js-select2">
                                                @if ($sgr->value == 'show')
                                                    <option value="show" selected>Đã bật</option>
                                                    <option value="hide">Tắt</option>
                                                @elseif($sgr->value == 'hide')
                                                    <option value="hide" selected>Đã Tắt</option>
                                                    <option value="show">Bật</option>
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="form-group">
                                        <label class="form-label" for="bs">Dịch vụ api (baostart)</label>
                                        <div class="form-control-wrap">
                                            <select name="baostar" id="bs" class="form-select js-select2">
                                                @if ($baostart->value == 'show')
                                                    <option value="show" selected>Đã bật</option>
                                                    <option value="hide">Tắt</option>
                                                @elseif($baostart->value == 'hide')
                                                    <option value="hide" selected>Đã Tắt</option>
                                                    <option value="show">Bật</option>
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mt-2">
                                    <button type="submit" class="btn btn-info btn-block">Thay đổi</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
