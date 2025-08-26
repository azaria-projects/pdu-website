@push('styles')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:ital,wght@0,100..700;1,100..700&display=swap">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/dist/tabler-icons.min.css"/>
    
    <link as="style" rel="preload" href="{{ asset('themes/adminlte4/css/adminlte.min.css') }}">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css" crossorigin="anonymous"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.11.0/styles/overlayscrollbars.min.css" crossorigin="anonymous"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/apexcharts@3.37.1/dist/apexcharts.css" integrity="sha256-4MX+61mt9NVvvuPjUWdUdyfZfxSB1/Rf9WtqRHgG5S0=" crossorigin="anonymous"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/jsvectormap@1.5.3/dist/css/jsvectormap.min.css" integrity="sha256-+uGLJmmTKOqBr+2E6KDYs/NRsHxSkONXFHUL0fy2O/4=" crossorigin="anonymous"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css" integrity="sha256-tXJfXfp6Ewt1ilPzLDtQnJV4hclT9XuaZUKyUvmyr+Q=" crossorigin="anonymous" media="print" onload="this.media='all'"/>

    <link rel="stylesheet" href="{{ asset('icons/tabler/tabler-icons-filled.min.css') }}">
    <link rel="stylesheet" href="{{ asset('icons/tabler/tabler-icons-outline.min.css') }}">
    <link rel="stylesheet" href="{{ asset('icons/tabler/tabler-icons.min.css') }}">

    <link rel="stylesheet" href="{{ asset('themes/adminlte4/css/adminlte.min.css') }}">

    @vite([
        'resources/css/app.css',
        'resources/css/components/navbar.css',
        'resources/css/components/footer.css',
        'resources/css/components/button.css',

        'resources/css/pages/index.css',
        'resources/css/pages/company/index.css',
        'resources/css/pages/services/index.css',
        'resources/css/pages/opportunities/index.css',
    ])
@endpush
