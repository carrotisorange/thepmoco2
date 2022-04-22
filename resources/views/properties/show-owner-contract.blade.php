<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('/brands/favicon.ico') }}" type="image/png">

    <title>The Property Manager | Properties</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    {{-- Alpine.js --}}
    <script defer src="https://unpkg.com/alpinejs@3.2.4/dist/cdn.min.js"></script>

    {{-- Fontawesome --}}
    <script src="https://kit.fontawesome.com/b3c8174312.js" crossorigin="anonymous"></script>
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        @include('layouts.navigation-properties')
        <header class="bg-white shadow">
            <div class="max-w-12xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                <div class="flex">
                    <div class="h-3">
                        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                            <nav class="rounded-md">
                                <ol class="list-reset flex">
                                    <li class="text-gray-500">{{ $property->property }}</li>
                                    <li><span class="text-gray-500 mx-2">/</span></li>
                                    <li class="text-gray-500">Owner Contract</li>

                                </ol>
                            </nav>
                        </h2>
                    </div>
                    <h5 class="flex-1 text-right">
                        {{-- <x-button onclick="window.location.href='/documentation/'">Documentation
                        </x-button>
                        @if(auth()->user()->role_id === 5)
                        <x-button onclick="window.location.href='/property/{{ Str::random(10) }}/create'">Create
                            Property
                        </x-button>
                        @endif --}}
                    </h5>
                </div>
            </div>
        </header>
        <main>
            <div class="py-12">
                <div class="max-w-12xl mx-auto sm:px-6 lg:px-8">
                    <div class=" overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 bg-white border-b border-gray-200">
                            <div class="flex flex-col">
                                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                            <embed src="/storage/{{ $property->owner_contract }}"
                                                type="application/pdf" height="800px" width="100%">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

</body>

</html>