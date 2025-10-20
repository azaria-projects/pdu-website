@push('styles')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:ital,wght@0,100..700;1,100..700&display=swap">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/dist/tabler-icons.min.css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.11.0/styles/overlayscrollbars.min.css" crossorigin="anonymous"/>

    <link rel="stylesheet" href="{{ asset('themes/adminlte4/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dependancies/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dependancies/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dependancies/datatable/css/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dependancies/summernote/css/summernote-bs5.min.css') }}">

    @vite([
        'resources/css/app.css',
        'resources/css/components-admin/form.css',
        'resources/css/components-admin/table.css',
        'resources/css/components-admin/navbar.css',
        'resources/css/components-admin/footer.css',
        'resources/css/components-admin/button.css',
        'resources/css/components-admin/sidebar.css',
    ])
@endpush
