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
                            <li class="breadcrumb-item active" aria-current="page">Buy</li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12 col-md-12 col-lg-12">
                        <div class="card">
                            <div class="card-header border-bottom">
                                <h3 class="card-title">Danh sách tài khoản</h3>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered text-nowrap border-bottom w-100 text-center"
                                        id="responsive-datatable">
                                        <thead>
                                            <tr>
                                                <th class="wd-15p border-bottom-0">Sản phẩm</th>
                                                <th class="wd-20p border-bottom-0">Đã mua</th>
                                                <th class="wd-15p border-bottom-0">Giá</th>
                                                <th class="wd-25p border-bottom-0">Hành động</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($acc as $item)
                                                @if ($item->type == 'clone')
                                                    <tr>
                                                        <td>{{ $item->content }}</td>
                                                        <td><span
                                                                class="badge bg-danger">{{ number_format($cloneSell->count()) }}</span>
                                                        </td>
                                                        <td>{{ $item->price }}</td>
                                                        <td>

                                                            <a class="modal-effect btn btn-primary"
                                                                data-bs-effect="effect-scale" data-bs-toggle="modal"
                                                                href="#modaldemo{{ $item->id }}">Xem tài khoản</a>
                                                            <div class="modal fade" id="modaldemo{{ $item->id }}">
                                                                <div class="modal-dialog modal-dialog-centered text-center"
                                                                    role="document">
                                                                    <div class="modal-content modal-content-demo">
                                                                        <div class="modal-header">
                                                                            <h6 class="modal-title">Danh sách</h6><button
                                                                                aria-label="Close" class="btn-close"
                                                                                data-bs-dismiss="modal"><span
                                                                                    aria-hidden="true">&times;</span></button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <form action="">
                                                                                <div class="form-group">
                                                                                    <textarea name="" class="form-control" id="" cols="30" rows="10">
                                                                                @foreach ($cloneSell as $item)
{{ $item->acc }}
@endforeach
                                                                            </textarea>
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button class="btn btn-light"
                                                                                data-bs-dismiss="modal">Close</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endif
                                                @if ($item->type == 'via')
                                                    <tr>
                                                        <td>{{ $item->content }}</td>
                                                        <td> <span class="badge bg-danger">
                                                                {{ number_format($viaSell->count()) }}</span></td>
                                                        <td>{{ $item->price }}</td>
                                                        <td>

                                                            <a class="modal-effect btn btn-primary"
                                                                data-bs-effect="effect-scale" data-bs-toggle="modal"
                                                                href="#modaldemo{{ $item->id }}">Xem tài khoản</a>
                                                            <div class="modal fade" id="modaldemo{{ $item->id }}">
                                                                <div class="modal-dialog modal-dialog-centered text-center"
                                                                    role="document">
                                                                    <div class="modal-content modal-content-demo">
                                                                        <div class="modal-header">
                                                                            <h6 class="modal-title">Danh sách</h6><button
                                                                                aria-label="Close" class="btn-close"
                                                                                data-bs-dismiss="modal"><span
                                                                                    aria-hidden="true">&times;</span></button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <form action="">
                                                                                <div class="form-group">
                                                                                    <textarea name="" class="form-control" id="" cols="30" rows="10">
                                                                                @foreach ($viaSell as $item)
{{ $item->acc }}
@endforeach
                                                                            </textarea>
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button class="btn btn-light"
                                                                                data-bs-dismiss="modal">Close</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endif
                                                @if ($item->type == 'tds')
                                                    <tr>
                                                        <td>{{ $item->content }}</td>
                                                        <td><span
                                                                class="badge bg-danger">{{ number_format($tdsSell->count()) }}</span>
                                                        </td>
                                                        <td>{{ $item->price }}</td>
                                                        <td>
                                                            <a class="modal-effect btn btn-primary"
                                                                data-bs-effect="effect-scale" data-bs-toggle="modal"
                                                                href="#modaldemo{{ $item->id }}">Xem tài khoản</a>
                                                            <div class="modal fade" id="modaldemo{{ $item->id }}">
                                                                <div class="modal-dialog modal-dialog-centered text-center"
                                                                    role="document">
                                                                    <div class="modal-content modal-content-demo">
                                                                        <div class="modal-header">
                                                                            <h6 class="modal-title">Danh sách</h6><button
                                                                                aria-label="Close" class="btn-close"
                                                                                data-bs-dismiss="modal"><span
                                                                                    aria-hidden="true">&times;</span></button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <form action="">
                                                                                <div class="form-group">
                                                                                    <textarea name="" class="form-control" id="" cols="30" rows="10">
                                                                                @foreach ($tdsSell as $item)
{{ $item->acc }}
@endforeach
                                                                            </textarea>
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button class="btn btn-light"
                                                                                data-bs-dismiss="modal">Close</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endif
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
    </div>
    <!-- CONTAINER CLOSED -->
    </div>
@endsection
@section('script')
    <script src="{{ asset('') }}huycode/plugins/datatable/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('') }}huycode/plugins/datatable/js/dataTables.bootstrap5.js"></script>
    <script src="{{ asset('') }}huycode/plugins/datatable/js/dataTables.buttons.min.js"></script>
    <script src="{{ asset('') }}huycode/plugins/datatable/js/buttons.bootstrap5.min.js"></script>
    <script src="{{ asset('') }}huycode/plugins/datatable/js/jszip.min.js"></script>
    <script src="{{ asset('') }}huycode/plugins/datatable/pdfmake/pdfmake.min.js"></script>
    <script src="{{ asset('') }}huycode/plugins/datatable/pdfmake/vfs_fonts.js"></script>
    <script src="{{ asset('') }}huycode/plugins/datatable/js/buttons.html5.min.js"></script>
    <script src="{{ asset('') }}huycode/plugins/datatable/js/buttons.print.min.js"></script>
    <script src="{{ asset('') }}huycode/plugins/datatable/js/buttons.colVis.min.js"></script>
    <script src="{{ asset('') }}huycode/plugins/datatable/dataTables.responsive.min.js"></script>
    <script src="{{ asset('') }}huycode/plugins/datatable/responsive.bootstrap5.min.js"></script>
    <script src="{{ asset('') }}huycode/js/table-data.js"></script>
@endsection
