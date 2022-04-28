<x-app-layout>
    @section('title', '| Units | Edit',)
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <div class="flex">
                <div class="h-3">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                        <nav class="rounded-md w-full">
                            <ol class="list-reset flex">
                                <li><a href="/property/{{ Session::get('property') }}"
                                        class="text-blue-600 hover:text-blue-700">{{
                                        Session::get('property_name') }}</a>
                                </li>
                                <li><span class="text-gray-500 mx-2">/</span></li>
                                <li><span class="text-gray-500 mx-2">Units</span></li>
                                <li><span class="text-gray-500 mx-2">/</span></li>
                                <li class="text-gray-500">Bulk Edit ({{ $units->count() }})</li>
                            </ol>
                        </nav>
                    </h2>
                </div>
                <h5 class="flex-1 text-right">
                    <x-button wire:click="deleteUnits()"><i class="fa-solid fa-trash"></i>&nbsp
                        Remove
                    </x-button>
                    <x-button data-modal-toggle="authentication-modal"><i class="fa-solid fa-circle-plus"></i>&nbsp Unit
                    </x-button>
                    <x-button data-modal-toggle="add-building-modal"><i class="fa-solid fa-circle-plus"></i>&nbsp
                        Building
                    </x-button>

                    @if($units->count())
                    <x-button form="edit-form"><i class="fas fa-check-circle"></i>&nbsp Save</x-button>
                    @else
                    <x-button onclick="window.location.href='/unit/{{ Str::random(10) }}/create'">Create Unit
                    </x-button>
                    @endif
                </h5>
            </div>
        </h2>
    </x-slot>
    @include('utilities.create-unit')
    <div class="py-12">
        {{-- Units: {{ var_export($selectedUnits) }} --}}
        <div class="max-w-12xl mx-auto sm:px-6 lg:px-8">
            <div class=" overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <!-- This example requires Tailwind CSS v2.0+ -->
                    <div class="flex flex-col">
                        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                @if (!$units->count())
                                <span class="text-center text-red">No units found!</span>
                                @else
                                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                        <thead
                                            class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                            <tr>
                                                <th scope="col" class="p-4">
                                                    <div class="flex items-center">
                                                        <x-input id="" wire:model="selectAll" type="checkbox" />
                                                    </div>
                                                </th>
                                                <th scope="col" class="px-6 py-3">
                                                    Unit
                                                </th>
                                                <th scope="col" class="px-6 py-3">
                                                    Building
                                                </th>
                                                <th scope="col" class="px-6 py-3">
                                                    Floor
                                                </th>
                                                <th scope="col" class="px-6 py-3">
                                                    Category
                                                </th>
                                                <th scope="col" class="px-6 py-3">
                                                    Size (sqm)
                                                </th>
                                                <th scope="col" class="px-6 py-3">
                                                    Rent/Mo
                                                </th>
                                                <th scope="col" class="px-6 py-3">
                                                    Occupancy
                                                </th>

                                            </tr>
                                        </thead>
                                        <?php 
                                            $ctr = 1;
                                            $uuid = 1;
                                            $name = 1;
                                            $building_id =1;
                                            $floor_id = 1;
                                            $category_id =1;
                                            $size = 1;
                                            $rent =1;
                                            $occupancy =1;
                                        ?>
                                        <form action="/units/{{ $batch_no }}/update" method="POST" id="edit-form">
                                            @csrf
                                            @method('PATCH')
                                        </form>
                                        @foreach ($units as $unit)
                                        <tbody>
                                            <tr
                                                class="border-b dark:bg-gray-800 dark:border-gray-700 odd:bg-white even:bg-gray-50 odd:dark:bg-gray-800 even:dark:bg-gray-700">
                                                <td class="p-4">
                                                    <div class="flex items-center">
                                                        <x-input type="checkbox" wire:model="selectedUnits"
                                                            value="{{ $unit->uuid }}" />
                                                    </div>
                                                </td>

                                                <td class="px-4 py-4">
                                                    <x-table-input form="edit-form" type="text" name="unit{{ $name++ }}"
                                                        value="Unit {{ $unit_count++ }}" />
                                                </td>

                                                <input form="edit-form" type="hidden" name="uuid{{ $uuid++ }}" id="uuid"
                                                    value="{{ $unit->uuid }}">
                                                <td class="px-4 py-4">
                                                    <x-table-select form="edit-form"
                                                        name="building_id{{ $building_id++  }}" id="building_id">
                                                        <option value="">Select one </option>
                                                        @foreach ($buildings as $building)
                                                        <option value="{{ $building->id }}">{{ $building->building
                                                            }}
                                                        </option>
                                                        @endforeach

                                                    </x-table-select>
                                                </td>
                                                <td class="px-4 py-4">
                                                    <x-table-select form="edit-form" name="floor_id{{ $floor_id++  }}"
                                                        id="floor_id">
                                                        <option value="">Select one</option>
                                                        @foreach ($floors as $floor)
                                                        <option value="{{ $floor->id }}">{{ $floor->floor }}
                                                        </option>
                                                        @endforeach
                                                    </x-table-select>
                                                </td>
                                                <td class="px-4 py-4">
                                                    <x-table-select form="edit-form"
                                                        name="category_id{{ $category_id++  }}">
                                                        <option value="">Select one</option>
                                                        @foreach ($categories as $category)
                                                        <option value="{{ $category->id }}">{{ $category->category
                                                            }}
                                                        </option>
                                                        @endforeach
                                                    </x-table-select>
                                                </td>
                                                <td class="px-4 py-4">
                                                    <x-table-input form="edit-form" name="size{{ $size++  }}" id="size"
                                                        type="text" min="1" value="{{ $unit->size }}" />
                                                </td>
                                                <td class="px-4 py-4">
                                                    <x-table-input form="edit-form" min="0" name="rent{{ $rent++  }}"
                                                        id="rent" type="number" value="{{ $unit->rent }}" />
                                                </td>
                                                <td class="px-4 py-4">
                                                    <x-table-input form="edit-form" name="occupancy{{ $occupancy++  }}"
                                                        id="occupancy" type="number" min="1"
                                                        value="{{ $unit->occupancy }}" />
                                                </td>
                                            </tr>
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
    @include('utilities.create-building');
    @include('utilities.delete-unit-modal')
</x-app-layout>