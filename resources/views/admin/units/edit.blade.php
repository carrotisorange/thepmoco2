<x-app-layout>
    @section('title', '| Edit',)
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
                    <x-button data-modal-toggle="small-modal">
                        Create Building
                    </x-button>
                    @if($units->count())
                    <x-button form="edit-form">Save Units</x-button>
                    @else
                    <x-button onclick="window.location.href='/unit/{{ Str::random(10) }}/create'">Create Building
                    </x-button>
                    @endif
                </h5>

            </div>
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
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
                                                    #</th>
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
                                                    Price</th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Occupancy</th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                </th>

                                            </tr>
                                        </thead>
                                        <?php $ctr=1?>
                                        <form action="/unit/{{ $batch_no }}/update" method="POST" id="edit-form">
                                            @csrf
                                            @method('PATCH')
                                        </form>
                                        @foreach ($units as $unit)
                                        <tbody class="bg-white divide-y divide-gray-200">
                                            <tr>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    {{ $ctr++ }}
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <x-input form="edit-form" name="unit" type="text"
                                                        value="{{ $unit->unit }}"></x-input>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <x-select form="edit-form" name="unit">
                                                        <option value="">Select one</option>
                                                        @foreach ($buildings as $building)
                                                        <option value="{{ $building->id }}">{{ $building->building
                                                            }}
                                                        </option>
                                                        @endforeach

                                                    </x-select>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <x-select form="edit-form" name="floor_id">
                                                        <option value="">Select one</option>
                                                        @foreach ($floors as $floor)
                                                        <option value="{{ $floor->id }}">{{ $floor->floor }}
                                                        </option>
                                                        @endforeach
                                                    </x-select>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <x-select form="edit-form" name="category_id">
                                                        <option value="">Select one</option>
                                                        @foreach ($categories as $category)
                                                        <option value="{{ $category->id }}">{{ $category->category
                                                            }}
                                                        </option>
                                                        @endforeach
                                                    </x-select>
                                                </td>
                                                <td class="px-3 py-4 whitespace-nowrap">
                                                    <x-input form="edit-form" name="price" type="number"
                                                        value="{{ $unit->price }}"></x-input>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <x-input form="edit-form" name="occupancy" type="number"
                                                        value="{{ $unit->occupancy }}"></x-input>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                    <form method="POST" action="/unit/{{ $unit->uuid }}/delete"
                                                        id="delete-form">
                                                        @csrf
                                                        @method('delete')
                                                        <button class="text-red-600 hover:text-red-900"
                                                            form="delete-form">Remove</button>
                                                    </form>

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
    <!-- Small Modal -->
    <div class="hidden overflow-y-auto overflow-x-hidden fixed right-0 left-0 top-4 z-50 justify-center items-center md:inset-0 h-modal sm:h-full"
        id="small-modal">
        <div class="relative px-4 w-full max-w-md h-full md:h-auto">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex justify-between items-center p-5 rounded-t border-b dark:border-gray-600">
                    <h3 class="text-xl font-medium text-gray-900 dark:text-white">
                        New building
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-toggle="small-modal">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-6 space-y-6">
                    <form action="/building/{{ Str::random(10) }}/store" method="POST" id="add-building-form">
                        @csrf
                        <div class="mt-4">
                            <x-label for="building" :value="__('Building')" />
                            <x-input form="add-building-form" id="building" class="block mt-1 w-full" type="text"
                                name="building" required />

                        </div>
                    </form>
                </div>
                <!-- Modal footer -->
                <div class="p-6 space-x-2 rounded-b border-t border-gray-200 dark:border-gray-600">
                    <p class="text-right">
                        <x-button form="add-building-form">Save</x-button>
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>