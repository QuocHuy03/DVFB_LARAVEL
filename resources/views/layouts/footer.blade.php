@inject('site_config', 'App\Models\site_config')
</div>
<!-- BEGIN: Dark Mode Switcher-->




<!-- END: Dark Mode Switcher-->
<!-- BEGIN: JS Assets-->


<script src="{{ asset('') }}lqh/app.js"></script>
{{-- <script src="{{ asset('') }}lqh/get-id.js"></script> --}}
<script type="text/javascript" charset="utf8" src="{{ asset('') }}lqh/jquery.dataTables.min.js"></script>

<script type="text/javascript">
    const currentLocation = location.href;
    const menuItem = document.querySelectorAll('#side-menu__choose a');
    // const menuItemMobile = document.querySelectorAll('#side-menu__choose-mobile a');
    const arr = Array.from(menuItem).filter((item) => item.href == currentLocation).forEach((item) => {
        item.classList.add('side-menu--active');
        item.parentElement.parentElement.classList.add('side-menu__sub-open');
        item.parentElement.parentElement.previousElementSibling.classList.add('side-menu--open',
            'side-menu--active');
        item.parentElement.parentElement.parentElement.parentElement.classList.add('side-menu__sub-open');
        if (item.parentElement.parentElement.parentElement.previousElementSibling) {
            item.parentElement.parentElement.parentElement.parentElement.previousElementSibling.classList.add(
                'side-menu--open', 'side-menu--active');
        }
    });
</script>
<script src="https://cdn.lordicon.com/xdjxvujz.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link rel="stylesheet" href="{{ asset('') }}lqh/toastr.css" />
<script src="{{ asset('') }}lqh/toastr.min.js"></script>
<link rel="stylesheet" href="{{ asset('') }}lqh/dist/sweetalert2.min.css" />
<script src="{{ asset('') }}lqh/dist/sweetalert2.all.min.js"></script>
<script src="{{ asset('huycode/js/ajax-huycode.js?') }}{{ time() }}"></script>
<script>
    $('#dataTable').dataTable({
        "language": {
            "emptyTable": "Loading ....",
        }
    });
</script>
@yield('script')

<script>
    function noticeServer(texxt) {
        $('#noticeServer').show().html(
            ` <div class="alert alert-danger mt-4 bg-danger text-white" role="alert"> <h4>Thông tin máy chủ</h4> - <b>${texxt}</b></div>`
        );
    }
</script>
<script>
    function bill() {
        let server_order = $('input[name=server_order]:checked');
        let notice = server_order.attr('notice');
        if (!server_order) return;
        noticeServer(notice);
        let amount = server_order.attr('price');
        let payment = $('input[name=amount]').val();
        let total = Math.round(payment * amount) ?? 0;
        $('#payment').html(Intl.NumberFormat().format(total));
    }
    $(document).ready(function() {
        bill();
    });
</script>


<!-- END: JS Assets-->
</body>

</html>
