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
                                    <li>
                                        Properties ({{ $properties->count() }})
                                    </li>

                                </ol>
                            </nav>
                        </h2>
                    </div>
                    <h5 class="flex-1 text-right">
                        <x-button onclick="window.location.href='/documentation/'">Show Documentation
                        </x-button>
                        @if(auth()->user()->role_id === 5)
                        <x-button onclick="window.location.href='/property/{{ Str::random(10) }}/create'">Create Property
                        </x-button>
                       
                        @endif
                    </h5>

                </div>
            </div>

        </header>

        <!-- Page Content -->
        <main>
            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class=" overflow-hidden shadow-sm sm:rounded-lg">
                        {{-- <span>You have {{ Str::plural('property', $properties->count())
                            }}.</span> --}}
                        <div class="p-6 bg-white border-b border-gray-200">
                            <!-- This example requires Tailwind CSS v2.0+ -->
                            <div class="flex flex-col">
                                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                        @if (!$properties->count())
                                        <span class="text-center text-red">No properties found!</span>
                                        @else
                                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">

                                            <table class="min-w-full divide-y divide-gray-200">
                                                <thead class="bg-gray-50">
                                                    <tr>
                                                        <th scope="col"
                                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                            #</th>
                                                        <th scope="col"
                                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                            Property</th>
                                                        <th scope="col"
                                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                            Description</th>
                                                        <th scope="col"
                                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                            Units</th>
                                                        {{-- <th scope="col"
                                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                            Manager</th> --}}
                                                        <th scope="col"
                                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                            Status</th>
                                                        <th scope="col"
                                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                            Created on</th>

                                                        <th colspan="3" scope="col" class="relative px-6 py-3">
                                                            <span class="sr-only"></span>
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <?php $ctr = 1 ?>
                                                @foreach ($properties as $property)
                                                <tbody class="bg-white divide-y divide-gray-200">
                                                    <tr>
                                                        <td class="px-6 py-4 whitespace-nowrap">
                                                            {{ $ctr++ }}
                                                        </td>
                                                        <td class="px-6 py-4 whitespace-nowrap">
                                                            <div class="flex items-center">
                                                                <div class="flex-shrink-0 h-10 w-10">
                                                                    <a href="/property/{{ $property->property_uuid }}">
                                                                        <img class="h-10 w-10 rounded-full"
                                                                            src="/storage/{{ $property->thumbnail }}"
                                                                            alt=""></a>
                                                                </div>
                                                                <div class="ml-4">
                                                                    <div class="text-sm font-medium text-gray-900">{{
                                                                        $property->property }}
                                                                    </div>
                                                                    <div class="text-sm text-gray-500">{{
                                                                        $property->type
                                                                        }}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{
                                                            substr($property->description, 0, 25) }}...</td>
                                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{
                                                            number_format($property->units_count,0) }}</td>
                                                        {{-- <td
                                                            class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{
                                                            $property->name }}</td> --}}

                                                        <td class="px-6 py-4 whitespace-nowrap">
                                                            @if($property->property_status === 'active')
                                                            <span
                                                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                                {{ $property->property_status }}
                                                            </span>
                                                            @endif
                                                        </td>
                                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{
                                                            Carbon\Carbon::parse($property->property_created_at)->diffForHumans()
                                                            }}</td>
                                                        <td
                                                            class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                            <a href="/property/{{ $property->property_uuid }}/edit"
                                                                class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                                        </td>
                                                    </tr>

                                                    <!-- More people... -->
                                                </tbody>
                                                @endforeach
                                            </table>


                                        </div>
                                        @endif
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
    @include('layouts.notifications')
</body>

</html>