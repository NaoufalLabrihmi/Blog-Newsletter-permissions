<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"
    x-data="{ darkMode: localStorage.getItem('dark') === 'true'} "
    x-init="$watch('darkMode', val => localStorage.setItem('dark', val))" x-bind:class="{ 'dark': darkMode }">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', config('app.name'))</title>
    <meta name="keywords" content="@yield('meta_keywords','architect')">
    <meta name="description"
        content="web pages for efficient architecture and focus on design. @yield('meta_description','default description')">
    <meta name="theme-color" content="#292929">
    <link rel="canonical" href="{{url()->current()}}" />


    <!-- Favicon-->
    <link rel="icon" href="/favicon.svg" type="image/svg+xml">
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    {{-- Select2 --}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    {{-- Lightbox --}}
    <link href="{{ asset('css/lightbox.css') }}" rel="stylesheet">
    {{-- Markdown --}}
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <!-- Splide -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.0.1/dist/css/splide.min.css"
        rel="stylesheet">
    @laravelPWA
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="//cdn.ckeditor.com/4.18.0/standard/ckeditor.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.0.1/dist/js/splide.min.js"></script>

</head>

<body class="dark:bg-gray-900 font-sans antialiased bg-white">
    {{ $slot }}
    <div class="splide sr-only">
        <div class="splide__track">
            <ul class="splide__list">
                @foreach ($globalTags as $tag)
                <li class="splide__slide">{{ $tag->slug }}</li>
                @endforeach
            </ul>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"
        integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() 
        {
            $('.select2').select2();
        });
    </script>
    <script src="{{ asset('js/lightbox.js') }}"></script>
    <script type="text/javascript">
        // Initialize the service worker
        if ('serviceWorker' in navigator) {
            navigator.serviceWorker.register('/serviceworker.js', {
                scope: '.'
            }).then(function (registration) {
                // Registration was successful
                console.log('Laravel PWA: ServiceWorker registration successful with scope: ', registration.scope);
            }, function (err) {
                // registration failed :(
                console.log('Laravel PWA: ServiceWorker registration failed: ', err);
            });
        }
    </script>
    <script>
        document.addEventListener( 'DOMContentLoaded', function() {
        var splide = new Splide( '.splide', {
        type : 'loop',
        height : '100%',
        focus : 'center',
        autoWidth: true,
        autoplay: 'pause',
        perPage : 3,
        } );
        splide.mount();
      } );
    </script>
    @stack('script')
</body>

</html>