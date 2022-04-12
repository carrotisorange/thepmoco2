<!-- Favicon -->
<link rel="icon" href="{{ asset('/brands/favicon.ico') }}" type="image/png">

<title>{{ config('app.name', 'The Property Manager') }} @yield('title')</title>

<!-- Fonts -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

<link rel="stylesheet" href="https://unpkg.com/flowbite@1.3.4/dist/flowbite.min.css" />

{{-- Fontawesome --}}
<script src="https://kit.fontawesome.com/b3c8174312.js" crossorigin="anonymous"></script>

<!-- Styles -->
<link rel="stylesheet" href="{{ asset('css/app.css') }}">

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}" defer></script>

{{-- Alpine.js --}}
<script defer src="https://unpkg.com/alpinejs@3.2.4/dist/cdn.min.js"></script>

{{-- Flowbite --}}
<script src="../path/to/flowbite/dist/flowbite.js"></script>

@yield('styles')

@livewireStyles