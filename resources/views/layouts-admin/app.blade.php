<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts-admin.metadata')

    @include('layouts-admin.styles')

    @stack('styles')

    @stack('scripts-head')
</head>
<body class="layout-fixed sidebar-expand-lg sidebar-mini main-background">
    <div class="app-wrapper">
        @include('layouts-admin.navbar')

        @include('layouts-admin.sidebar')

        <main class="app-main">
            @yield('content')
        </main>

        @include('layouts-admin.footer')
    </div>

    @include('layouts-admin.scripts')

    @stack('scripts-body')

    <script>
        (function () {
            'use strict'

            var forms = document.querySelectorAll('.needs-validation')

            Array.prototype.slice.call(forms)
                .forEach(function (form) {
                    form.addEventListener('submit', function (event) {
                        if (!form.checkValidity()) {
                            event.preventDefault()
                            event.stopPropagation()
                        }

                        form.classList.add('was-validated')
                    }, false)
                })
        })()
    </script>
</body>
</html>
