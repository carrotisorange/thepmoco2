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

                @can('admin')
                <x-button title="configure contract" data-modal-toggle="configure-contract-modal"><i class="fa-solid fa-edit"></i>&nbsp Contract
                </x-button>
                <x-button title="view in table form" onclick="window.location.href='/property/{{ Session::get('property') }}/units/masterlist'"><i class="fa-solid fa-list"></i>&nbsp Unit
                </x-button>
                <x-button title="add new units" data-modal-toggle="create-unit-modal"><i class="fa-solid fa-circle-plus"></i>&nbsp Unit
                </x-button>
                @endcan
            </h5>
        </div>
    </h2>
</x-slot>
<div class="py-12">
    <div class="max-w-12xl mx-auto sm:px-6 lg:px-8">
        <div class="">
            <x-search placeholder="search for units"></x-search>
        </div>
        <div class="mt-5">
            @if($selectedUnits)
            <x-button onclick="confirmMessage()" wire:click="deleteBills()"><i class="fa-solid fa-trash"></i>&nbsp
                Remove ({{ count($selectedUnits) }})
            </x-button>
            @endif


        </div>
        <div class="mt-5 p-8 bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <div class="flex flex-row">
                    <div class="basis-1/4">
                        @include('utilities.show-unit-filters')
                    </div>
                    <div class="basis-full">
                        @if($units->count())
                        <p class="text-center">

                            {{ $units->links() }}
                            @else
                        <div class="text-center mt-12">
                            <span>No results found!</span>
                            <img class="" src="{{ asset('/brands/no_results.png') }}" />

                        </div>
                        </p>
                        @endif
                        @include('utilities.show-unit-results')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('utilities.create-unit-modal')
@include('utilities.configure-contract-modal')