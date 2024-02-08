<!-- jquery -->
<script src="{{ asset('assets/js/jquery-3.3.1.min.js') }}"></script>
<!-- plugins-jquery -->
<script src="{{ asset('assets/js/plugins-jquery.js') }}"></script>
<!-- plugin_path -->
<script>
    var plugin_path = '{{ asset('assets/js/') }}';
</script>

{{-- <script src="{{ asset('assets/js/demo/chart-area-demo.js') }}"></script> --}}
{{-- <script src="{{ asset('assets/js/demo/chart-pie-demo.js') }}"></script> --}}
<script src="{{ asset('assets/js/demo/chart-bar-demo.js') }}"></script>

<!-- chart -->
<script src="{{ asset('assets/js/chart-init.js') }}"></script>
<!-- calendar -->
<script src="{{ asset('assets/js/calendar.init.js') }}"></script>
<!-- charts sparkline -->
<script src="{{ asset('assets/js/sparkline.init.js') }}"></script>
<!-- charts morris -->
<script src="{{ asset('assets/js/morris.init.js') }}"></script>
<!-- datepicker -->
<script src="{{ asset('assets/js/datepicker.js') }}"></script>
<!-- sweetalert2 -->
<script src="{{ asset('assets/js/sweetalert2.js') }}"></script>
<!-- toastr -->
<script src="{{ asset('assets/js/toastr.js') }}"></script>
<!-- validation -->
<script src="{{ asset('assets/js/validation.js') }}"></script>

<script>
    @if (session('toast_success'))
        toastr.success("{{ session('toast_success') }}", "", {
            "timeOut": 1000
        }); // Set timeOut to 1000 milliseconds (1 second)
    @endif
    @if (session('toast_error'))
        toastr.error("{{ session('toast_error') }}", "", {
            "timeOut": 1000
        }); // Set timeOut to 1000 milliseconds (1 second)
    @endif
</script>

<!-- custom -->
<script src="{{ asset('assets/js/custom.js') }}"></script>

{{-- Datatables --}}
<script src="{{ asset('assets/datatables/datatables.min.js') }}"></script>

<script src="{{ asset('assets/datatables/datatables.min.js') }}"></script>
<script src="{{ asset('assets/datatables/dataTables.responsive.min.js') }}"></script>

<script src="{{ asset('assets/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/datatables/jquery-ui/jquery-ui.min.js') }}"></script>
<script src="{{ asset('assets/datatables/export-tables/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('assets/datatables/export-tables/buttons.flash.min.js') }}"></script>
<script src="{{ asset('assets/datatables/export-tables/jszip.min.js') }}"></script>
<script src="{{ asset('assets/datatables/export-tables/pdfmake.min.js') }}"></script>
<script src="{{ asset('assets/datatables/export-tables/vfs_fonts.js') }}"></script>
<script src="{{ asset('assets/datatables/export-tables/buttons.print.min.js') }}"></script>


@stack('js')
