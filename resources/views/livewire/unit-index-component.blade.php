@section('title', '| Units')
<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        <div class="flex">
            <div class="h-3">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    <nav class="rounded-md">
                        <ol class="list-reset flex">
                            <li><a href="/property/{{ Session::get('property') }}"
                                    class="text-blue-600 hover:text-blue-700">{{
                                    Session::get('property_name') }}</a>
                            </li>
                            <li><span class="text-gray-500 mx-2">/</span></li>
                            <li class="text-gray-500">
                                {{ Str::plural('Unit', $units->count())}}
                            </li>
                        </ol>
                    </nav>

                </h2>
            </div>
            <h5 class="flex-1 text-right">

                @can('manager')
                {{-- <button
                    class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                    type="button">
                    Toggle modal
                </button> --}}
                <x-button data-modal-toggle="authentication-modal"><i class="fa-solid fa-circle-plus"></i>&nbsp Add Unit
                </x-button>
                @endcan
            </h5>
            @include('utilities.create-unit')
        </div>
    </h2>
</x-slot>
<div class="py-12">
    <div class="max-w-12xl mx-auto sm:px-6 lg:px-8">
        <div class="">
            <label for="table-search" class="sr-only">Search</label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                            clip-rule="evenodd"></path>
                    </svg>
                </div>
                <input wire:model="search" type="text" id="table-search"
                    class="bg-white-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-80 pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Search for units">
            </div>
        </div>

        <div class="mt-5">
            {{ $units->links() }}
        </div>

        <div class="mt-5 p-8 bg-white overflow-hidden shadow-sm sm:rounded-lg">

            <div class="p-6 bg-white border-b border-gray-200">

                <div class="flex flex-row">
                    <div class="basis-1/8">
                        @include('utilities.show-unit-filters')
                    </div>
                    <div class="basis-3/4 ml-12">
                        @if($units->count())
                        <span class="font-bold tex-center">Results ({{ $units->count() }})...</span>
                        @else
                        <p class="text-center text-red-600">No units found!</p>
                        @endif
                        @include('utilities.show-unit-results')
                    </div>
                    {{-- <div class="basis-1/2 ml-16">
                        @include('utilities.show-unit-details')
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</div>