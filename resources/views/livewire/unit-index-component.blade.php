<div>
    <div class="mt-10 px-4 sm:px-6 lg:px-8">
        <div class="sm:flex sm:items-center">
            <div class="sm:flex-auto">
                <h1 class="text-3xl font-bold text-gray-500">Units</h1>
            </div>
            <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
                @if($sortBy || $orderBy || $search || $status_id || $category_id || $building_id)
                <x-button name="clearFilters" type="button" wire:click="clearFilters()" >
                    Clear Filters
                </x-button>
                @endif

                <x-button name="newUnitModal" type="button" data-modal-toggle="instructions-create-unit-modal">New unit
                </x-button>

                @if($view === 'list')
                <x-button type="button" wire:click="changeView('thumbnail')" >
                    View as Thumbnail

                </x-button>
                @else
                <x-button type="button" wire:click="changeView('list')" >
                    View as List
                </x-button>
                @endif


                @if($units->count())
                <x-button type="button" wire:click="editUnits"> Edit
                    Units</x-button>
                @endif

            </div>
        </div>

        <div class="mt-3">
            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                @if(App\Models\Property::find(Session::get('property_uuid'))->units()->count())

                <div class="mt-6 grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
                   <div class="sm:col-span-6">

                    <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-gray-300">Search</label>
                    <div class="relative w-full mb-5">
                        <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                            <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </div>
                        <input type="search" id="search" wire:model="search"
                            class="bg-white block p-4 pl-10 w-full text-sm h-5 text-gray-90 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Search for unit..." required>

                    </div>

                </div>

                    <div class="sm:col-span-1">
                        <x-select name="building_id" id="building_id" wire:model="building_id"
                           >  <option value="">Filter building</option>
                            @foreach ($buildings as $item)
                            <option value="{{ $item->building_id }}">{{ $item->building }}</option>
                            @endforeach
                        </x-select>
                    </div>

                    <div class="sm:col-span-1">
                        <x-select name="category_id" id="category_id" wire:model="category_id"
                          >   <option value="">Filter category</option>
                            @foreach ($categories as $item)
                            <option value="{{ $item->id }}">{{ $item->category }}</option>
                            @endforeach
                        </x-select>
                    </div>


                    <div class="sm:col-span-1">
                        <x-select name="status_id" id="status_id" wire:model="status_id">  \
                            <option value="">Filter status</option>
                            @foreach ($statuses as $item)
                            <option value="{{ $item->status_id }}">{{ $item->status }}</option>
                            @endforeach
                        </x-select>
                    </div>

                    <div class="sm:col-span-1">
                        <x-select name="sortBy" id="small" wire:model="sortBy">
                            <option value="unit" selected>Sort by</option>
                            <option value="created_at">date created</option>
                            <option value="floor_id">floor</option>
                            <option value="occupancy">occupancy</option>
                            <option value="rent">rent</option>
                            <option value="unit">unit</option>
                        </x-select>
                    </div>

                    <div class="sm:col-span-1">
                        <x-select name="orderBy" id="small" wire:model="orderBy">
                            <option value="" selected>Sorting order</option>
                            <option value="asc">ascending</option>
                            <option value="desc">descending</option>
                        </x-select>
                    </div>
                    <div class="sm:col-span-1">
                        <x-select name="limitDisplayTo" id="small" wire:model="limitDisplayTo">
                            <option value="" selected>Limit display to</option>
                            @for ($i = 1; $i <= $totalUnitsCount; $i++)
                                @if($i%10==0 || $i==$totalUnitsCount)
                                <option value="{{ $i }}">{{ $i }} </option>
                                @endif
                            @endfor
                        </x-select>
                    </div>
                </div>
                <div class="mt-5">
                    {{ $units->links() }}
                </div>

            </div>
            @endif

        </div>
        <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                <div class="mb-5 mt-2 relative overflow-hidden ring-opacity-5">
                    @if(!App\Models\Property::find(Session::get('property_uuid'))->units()->count())
                    <nav aria-label="Progress">
                        <ol role="list"
                            class="divide-y divide-gray-300 rounded-md border border-gray-300 md:flex md:divide-y-0">
                            <li class="relative md:flex md:flex-1">
                                <!-- Completed Step -->
                                <a href="#" class="group flex w-full items-center">
                                    <span class="flex items-center px-6 py-4 text-sm font-medium">
                                        <span
                                            class="flex h-10 w-10 flex-shrink-0 items-center justify-center rounded-full bg-purple-600 group-hover:bg-purple-800">
                                            <!-- Heroicon name: solid/check -->
                                            <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                                <path fill-rule="evenodd"
                                                    d="M19.916 4.626a.75.75 0 01.208 1.04l-9 13.5a.75.75 0 01-1.154.114l-6-6a.75.75 0 011.06-1.06l5.353 5.353 8.493-12.739a.75.75 0 011.04-.208z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </span>
                                        <span class="ml-4 text-sm font-medium text-gray-900">Create a property</span>
                                    </span>
                                </a>

                                <!-- Arrow separator for lg screens and up -->
                                <div class="absolute top-0 right-0 hidden h-full w-5 md:block" aria-hidden="true">
                                    <svg class="h-full w-full text-gray-300" viewBox="0 0 22 80" fill="none"
                                        preserveAspectRatio="none">
                                        <path d="M0 -2L20 40L0 82" vector-effect="non-scaling-stroke"
                                            stroke="currentcolor" stroke-linejoin="round" />
                                    </svg>
                                </div>
                            </li>

                            <li class="relative md:flex md:flex-1">
                                <!-- Current Step -->
                                <a href="#" class="flex items-center px-6 py-4 text-sm font-medium" aria-current="step">
                                    <span
                                        class="flex h-10 w-10 flex-shrink-0 items-center justify-center rounded-full border-2 border-purple-600">
                                        <span class="text-purple-600">02</span>
                                    </span>
                                    <span class="ml-4 text-sm font-medium text-purple-600">Add units</span>
                                </a>

                                <!-- Arrow separator for lg screens and up -->
                                <div class="absolute top-0 right-0 hidden h-full w-5 md:block" aria-hidden="true">
                                    <svg class="h-full w-full text-gray-300" viewBox="0 0 22 80" fill="none"
                                        preserveAspectRatio="none">
                                        <path d="M0 -2L20 40L0 82" vector-effect="non-scaling-stroke"
                                            stroke="currentcolor" stroke-linejoin="round" />
                                    </svg>
                                </div>
                            </li>


                            <li class="relative md:flex md:flex-1">
                                <!-- Current Step -->
                                <a href="#" class="group flex items-center">
                                    <span class="flex items-center px-6 py-4 text-sm font-medium">
                                        <span
                                            class="flex h-10 w-10 flex-shrink-0 items-center justify-center rounded-full border-2 border-gray-300 group-hover:border-gray-400">
                                            <span class="text-gray-500 group-hover:text-gray-900">03</span>
                                        </span>
                                        <span
                                            class="ml-4 text-sm font-medium text-gray-500 group-hover:text-gray-900">Add
                                            tenants</span>
                                    </span>
                                </a>

                                <!-- Arrow separator for lg screens and up -->
                                <div class="absolute top-0 right-0 hidden h-full w-5 md:block" aria-hidden="true">
                                    <svg class="h-full w-full text-gray-300" viewBox="0 0 22 80" fill="none"
                                        preserveAspectRatio="none">
                                        <path d="M0 -2L20 40L0 82" vector-effect="non-scaling-stroke"
                                            stroke="currentcolor" stroke-linejoin="round" />
                                    </svg>
                                </div>
                            </li>


                            <li class="relative md:flex md:flex-1">
                                <!-- Upcoming Step -->
                                <a href="#" class="group flex items-center">
                                    <span class="flex items-center px-6 py-4 text-sm font-medium">
                                        <span
                                            class="flex h-10 w-10 flex-shrink-0 items-center justify-center rounded-full border-2 border-gray-300 group-hover:border-gray-400">
                                            <span class="text-gray-500 group-hover:text-gray-900">04</span>
                                        </span>
                                        <span
                                            class="ml-4 text-sm font-medium text-gray-500 group-hover:text-gray-900">Add
                                            personnels</span>
                                    </span>
                                </a>
                            </li>

                        </ol>
                    </nav>
                    <!-- This example requires Tailwind CSS v2.0+ -->
                    <div class="mt-10 text-center mb-10">
                        <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" aria-hidden="true">
                            <path vector-effect="non-scaling-stroke" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2"
                                d="M9 13h6m-3-3v6m-9 1V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z" />
                        </svg>
                        <h3 class="mt-2 text-sm font-medium text-gray-900">No units</h3>
                        <p class="mt-1 text-sm text-gray-500">1 down, 3 more to go...</p>
                        <div class="mt-6">
                            <x-button data-modal-toggle="instructions-create-unit-modal">
                                New unit
                            </x-button>
                        </div>
                    </div>
                    @else
                    @if($view === 'thumbnail')
                    <div class="max-w-2xl mx-auto py-8 px-4 sm:px-6 lg:max-w-7xl lg:px-8 mb-24">
                        <div class="mt-6 grid grid-cols-1 gap-x-8 gap-y-8 sm:grid-cols-2 sm:gap-y-10 lg:grid-cols-6">
                            @foreach ($units as $unit)
                            <?php $statusIcon = App\Models\Status::find($unit->status_id)->icon;  ?>
                            @if(Session::get('tenant_uuid'))
                            <a href="/property/{{ Session::get('property_uuid') }}/unit/{{ $unit->uuid }}/tenant/{{ Session::get('tenant_uuid') }}/contract/{{ Str::random(8) }}/create">
                                <div class="hover:bg-purple-200">
                                  <img src="{{ asset('/brands/'.$statusIcon) }}"
                                        class="object-center object-cover aspect-w-4 aspect-h-3 rounded-lg overflow-hidden">
                                    <h3 class="text-center mt-2">{{ $unit->unit }}</h3>
                                </div>
                            </a>

                            @elseif(Session::get('owner_uuid'))
                            <a href="/property/{{ Session::get('property_uuid') }}/unit/{{ $unit->uuid }}/owner/{{ Session::get('owner_uuid') }}/deed_of_sale/create">
                                <div class="hover:bg-purple-200">
                                   <img src="{{ asset('/brands/'.$statusIcon) }}"
                                        class="object-center object-cover aspect-w-4 aspect-h-3 rounded-lg overflow-hidden">
                                    <h3 class="text-center mt-2">{{ $unit->unit }}</h3>
                                </div>
                            </a>
                            @else
                            <a href="/property/{{ Session::get('property_uuid') }}/unit/{{ $unit->uuid }}">
                                <div class="hover:bg-purple-200">
                                   <img src="{{ asset('/brands/'.$statusIcon) }}"
                                        class="object-center object-cover aspect-w-4 aspect-h-3 rounded-lg overflow-hidden">
                                    <h3 class="text-center mt-2">{{ $unit->unit }}</h3>
                                </div>
                            </a>
                            @endif
                            @endforeach
                        </div>
                    </div>
                    @else
                        @include('tables.units')
                    @endif
                    @endif
                </div>
            </div>
        </div>
        @include('modals.instructions.create-unit-modal')
    </div>
