@inject('site_config', 'App\Models\site_config')
@extends('layouts.app')
@section('content')
    <!--app-content open-->
    <div class="app-content main-content mt-0">
        <div class="side-app">

            <!-- CONTAINER -->
            <div class="main-container container-fluid">
                <!-- PAGE-HEADER -->
                <div class="page-header">
                    <div>
                        <h1 class="page-title">Trang chủ</h1>
                    </div>
                    <div class="ms-auto pageheader-btn">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Account</a></li>
                            <li class="breadcrumb-item active" aria-current="page">via</li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12 col-md-12 col-lg-12">
                        <div class="card">
                            <div class="card-header border-bottom">
                                <h3 class="card-title">Mua tài khoản via</h3>
                            </div>
                            <div class="card-body">
                                <h4 class="card-title">Số lượng còn: <span
                                        class="badge bg-success">{{ number_format($acc->count()) }}</span></h4>
                                <form action="{{ route('service.account.post', $type) }}" ajax-request="huycoder"
                                    method="POST">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Số lượng</label>
                                        <input type="text" class="form-control" name="amount" id="exampleInputEmail1"
                                            placeholder="Nhập số lượng">
                                    </div>
                                    @if ($acc->count() > 0)
                                        <button type="submit" class="btn btn-primary btn-block btn-lg">Mua</button>
                                    @else
                                        <button type="button" class="btn btn-danger btn-block btn-lg">Hết hàng</button>
                                    @endif
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- CONTAINER CLOSED -->
    </div>
@endsection
