<meta charset="utf-8">

<meta name="viewport" content="width=device-width, initial-scale=1">

<meta name="csrf-token" content="{{ csrf_token() }}">

<meta name="facebook-domain-verification" content="q3z93v1eg3wsq648g7aq2cuby3ibcv" />

<title>@yield('title')</title>

{{-- <link rel="stylesheet" href="https://unpkg.com/flowbite@1.5.4/dist/flowbite.min.css" /> --}}

<!-- Favicon -->
<link rel="icon" href="{{ asset('/brands/favicon.ico') }}" type="image/png">

<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">

<!-- Fonts -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

<!-- Styles -->
<link rel="stylesheet" href="{{ asset('css/app.css') }}">

{{-- Fontawesome --}}
<script src="https://kit.fontawesome.com/b3c8174312.js" crossorigin="anonymous"></script>

<!-- Scripts -->

{{-- Alpine.js --}}
<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

@livewireStyles

<script src="{{ asset('js/app.js') }}" defer></script>

@yield('styles')




