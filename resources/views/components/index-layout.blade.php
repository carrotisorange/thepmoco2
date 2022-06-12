<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('layouts.head')
</head>

<body class="font-sans antialiased" body x-data="{'isModalOpen': false}" x-on:keydown.escape="isModalOpen=false">
    <div class="min-h-screen bg-gray-100">
        @include('layouts.navigation')

        <!-- Page Heading -->
        <header class="bg-white shadow">
            <div class="max-w-12xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    <div class="flex">
                        <div class="h-3">
                            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                                <nav class="rounded-md">
                                    <ol class="list-reset flex">
                                        <li><a href="/property/{{ Session::get('property') }}"
                                                class="text-indigo-600 hover:text-indigo-700">{{
                                                Session::get('property_name') }}</a>
                                        </li>
                                        <li><span class="text-gray-500 mx-2">/</span></li>
                                        {{ $labels }}
                                    </ol>
                                </nav>
                            </h2>
                        </div>
                        <h5 class="flex-1 text-right">
                            {{ $options }}
                        </h5>
                    </div>
                </h2>
            </div>
        </header>
        <!-- Page Content -->
        <main>
            <div class="py-2">
                <div class="max-w-12xl mx-auto sm:px-6 lg:px-8">
                    <div class="mt-5 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="border-b border-gray-200">
                            <div class="flex flex-col">
                                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                            {{ $slot }}
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
    @include('layouts.footer')
</body>
@include('layouts.script')
</html>