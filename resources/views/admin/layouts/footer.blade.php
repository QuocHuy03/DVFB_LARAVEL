</div>
</div>
</div>
</div>
</div>
@inject('site_config', 'App\Models\site_config')
<div class="nk-footer">
    <div class="container-fluid">
        <div class="nk-footer-wrap">
            <div class="nk-footer-copyright"> &copy; 2022 {{ $site_config->getValueByName('domain') }}. Website được
                vận hành bởi <a href="https://fb.com/lqh.coder"
                    target="_blank">{{ $site_config->getValueByName('admin_name') }}</a>
            </div>
        </div>
    </div>
</div>

</div>

</div>
</div>

<script src="{{ asset('') }}assets/js/bundle5b75.js?ver=3.0.2"></script>
<script src="{{ asset('') }}assets/js/scripts5b75.js?ver=3.0.2"></script>
<script src="{{ asset('') }}assets/js/demo-settings5b75.js?ver=3.0.2"></script>
<script src="{{ asset('') }}assets/js/charts/chart-ecommerce5b75.js?ver=3.0.2"></script>
<script src="{{ asset('') }}assets/js/libs/datatable-btns5b75.js?ver=3.0.2"></script>
<script src="{{ asset('huycode/js/ajax-huycode.js?') }}{{ time() }}"></script>

@yield('script')

</body>

</html>
