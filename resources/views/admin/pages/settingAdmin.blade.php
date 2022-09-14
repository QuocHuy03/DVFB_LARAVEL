@inject('site_config', 'App\Models\site_config')
@extends('admin.layouts.app')
@section('content')
    <div class="row g-gs">
        <div class="col-xl-12">
            <div class="nk-block nk-block-lg">
                <div class="nk-block-head">
                    <div class="nk-block-head-content">
                        <h4 class="nk-block-title">{{ __($title) }}</h4>
                        <div class="nk-block-des">
                        </div>
                    </div>
                </div>
                <div class="card card-bordered card-preview">
                    <div class="card-inner">
                        <form action="{{ route('admin.settingAdmin.post') }}" ajax-request="huycoder" method="POST">
                            <div class="form-group">
                                <label for="name_admin" class="form-label">Tên admin</label>
                                <input type="text" id="name_admin" name="name_admin"
                                    value="{{ $site_config->getValuebyName('admin_name') }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="link_fb" class="form-label">Link facebook</label>
                                <input type="text" id="link_fb" name="link_fb"
                                    value="{{ $site_config->getValuebyName('facebook_admin') }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="link_zalo" class="form-label">Link Zalo</label>
                                <input type="text" id="link_zalo" name="link_zalo"
                                    value="{{ $site_config->getValuebyName('zalo_admin') }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="token_subgiare" class="form-label">Token subgiare</label>
                                <input type="text" id="token_subgiare" name="token_subgiare"
                                    value="{{ $site_config->getValuebyName('token_subgiare') }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="token_baostar" class="form-label">Token baostar</label>
                                <input type="text" id="token_baostar" name="token_baostar"
                                    value="{{ $site_config->getValuebyName('token_baostar') }}" class="form-control">
                            </div>
                            <div class="form-group mt-2">
                                <button type="submit" class="btn btn-primary btn-block">Lưu lại</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
