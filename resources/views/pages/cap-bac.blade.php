@extends('layouts.app')

@section('content')
    <div class="app-content main-content mt-0">
        <div class="side-app">

            <div class="flex-grow-1 container-p-y">
                <div class="page-header">
                    <div>
                        <h1 class="page-title">Cấp Bậc Tài Khoản</h1>
                    </div>
                    <div class="ms-auto pageheader-btn">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Cấp Bậc</li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="card border shadow-none">
                            <div class="card-body">
                                <h3 class="fw-bold text-center text-uppercase mt-3">Cộng tác viên</h3>
                                <div class="my-4 py-2 text-center">
                                    <img src="/img/bookmark.png" alt="Starter Image" height="80">
                                </div>

                                <div class="text-center mb-4">
                                    <div class="mb-2 d-flex justify-content-center">
                                        <h1 class="fw-bold h1 mb-0">500,000</h1>
                                        <sub class="h5 pricing-duration mt-auto mb-2">coin</sub>
                                    </div>
                                </div>

                                <ul class="ps-3 pt-4 pb-2 list-unstyled">
                                    <li class="mb-2">
                                        <span
                                            class="badge badge-center w-px-20 h-px-20 rounded-pill bg-label-primary me-2"><i
                                                class="bx bx-check bx-xs"></i></span>
                                        Cấp bậc này sẽ được giảm giá các dịch vụ và có thể tạo website
                                        riêng.
                                    </li>
                                    <li class="mb-2">
                                        <span
                                            class="badge badge-center w-px-20 h-px-20 rounded-pill bg-label-primary me-2"><i
                                                class="bx bx-check bx-xs"></i></span>
                                        Có ưu đãi dịch vụ.
                                    </li>
                                </ul>

                                <a href="{{ route('banking') }}" class="btn btn-label-primary d-grid w-100">Nạp
                                    ngay</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card border shadow-none">
                            <div class="card-body">
                                <h3 class="fw-bold text-center text-uppercase mt-3">Đại lý</h3>
                                <div class="my-4 py-2 text-center">
                                    <img src="/img/briefcase-round.png" alt="Starter Image" height="80">
                                </div>

                                <div class="text-center mb-4">
                                    <div class="mb-2 d-flex justify-content-center">
                                        <h1 class="fw-bold h1 mb-0">20,000,000</h1>
                                        <sub class="h5 pricing-duration mt-auto mb-2">coin</sub>
                                    </div>
                                </div>

                                <ul class="ps-3 pt-4 pb-2 list-unstyled">
                                    <li class="mb-2">
                                        <span
                                            class="badge badge-center w-px-20 h-px-20 rounded-pill bg-label-primary me-2"><i
                                                class="bx bx-check bx-xs"></i></span>
                                        Cấp bậc này sẽ được giảm giá dịch vụ, tạo
                                        website riêng, hỗ trợ riêng, ...
                                    </li>
                                    <li class="mb-2">
                                        <span
                                            class="badge badge-center w-px-20 h-px-20 rounded-pill bg-label-primary me-2"><i
                                                class="bx bx-check bx-xs"></i></span>
                                        Có ưu đãi dịch vụ.
                                    </li>
                                </ul>

                                <a href="{{ route('banking') }}" class="btn btn-label-primary d-grid w-100">Nạp
                                    ngay</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card border shadow-none">
                            <div class="card-body">
                                <h3 class="fw-bold text-center text-uppercase mt-3">Nhà phân phối</h3>
                                <div class="my-4 py-2 text-center">
                                    <img src="/img/wallet-round.png" alt="Starter Image" height="80">
                                </div>

                                <div class="text-center mb-4">
                                    <div class="mb-2 d-flex justify-content-center">
                                        <h1 class="fw-bold h1 mb-0">100,000,000</h1>
                                        <sub class="h5 pricing-duration mt-auto mb-2">coin</sub>
                                    </div>
                                </div>

                                <ul class="ps-3 pt-4 pb-2 list-unstyled">
                                    <li class="mb-2">
                                        <span
                                            class="badge badge-center w-px-20 h-px-20 rounded-pill bg-label-primary me-2"><i
                                                class="bx bx-check bx-xs"></i></span>
                                        Cấp bậc này sẽ được giảm giá dịch vụ , tạo
                                        website riêng, hỗ trợ riêng, ...
                                    </li>
                                    <li class="mb-2">
                                        <span
                                            class="badge badge-center w-px-20 h-px-20 rounded-pill bg-label-primary me-2"><i
                                                class="bx bx-check bx-xs"></i></span>
                                        Có ưu đãi dịch vụ.
                                    </li>
                                </ul>

                                <a href="{{ route('banking') }}" class="btn btn-label-primary d-grid w-100">Nạp
                                    ngay</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
