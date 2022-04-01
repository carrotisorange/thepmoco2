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
                                <li><a href="/property/{{ Session::get('property') }}/units"
                                        class="text-blue-600 hover:text-blue-700">Units</a>
                                </li>
                                <li><span class="text-gray-500 mx-2">/</span></li>
                                <li class="text-gray-500">Edit ({{ $units->count() }})</li>
                            </ol>
                        </nav>
                    </h2>
                </div>
                <h5 class="flex-1 text-right">
                    <x-button onclick="window.location.href='/property/{{ Session::get('property') }}/units'">Back
                    </x-button>
                    <x-button data-modal-toggle="small-modal">
                        Create Building
                    </x-button>
                    @if($units->count())
                    <x-button form="edit-form">Save</x-button>
                    @else
                    <x-button onclick="window.location.href='/unit/{{ Str::random(10) }}/create'">Create Unit
                    </x-button>
                    @endif

                </h5>

            </div>
        </h2>
    </x-slot>
    <div class="py-12">
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
                                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">

                                    <table class="min-w-full divide-y divide-gray-200">
                                        <thead class="bg-gray-50">
                                            <tr>
                                                <th scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    <input
                                                        class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer"
                                                        type="checkbox" wire:model="selectAll">
                                                </th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Unit</th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Building</th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Floor</th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Category</th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Size</th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Rent</th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Occupancy</th>
                                                {{-- <th scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                </th> --}}

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
                                        <tbody class="bg-white divide-y divide-gray-200">
                                            <tr>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <input
                                                        class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer"
                                                        type="checkbox" wire:model="selectedUnits"
                                                        value="{{ $unit->uuid }}">

                                                </td>
                                                <td class="px-3 py-4 whitespace-nowrap">
                                                    <input
                                                        class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                                        form="edit-form" type="text" name="unit{{ $name++ }}"
                                                        value="Unit {{ $unit_count++ }}">

                                                </td>

                                                <input form="edit-form" type="hidden" name="uuid{{ $uuid++ }}" id="uuid"
                                                    value="{{ $unit->uuid }}">

                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <select
                                                        class="block p-5
                                                                    py-1.5
                                                                    text-base
                                                                    font-normal
                                                                    text-gray-700
                                                                    bg-white bg-clip-padding bg-no-repeat
                                                                    border border-solid border-gray-300
                                                                    rounded
                                                                    transition
                                                                    ease-in-out
                                                                    m-0
                                                                    focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                                        form="edit-form" name="building_id{{ $building_id++  }}"
                                                        id="building_id">
                                                        <option value="">Select one </option>
                                                        @foreach ($buildings as $building)
                                                        <option value="{{ $building->id }}">{{ $building->building
                                                            }}
                                                        </option>
                                                        @endforeach

                                                    </select>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <select
                                                        class="block p-5
                                                                    py-1.5
                                                                    text-base
                                                                    font-normal
                                                                    text-gray-700
                                                                    bg-white bg-clip-padding bg-no-repeat
                                                                    border border-solid border-gray-300
                                                                    rounded
                                                                    transition
                                                                    ease-in-out
                                                                    m-0
                                                                    focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                                        form="edit-form" name="floor_id{{ $floor_id++  }}"
                                                        id="floor_id">
                                                        <option value="">Select one</option>
                                                        @foreach ($floors as $floor)
                                                        <option value="{{ $floor->id }}">{{ $floor->floor }}
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <select
                                                        class="block p-5
                                                                    py-1.5
                                                                    text-base
                                                                    font-normal
                                                                    text-gray-700
                                                                    bg-white bg-clip-padding bg-no-repeat
                                                                    border border-solid border-gray-300
                                                                    rounded
                                                                    transition
                                                                    ease-in-out
                                                                    m-0
                                                                    focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                                        form="edit-form" name="category_id{{ $category_id++  }}">
                                                        <option value="">Select one</option>
                                                        @foreach ($categories as $category)
                                                        <option value="{{ $category->id }}">{{ $category->category
                                                            }}
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                                <td class="px-3 py-4 whitespace-nowrap">
                                                    <input
                                                        class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                                        form="edit-form" name="size{{ $size++  }}" id="size" type="text"
                                                        min="1" value="{{ $unit->size }}">
                                                    </input>
                                                </td>
                                                <td class="px-3 py-4 whitespace-nowrap">
                                                    <input
                                                        class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                                        form="edit-form" min="0" name="rent{{ $rent++  }}" id="rent"
                                                        type="number" value="{{ $unit->rent }}"></input>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <input
                                                        class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                                        form="edit-form" name="occupancy{{ $occupancy++  }}"
                                                        id="occupancy" type="number" min="1"
                                                        value="{{ $unit->occupancy }}">
                                                    </input>
                                                </td>
                                                {{-- <td
                                                    class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                    <form method="POST" action="/unit/{{ $unit->uuid }}/delete"
                                                        id="delete-form">
                                                        @csrf
                                                        @method('delete')
                                                        <button class="text-red-600 hover:text-red-900"
                                                            form="delete-form">Remove</button>
                                                    </form>

                                                </td> --}}

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
</x-app-layout>