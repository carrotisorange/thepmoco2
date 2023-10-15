<meta charset="utf-8">

<meta name="viewport" content="width=device-width, initial-scale=1">

<meta name="csrf-token" content="{{ csrf_token() }}">

<meta name="facebook-domain-verification" content="q3z93v1eg3wsq648g7aq2cuby3ibcv" />

<title> {{ucfirst(Route::current()->getName())}}  |  {{env('APP_NAME')}}  </title>

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

<link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>

<script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/focus@3.x.x/dist/cdn.min.js"></script>

<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

<script src="{{ asset('js/app.js') }}" defer></script>

@yield('styles')

@livewireStyles

    <style>
    * {
        margin: 0px;
        padding: 0;
        font-family: 'Poppins';

    }


    .heading {
        display: flex;



    }

    h1 {
        background: transparent;
        padding: 7px;

    }


    .outer-wrapper {
        margin: 2px;
        margin-left: 0px;
        margin-right: 0px;
        max-width: fit-content;
        max-height: fit-content;


    }

    .table-wrapper {

        overflow-y: scroll;
        overflow-x: scroll;
        height: fit-content;
        max-height: 66.4vh;
        margin-top: 22px;
        margin: 15px;
        padding-bottom: 20px;

    }


    table {

        min-width: max-content;
        border-collapse: separate;
        border-spacing: 0px;

    }



    table th {
        position: sticky;
        top: 0px;
        background-color: #e3e3e3;
        color: #2e2e2e;
        text-align: center;
        font-weight: light;
        font-size: 12px;
        outline: 0.7px;
        border: 1.5px solid gray;

    }



    table th,
    table td {
        padding: 15px;
        padding-top: 10px;
        padding-bottom: 10px;

    }

    table td {
        text-align: left;
        font-size: 12px;
        border: 1px solid rgb(177, 177, 177);
        padding-left: 20px;

    }

    .first-col {
        width: 100px;
        min-width: 100px;
        max-width: 100px;
        left: 0px;
    }

    .second-col {
        width: 100px;
        min-width: 100px;
        max-width: 100px;
        left: 100px;
    }

    .third-col {
        width: 100px;
        min-width: 100px;
        max-width: 100px;
        left: 200px;
    }

    .fourth-col {
        width: 100px;
        min-width: 100px;
        max-width: 100px;
        left: 300px;
    }

    .fifth-col {
        width: 100px;
        min-width: 100px;
        max-width: 100px;
        left: 400px;
    }

    .sixth-col {
        width: 100px;
        min-width: 100px;
        max-width: 100px;
        left: 500px;
    }

    .seventh-col {
        width: 100px;
        min-width: 100px;
        max-width: 100px;
        left: 600px;
    }

    .eight-col {
        width: 100px;
        min-width: 100px;
        max-width: 100px;
        left: 700px;
    }

    .ninth-col {
        width: 100px;
        min-width: 100px;
        max-width: 100px;
        left: 800px;
    }

    .tenth-col {
        width: 100px;
        min-width: 100px;
        max-width: 100px;
        left: 900px;
    }

    .sticky-col {
        position: -webkit-sticky;
        position: sticky;
        background-color: white;
    }
</style>




