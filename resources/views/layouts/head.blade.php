<meta charset="utf-8">

<meta name="viewport" content="width=device-width, initial-scale=1">

<meta name="csrf-token" content="{{ csrf_token() }}">

<meta name="facebook-domain-verification" content="q3z93v1eg3wsq648g7aq2cuby3ibcv" />

<!-- Facebook Pixel Code -->
<script>
        !function(f,b,e,v,n,t,s)
    {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
    n.callMethod.apply(n,arguments):n.queue.push(arguments)};
    if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
    n.queue=[];t=b.createElement(e);t.async=!0;
    t.src=v;s=b.getElementsByTagName(e)[0];
    s.parentNode.insertBefore(t,s)}(window,document,'script',
    'https://connect.facebook.net/en_US/fbevents.js');
    fbq('init', '847561769549195'); 
    fbq('track', 'PageView');
    </script>
    <noscript>
        <img height="1" width="1" src="https://www.facebook.com/tr?id=847561769549195&ev=PageView
    &noscript=1" />
</noscript>
<!-- End Facebook Pixel Code -->

<!-- Favicon -->
<link rel="icon" href="{{ asset('/brands/favicon.ico') }}" type="image/png">

<title>{{ Session::get('property_name')? Session::get('property_name'): config('APP_NAME') }} @yield('title')</title>

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
<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">

<!-- Scripts -->
<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

{{-- Flowbite --}}
<script src="../path/to/flowbite/dist/flowbite.js"></script>

@yield('styles')

@livewireStyles