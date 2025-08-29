@push('scripts-body')
    <script src="{{ asset('themes/adminlte4/js/adminlte.min.js') }}"></script>
    <script src="{{ asset('dependancies/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('dependancies/select2/js/select2.min.js') }}"></script>

    @vite([ 'resources/js/app.js' ])

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const nvi = document.getElementById('navbar-items');

            const mn1 = document.getElementById('career-menu');
            const mn2 = document.getElementById('service-menu');
            const mn3 = document.getElementById('company-menu');

            const ms1 = document.getElementById('career-submenu');
            const ms2 = document.getElementById('service-submenu');
            const ms3 = document.getElementById('company-submenu');

            nvi.addEventListener("mouseleave", function (e) {
                if (!ms1.classList.contains('d-none')) {
                    ms1.classList.add('d-none');
                }

                if (!ms2.classList.contains('d-none')) {
                    ms2.classList.add('d-none');
                }

                if (!ms3.classList.contains('d-none')) {
                    ms3.classList.add('d-none');
                }
            });

            mn1.addEventListener("mouseenter", function (e) {
                ms1.classList.remove('d-none');

                if (!ms2.classList.contains('d-none')) {
                    ms2.classList.add('d-none');
                }

                if (!ms3.classList.contains('d-none')) {
                    ms3.classList.add('d-none');
                }
            });

            mn2.addEventListener("mouseenter", function (e) {
                ms2.classList.remove('d-none');

                if (!ms1.classList.contains('d-none')) {
                    ms1.classList.add('d-none');
                }

                if (!ms3.classList.contains('d-none')) {
                    ms3.classList.add('d-none');
                }
            });

            mn3.addEventListener("mouseenter", function (e) {
                ms3.classList.remove('d-none');

                if (!ms1.classList.contains('d-none')) {
                    ms1.classList.add('d-none');
                }

                if (!ms2.classList.contains('d-none')) {
                    ms2.classList.add('d-none');
                }
            });
        });
    </script>
@endpush
