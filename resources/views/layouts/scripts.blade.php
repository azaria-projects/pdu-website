@push('scripts-body')
    <script src="{{ asset('themes/adminlte4/js/adminlte.min.js') }}"></script>
    <script src="{{ asset('dependancies/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('dependancies/select2/js/select2.min.js') }}"></script>
    <script src="{{ asset('dependancies/datatable/js/datatables.min.js') }}"></script>
    <script src="{{ asset('dependancies/moment/moment.min.js') }}"></script>
    <script src="{{ asset('dependancies/daterangepicker/js/daterangepicker.js') }}"></script>

    @vite([ 'resources/js/app.js' ])
@endpush
