@extends('layouts.app')
@section('content')
    <div class="app-content main-content mt-0">
        <div class="side-app">
            <div class=" flex-grow-1 container-p-y">
                <div class="page-header">
                    <div>
                        <h1 class="page-title">Tạo Website Riêng</h1>
                    </div>
                    <div class="ms-auto pageheader-btn">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Tạo Website</li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="ribbon-title ribbon-primary">Thông tin &amp; cấu hình</div>
                                <div class="mt-4">
                                    <div class="alert text-white bg-warning col-md-6 mx-auto" role="alert"> - Bạn phải đạt
                                        cấp
                                        bậc cộng tác viên hoặc đại lý mới có thể tạo web con nhé! <br> - Nghiêm cấm các tiên
                                        miền có chữ : Facebook, Instagram để tránh bị vi phạm bản quyền. <br> - Khách hàng
                                        tạo
                                        tài khoản và sử dụng dịch vụ ở site con. Tiền sẽ trừ vào tài khoản của đại lý ở site
                                        chính. Vì thế để khách hàng mua được tài khoản đại lý phải còn số dư. <br> - Chúng
                                        tôi
                                        hỗ trợ mục đích kinh doanh của tất cả cộng tác viên và đại lý! </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mx-auto">
                                        <form submit-ajax="LTT" method="post" action="#" api_token="huycode">
                                            <input type="hidden" name="action" value="change-token">
                                            <div class="form-group"> <label class="form-label" for="">Api
                                                    Token</label>
                                                <div class="input-group mb-3"> <input class="form-control" type="text"
                                                        value="eyJhbGciOEIAgRWWUqfQmVYlmvcdZDMgkhnheURYEzLIgjFWjEaUbkTwxYciOctbnybmEvWxzIPGTXcJCNlTkBbHouhxSUQzPhllIxQmpRQn1656982917MDNiNGFiZTViZTk0MTdjMzE1MGJhMDNiM2EyMTY0OTA=="
                                                        id="" readonly=""> <button type="submit"
                                                        class="btn btn-primary" id="changeToken"><i
                                                            class="fa fa-exchange"></i>
                                                        Thay Đổi</button> </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mx-auto">
                                        <form submit-ajax="huycode" action="" method="post" api_token="huycode">
                                            <input type="hidden" name="action" value="set_tao_site">
                                            <div class="form-group"> <label class="form-label" for="">Tên
                                                    Miền</label>
                                                <div class="input-group mb-3"> <input class="form-control" type="text"
                                                        name="domain" value=""
                                                        placeholder="Nhập Tên Miền Cần Kích hoạt"> <button type="submit"
                                                        class="btn btn-primary"><i class="fa fa-save"></i> Lưu Ngay</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="row pt-4">
                    <div class="col-md-12">
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="ribbon-title ribbon-primary pb-3">Nhật Kí Tạo</div>
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover">
                                        <thead>
                                            <tr role="row" class="bg-primary">
                                                <th class="text-center text-white">ID</th>
                                                <th class="text-center text-white">Tên miền</th>
                                                <th class="text-center text-white">Ngày tạo</th>
                                                <th class="text-center text-white">Trạng thái</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="odd">
                                                <td valign="top" colspan="100%">
                                                    <center> <img src="/img/nodata.svg" alt="" width="80"
                                                            height="80" class="pt-3">
                                                        <p class="pt-3">Không có dữ liệu để hiển thị</p>
                                                    </center>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
