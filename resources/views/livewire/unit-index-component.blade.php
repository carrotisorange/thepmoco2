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
                <x-button data-modal-toggle="authentication-modal"><i class="fa-solid fa-circle-plus"></i>&nbsp Unit
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
            <x-search placeholder="search for units"></x-search>
        </div>
        <div class="mt-5">
           
        </div>
        <div class="mt-5 p-8 bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <div class="flex flex-row">
                    <div class="basis-1/8">
                        @include('utilities.show-unit-filters')
                    </div>
                    <div class="basis-3/4 ml-12">
                        <p class="text-center">
                            @if($units->count())
                            {{ $units->links() }}
                            @else
                            No units found!
                        </p>
                        @endif
                        @include('utilities.show-unit-results')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>