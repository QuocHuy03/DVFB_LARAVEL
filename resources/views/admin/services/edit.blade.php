@extends('admin.layouts.app')
@section('content')
    <div class="row g-gs">
        <div class="col-xl-12">
            <div class="nk-block nk-block-lg">
                <div class="nk-block-head">
                    <div class="nk-block-head-content">
                        <h4 class="nk-block-title">{{ $title }}</h4>
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
                        <form action="{{ route('admin.service.updateSV', $service->id) }}" ajax-request="huycoder"
                            method="POST">
                            <div class="row">
                                <div class="col-xl-6">
                                    <div class="form-group">
                                        <label for="loaidv" class="form-label">Loại dịch vụ</label>
                                        <input type="text" id="loaidv" value="{{ $service->code_server }}" disabled
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="form-group">
                                        <label for="sv" class="form-label">Máy chủ</label>
                                        <input type="text" id="sv" value="{{ $service->server_service }}" disabled
                                            class="form-control">
                                    </div>
                                </div>
                                @if ($service->api_server == 'baostar' || $service->api_server == 'dichvuonline')
                                    <div class="col-xl-6">
                                        <div class="form-group">
                                            <label for="ns" class="form-label">name server</label>
                                            <input type="text" name="name_sv" id="ns"
                                                value="{{ $service->name_server }}" class="form-control">
                                        </div>
                                    </div>
                                @endif
                                <div class="col-xl-6">
                                    <div class="form-group">
                                        <label for="rate" class="form-label">rate máy chủ</label>
                                        <input type="text" name="rate_sv" id="rate"
                                            value="{{ $service->rate_server }}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <div class="form-group">
                                        <label for="title_sv" class="form-label">Tiêu đề</label>
                                        <input type="text" name="title_sv" id="title_sv"
                                            value="{{ $service->title_server }}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <div class="form-group">
                                        <label for="notice" class="form-label">Thông báo máy chủ</label>
                                        <input type="text" name="notice" id="notice"
                                            value="{{ $service->content_server }}" class="form-control">
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
@endsection
