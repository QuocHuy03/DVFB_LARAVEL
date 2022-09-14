@extends('admin.layouts.app')
@section('content')
    <div class="row g-gs">
        <div class="col-xl-12">
            <div class="nk-block nk-block-lg">
                <div class="nk-block-head">
                    <div class="nk-block-head-content">
                        <h4 class="nk-block-title">Thêm máy chủ {{ $title }}</h4>
                        <div class="nk-block-des">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-inner">
                                <form action="{{ route('admin.service.add', 'facebook') }}" ajax-request="huycoder"
                                    method="POST">
                                    {{-- select --}}
                                    <div class="form-group">
                                        <label class="form-label" for="server_type">Máy chủ của dịch vụ</label>
                                        <div class="form-control-wrap">
                                            <select name="server_type" id="server_type" class="form-select js-select2">
                                                <option value="select">Chọn dịch vụ</option>
                                                <option value="subgiare">subgiare.vn</option>
                                                <option value="baostar">baostar.pro</option>
                                            </select>
                                        </div>
                                    </div>
                                    {{-- select --}}
                                    <div class="form-group">
                                        <label for="server_service" class="form-label">Server</label>
                                        <div class="form-control-wrap">
                                            <select name="server_service" id="server_service"
                                                class="form-select js-select2">
                                                @for ($i = 1; $i <= 30; $i++)
                                                    <option value="sv{{ $i }}">
                                                        Server : {{ $i }}
                                                    </option>
                                                @endfor
                                            </select>
                                        </div>
                                    </div>
                                    <div id="show_service"></div>
                                    <div class="form-group">
                                        <label for="rate_service" class="form-label">Giá dịch vụ</label>
                                        <input type="text" name="rate_service" id="rate_service" class="form-control"
                                            placeholder="Nhập giá dịch vụ">
                                    </div>
                                    <div class="form-group">
                                        <label for="title_service" class="form-label">Tiêu đề</label>
                                        <input type="text" name="title_service" id="title_service" class="form-control"
                                            placeholder="Nhập tiêu đề">
                                    </div>
                                    <div class="form-group">
                                        <label for="notice" class="form-label">Thông báo máy chủ</label>
                                        <input type="text" name="notice" id="notice" class="form-control"
                                            placeholder="Nhập thông báo máy chủ">
                                    </div>
                                    <div class="form-group mt-2">
                                        <button type="submit" class="btn btn-primary btn-block btn-lg">Thêm dịch
                                            vụ</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-12 pt-4">
        <div class="nk-block nk-block-lg">
            <div class="nk-block-head">
                <div class="nk-block-head-content">
                    <h4 class="nk-block-title">Danh sách dịch vụ subgiare</h4>
                    <div class="nk-block-des">
                    </div>
                </div>
            </div>
            <div class="card card-bordered card-preview">
                <div class="card-inner">
                    <div class="table-responsive">
                        <table class="datatable-init table">
                            <thead>
                                <tr>
                                    <th>Loại</th>
                                    <th>Máy chủ</th>
                                    <th>Giá</th>
                                    <th>Trạng thái</th>
                                    <th>Ngày tạo</th>
                                    <th>Chức năng</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($SubGiare as $item)
                                    <tr>
                                        <td>{{ $item->code_server }}</td>
                                        <td>{{ $item->server_service }}</td>
                                        <td>{{ $item->rate_server }}</td>
                                        <td>
                                            @if ($item->status_server == 'on')
                                                <span class="badge bg-success">Hoạt động</span>
                                            @else
                                                <span class="badge bg-danger">Bảo trì</span>
                                            @endif
                                        </td>
                                        <td>{{ $item->created_at }}</td>
                                        <td>
                                            <a href="{{ route('admin.service.edit', $item->id) }}"
                                                class="btn btn-success">Sửa</a>
                                            @if ($item->status_server == 'on')
                                                <a href="{{ route('admin.service.status', $item->id) }}"
                                                    class="btn btn-danger">Bảo trì</a>
                                            @else
                                                <a href="{{ route('admin.service.status', $item->id) }}"
                                                    class="btn btn-success">Hoạt động</a>
                                            @endif
                                            <a href="{{ route('admin.service.delete', $item->id) }}"
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
    <div class="col-lg-12 pt-4">
        <div class="nk-block nk-block-lg">
            <div class="nk-block-head">
                <div class="nk-block-head-content">
                    <h4 class="nk-block-title">Danh sách dịch vụ baostar</h4>
                    <div class="nk-block-des">
                    </div>
                </div>
            </div>
            <div class="card card-bordered card-preview">
                <div class="card-inner">
                    <div class="table-responsive">
                        <table class="datatable-init table">
                            <thead>
                                <tr>
                                    <th>Loại</th>
                                    <th>Máy chủ</th>
                                    <th>Giá</th>
                                    <th>Trạng thái</th>
                                    <th>Ngày tạo</th>
                                    <th>Chức năng</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($BaoStar as $item)
                                    <tr>
                                        <td>{{ $item->code_server }}</td>
                                        <td>{{ $item->server_service }}</td>
                                        <td>{{ $item->rate_server }}</td>
                                        <td>
                                            @if ($item->status_server == 'on')
                                                <span class="badge bg-success">Hoạt động</span>
                                            @else
                                                <span class="badge bg-danger">Bảo trì</span>
                                            @endif
                                        </td>
                                        <td>{{ $item->created_at }}</td>
                                        <td>
                                            <a href="{{ route('admin.service.edit', $item->id) }}"
                                                class="btn btn-success">Sửa</a>
                                            @if ($item->status_server == 'on')
                                                <a href="{{ route('admin.service.status', $item->id) }}"
                                                    class="btn btn-danger">Bảo trì</a>
                                            @else
                                                <a href="{{ route('admin.service.status', $item->id) }}"
                                                    class="btn btn-success">Hoạt động</a>
                                            @endif
                                            <a href="{{ route('admin.service.delete', $item->id) }}"
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
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $('#server_type').change(function() {
                var server_type = $(this).val();
                if (server_type == 'select') {
                    $('#show_service').html('');
                }
                if (server_type == 'subgiare') {
                    $('#show_service').html(`
                       
                    <div class="form-group">
                                        <label class="form-label" for="type_service">Loại dịch vụ</label>
                                        <div class="form-control-wrap">
                                            <select name="type_service" id="type_service" class="form-select js-select2">
                                                <option value="like-post-sale">Like bài viết (sale)</option>
                                                <option value="like-post-speed">Like bài viết (speed)</option>
                                                <option value="like-comment">Like bình luận</option>
                                                <option value="comment-sale">Bình luận (sale)</option>
                                                <option value="sub-vip">Sub/follow (vip)</option>
                                                <option value="sub-quality">Sub/follow (quality)</option>
                                                <option value="sub-sale">Sub/follow (sale)</option>
                                                <option value="sub-speed">Sub/follow (speed)</option>
                                                <option value="like-page-quality">Like page (quality)</option>
                                                <option value="like-page-sale">Like page (sale)</option>
                                                <option value="like-page-speed">Like page (speed)</option>
                                                <option value="mat-live">Mắt live</option>
                                                <option value="view-video">View video</option>
                                                <option value="share-profile">Share (profile)</option>
                                                <option value="member-group">Thành viên nhóm</option>
                                                <option value="view-story">View story</option>
                                                <option value="vip-like">Vip like (profil)</option>
                                            </select>
                                        </div>
                                    </div>
                    `);
                } else if (server_type == 'baostar') {
                    $('#show_service').html(`
                        
                    <div class="form-group">
                                        <label for="type_service" class="form-label">Loại dịch vụ</label>
                                        <div class="form-control-wrap">
                                            <select name="type_service" id="type_service" class="form-select js-select2">
                                                <option value="like-gia-re">Like giá rẻ</option>
                                                <option value="like-chat-luong">Like chất lượng</option>
                                                <option value="like-binh-luan">Like bình luận</option>
                                                <option value="binh-luan">Bình luận</option>
                                                <option value="theo-doi">Theo dõi</option>
                                                <option value="like-page">Like page</option>
                                                <option value="mem-group">Member group</option>
                                                <option value="view-video">View video</option>
                                                <option value="mat-live">Mắt livestream</option>
                                                <option value="share">Share</option>
                                                <option value="view-story">View story</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="name_sv" class="form-label">Package name</label>
                                        <input type="text" name="name_sv" id="name_sv" class="form-control" placeholder="Nhập package_name VS(like_v2)">
                                    </div>
                    `);
                }
            });
        });
    </script>
@endsection
