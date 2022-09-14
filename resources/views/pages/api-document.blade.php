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
                        <h1 class="page-title">Api Docs</h1>
                    </div>
                    <div class="ms-auto pageheader-btn">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Api Docs</li>
                        </ol>
                    </div>
                </div>
                <!-- PAGE-HEADER END -->
                <div class="row">
                    <div class="col-xl-12 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="mt-0">
                                    <h3 class="card-title">Tất cả cần sử dụng phương thức <span
                                            class="badge bg-primary">POST</span></h3>
                                        <h4 class="card-title mt-1">Các trường dữ liệu yêu cầu : F12 để xem request, gửi kèm mã api ví dụ:</h4>
                                        <h4 class="card-title mt-2">
                                            Ví dụ: <code>
                                                idpost=12345435&server_order=sv1&amount=1000&note=asd
                                            </code>
                                        </h4>
                                        <h4 class="card-title mt-2">Header: 
                                            <code class="php">
                                                {
                                                    "Api-token": {{ Auth::user()->api_token }}
                                                }
                                            </code>
                                        </h4>
                                </div>
                            </div>
                            <div class="card-body">
                                <h4 class="card-title">Mẫu thông tin</h4>
                                <div aria-multiselectable="true" class="accordion mt-2" id="order_false" role="tablist">
                                    <div class="acc-card mb-4">
                                        <div class="acc-header" id="headingOne" role="tab">
                                            <h5 class="mb-0">
                                                <a aria-controls="collapseOne" aria-expanded="true" data-bs-toggle="collapse" href="#collapseOne">
                                                    Gửi lên thất bại <span class="float-end acc-angle"><i class="fe fe-chevron-right"></i></span>
                                                </a>
                                            </h5>
                                        </div>
                                        <div aria-labelledby="headingOne" class="collapse" data-bs-parent="#accordion" id="collapseOne" role="tabpanel">
                                            <div class="acc-body">
                                                <h4>
                                                    <code class="php">
                                                        {
                                                            "status": false,
                                                            "message": "msg"
                                                        }
                                                    </code>
                                                </h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="acc-card mb-4">
                                        <div class="acc-header" id="headingtwo" role="tab">
                                            <h5 class="mb-0">
                                                <a aria-controls="collapseOne" aria-expanded="true" data-bs-toggle="collapse" href="#collapsetwo">
                                                    Gửi đơn lên thành công <span class="float-end acc-angle"><i class="fe fe-chevron-right"></i></span>
                                                </a>
                                            </h5>
                                        </div>
                                        <div aria-labelledby="headingtwo" class="collapse" data-bs-parent="#accordion" id="collapsetwo" role="tabpanel">
                                            <div class="acc-body">
                                                <h4>
                                                    <code>
                                                        {
                                                            "status": false,
                                                            "message": "true",
                                                            "code_order": "code_order"
                                                        }
                                                    </code>
                                                </h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <h4 class="card-title">Dịch vụ Facebook</h4>
                                <div aria-multiselectable="true" class="accordion mt-2" id="order_false" role="tablist">
                                    <div class="acc-card mb-4">
                                        <div class="acc-header" id="headingOne" role="tab">
                                            <h5 class="mb-0">
                                                <a aria-controls="collapseOne" aria-expanded="true" data-bs-toggle="collapse" href="#likesale">
                                                    api/service/facebook-v2/like-sale<span class="float-end acc-angle"><i class="fe fe-chevron-right"></i></span>
                                                </a>
                                            </h5>
                                        </div>
                                        <div aria-labelledby="headingOne" class="collapse" data-bs-parent="#accordion" id="likesale" role="tabpanel">
                                            <div class="acc-body">
                                                <h4>
                                                        <code class="php col-md-9">
                                                            {
                                                                "status": true,
                                                                "message": "Mua thành công",
                                                                "code_order": "Mã giao dịch",
                                                            }
                                                        </code>
                                                </h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <h4 class="card-title">Dịch vụ instagram</h4>
                                <div aria-multiselectable="true" class="accordion mt-2" id="order_false" role="tablist">
                                    <div class="acc-card mb-4">
                                        <div class="acc-header" id="headingOne" role="tab">
                                            <h5 class="mb-0">
                                                <a aria-controls="collapseOne" aria-expanded="true" data-bs-toggle="collapse" href="#likeposst">
                                                    api/service/instagram-v2/like-post<span class="float-end acc-angle"><i class="fe fe-chevron-right"></i></span>
                                                </a>
                                            </h5>
                                        </div>
                                        <div aria-labelledby="headingOne" class="collapse" data-bs-parent="#accordion" id="likeposst" role="tabpanel">
                                            <div class="acc-body">
                                                <h4>
                                                        <code class="php col-md-9">
                                                            {
                                                                "status": true,
                                                                "message": "Mua thành công",
                                                                "code_order": "Mã giao dịch",
                                                            }
                                                        </code>
                                                </h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <h4 class="card-title">Dịch vụ tiktok</h4>
                                <div aria-multiselectable="true" class="accordion mt-2" id="order_false" role="tablist">
                                    <div class="acc-card mb-4">
                                        <div class="acc-header" id="headingOne" role="tab">
                                            <h5 class="mb-0">
                                                <a aria-controls="collapseOne" aria-expanded="true" data-bs-toggle="collapse" href="#like">
                                                    api/service/tiktok-v2/like<span class="float-end acc-angle"><i class="fe fe-chevron-right"></i></span>
                                                </a>
                                            </h5>
                                        </div>
                                        <div aria-labelledby="headingOne" class="collapse" data-bs-parent="#accordion" id="like" role="tabpanel">
                                            <div class="acc-body">
                                                <h4>
                                                        <code class="php col-md-9">
                                                            {
                                                                "status": true,
                                                                "message": "Mua thành công",
                                                                "code_order": "Mã giao dịch",
                                                            }
                                                        </code>
                                                </h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <h4 class="card-title">Lấy lịch sử giao dịch</h4>
                                <div aria-multiselectable="true" class="accordion mt-2" id="order_false" role="tablist">
                                    <div class="acc-card mb-4">
                                        <div class="acc-header" id="headingOne" role="tab">
                                            <h5 class="mb-0">
                                                <a aria-controls="collapseOne" aria-expanded="true" data-bs-toggle="collapse" href="#orders">
                                                    api/service/facebook-v2/like-sale/order<span class="float-end acc-angle"><i class="fe fe-chevron-right"></i></span>
                                                </a>
                                            </h5>
                                        </div>
                                        <div aria-labelledby="headingOne" class="collapse" data-bs-parent="#accordion" id="orders" role="tabpanel">
                                            <div class="acc-body">
                                                <h4>Gửi dữ liệu kiểu: code_order=12345</h4>
                                                <h4 class="mt-2">
                                                        <code class="php col-md-9">
                                                            {
                                                                "status": true,
                                                                "message": "Lấy thông tin đơn hàng thành công",
                                                                "data": {
                                                                    "data"
                                                                }
                                                            }
                                                        </code>
                                                </h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
