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
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        @include('layouts.navigation-properties')

        <!-- Page Heading -->
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                <div class="flex">
                    <div class="h-3">
                        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                            <nav class="rounded-md">
                                <ol class="list-reset flex">
                                    <li><a href="/properties/" class="text-blue-600 hover:text-blue-700">Properties</a>
                                    </li>

                                    <li><span class="text-gray-500 mx-2">/</span></li>
                                    <li class="text-gray-500">Create</li>
                                </ol>
                            </nav>
                        </h2>
                    </div>
                    <h5 class="flex-1 text-right">
                        <x-button form="create-form">Submit</x-button>
                    </h5>

                </div>
            </div>

        </header>

        <!-- Page Content -->
        <main>
            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class=" overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 bg-white border-b border-gray-200">
                            <!-- This example requires Tailwind CSS v2.0+ -->
                            <!-- Name -->
                            <div>
                                <form action="/property/{{ $random_str }}/store" method="POST"
                                    enctype="multipart/form-data" id="create-form">
                                    @csrf
                                    <div>
                                        <x-label for="property" :value="__('Property')" />

                                        <x-input id="property" class="block mt-1 w-full" type="text" name="property"
                                            :value="old('property')" required autofocus />

                                        @error('property')
                                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="mt-5">
                                        <x-label for="type" :value="__('Description')" />

                                        <textarea
                                            class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                            name="description" id="description" cols="30"
                                            rows="10">{{ old('description') }}</textarea>

                                        @error('description')
                                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="mt-5">
                                        <x-label for="type_id" :value="__('Type')" />

                                        <select
                                            class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                            name="type_id" id="type_id">
                                            <option value="">Select one</option>
                                            @foreach ($types as $type)
                                            <option value="{{ $type->id }}" {{ old('type_id')==$type->id?
                                                'selected': 'Select one'
                                                }}>{{ $type->type }}</option>
                                            @endforeach
                                        </select>

                                        @error('type_id')
                                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="mt-5">
                                        <x-label for="thumbnail" :value="__('Thumbnail')" />

                                        <x-input id="thumbnail" class="block mt-1 w-full" type="file" name="thumbnail"
                                            :value="old('thumbnail')" required autofocus />

                                        @error('thumbnail')
                                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    {{-- <div class="mt-5">
                                        <p class="text-right">

                                        </p>
                                    </div> --}}
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>

</html>