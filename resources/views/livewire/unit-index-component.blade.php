<div>
    @if(!App\Models\Property::find(Session::get('property'))->units()->count())
    <!-- This example requires Tailwind CSS v2.0+ -->
    <nav aria-label="Progress">
        <ol role="list" class="divide-y divide-gray-300 rounded-md border border-gray-300 md:flex md:divide-y-0">
            <li class="relative md:flex md:flex-1">
                <!-- Completed Step -->
                <a href="#" class="group flex w-full items-center">
                    <span class="flex items-center px-6 py-4 text-sm font-medium">
                        <span
                            class="flex h-10 w-10 flex-shrink-0 items-center justify-center rounded-full bg-indigo-600 group-hover:bg-indigo-800">
                            <!-- Heroicon name: solid/check -->
                            <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                fill="currentColor" aria-hidden="true">
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
                    <svg class="h-full w-full text-gray-300" viewBox="0 0 22 80" fill="none" preserveAspectRatio="none">
                        <path d="M0 -2L20 40L0 82" vector-effect="non-scaling-stroke" stroke="currentcolor"
                            stroke-linejoin="round" />
                    </svg>
                </div>
            </li>

            <li class="relative md:flex md:flex-1">
                <!-- Current Step -->
                <a href="#" class="flex items-center px-6 py-4 text-sm font-medium" aria-current="step">
                    <span
                        class="flex h-10 w-10 flex-shrink-0 items-center justify-center rounded-full border-2 border-indigo-600">
                        <span class="text-indigo-600">02</span>
                    </span>
                    <span class="ml-4 text-sm font-medium text-indigo-600">Add units to your property</span>
                </a>

                <!-- Arrow separator for lg screens and up -->
                <div class="absolute top-0 right-0 hidden h-full w-5 md:block" aria-hidden="true">
                    <svg class="h-full w-full text-gray-300" viewBox="0 0 22 80" fill="none" preserveAspectRatio="none">
                        <path d="M0 -2L20 40L0 82" vector-effect="non-scaling-stroke" stroke="currentcolor"
                            stroke-linejoin="round" />
                    </svg>
                </div>
            </li>



            <li class="relative md:flex md:flex-1">
                <!-- Upcoming Step -->
                <a href="#" class="group flex items-center">
                    <span class="flex items-center px-6 py-4 text-sm font-medium">
                        <span
                            class="flex h-10 w-10 flex-shrink-0 items-center justify-center rounded-full border-2 border-gray-300 group-hover:border-gray-400">
                            <span class="text-gray-500 group-hover:text-gray-900">03</span>
                        </span>
                        <span class="ml-4 text-sm font-medium text-gray-500 group-hover:text-gray-900">Add tenants to
                            your property</span>
                    </span>
                </a>
            </li>

        </ol>
    </nav>
    <!-- This example requires Tailwind CSS v2.0+ -->
    <div class="mt-10 text-center">
        <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"
            aria-hidden="true">
            <path vector-effect="non-scaling-stroke" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M9 13h6m-3-3v6m-9 1V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z" />
        </svg>
        <h3 class="mt-2 text-sm font-medium text-gray-900">No units</h3>
        <p class="mt-1 text-sm text-gray-500">1 down, 2 more to go...</p>
        <div class="mt-6">
            <button type="button" data-modal-toggle="create-unit-modal"
                class="inline-flex items-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                <!-- Heroicon name: mini/plus -->
                <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                    fill="currentColor" aria-hidden="true">
                    <path
                        d="M10.75 4.75a.75.75 0 00-1.5 0v4.5h-4.5a.75.75 0 000 1.5h4.5v4.5a.75.75 0 001.5 0v-4.5h4.5a.75.75 0 000-1.5h-4.5v-4.5z" />
                </svg>
                Add your first unit
            </button>
        </div>
    </div>
    @else
    <div class="sm:flex sm:items-center">
        <div class="sm:flex-auto">
            <h1 class="text-3xl font-bold text-gray-700">
            @if(Session::get('tenant_uuid') || Session::get('owner_uuid'))    
            Select a unit for the tenant
             @else
             Units
             @endif
            </h1>
        </div>
        <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
            @if($view === 'list')
            <button type="button" wire:click="changeView('thumbnail')"
                class="inline-flex items-center justify-center rounded-md border border-transparent bg-purple-900 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto">

                View as Thumbnail

            </button>
            @else
            <button type="button" wire:click="changeView('list')"
                class="inline-flex items-center justify-center rounded-md border border-transparent bg-purple-900 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto">

                View as List

            </button>
            @endif

            <button type="button" data-modal-toggle="create-unit-modal"
                class="inline-flex items-center justify-center rounded-md border border-transparent bg-gray-500 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto">Add
                Units</button>
            @if($units->count())
            <button type="button"
                onclick="window.location.href='/property/{{ Session::get('property') }}/unit/{{ Str::random(8) }}/edit'"
                class="inline-flex items-center justify-center rounded-md border border-transparent bg-gray-500 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto">Edit
                Units</button>
            @endif
        </div>
    </div>


    <div class="mt-6 grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
        <div class="sm:col-span-3">

            <label for="default-search"
                class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-gray-300">Search</label>
            <div class="relative w-full mb-5">
                <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                    <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </div>
                <input type="search" id="default-search" wire:model="search"
                    class="bg-white block p-4 pl-10 w-full text-sm h-5 text-gray-90 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Search..." required>

            </div>
            <div>
                <p class="text-sm text-center text-gray-500">
                    Showing
                    <span class="font-medium">{{ $units->count() }}</span>

                    {{Str::plural('results', $units->count())}}
                </p>
            </div>
        </div>

        <div class="sm:col-span-1">
            <select id="small" wire:model="status_id"
                class="text-left bg-white block p-1 w-full text-sm h-8 text-gray-90 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                <option value="">Filter unit status</option>
                @foreach ($statuses as $item)
                <option value="{{ $item->status_id }}">{{ $item->status }}</option>
                @endforeach
            </select>

        </div>

         <div class="sm:col-span-1">
            <select id="small" wire:model="sortBy"
                class="text-left bg-white block p-1 w-full text-sm h-8 text-gray-90 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                <option value="" selected>Sort unit by</option>
             
               <option value="floor_id">floor</option>
               <option value="occupancy">occupancy</option>
               <option value="rent">rent</option>
               <option value="unit">unit</option>
            </select>

        </div>

          <div class="sm:col-span-1">
            <select id="small" wire:model="orderBy"
                class="text-left bg-white block p-1 w-full text-sm h-8 text-gray-90 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                <option value="asc" selected>Sorting order</option>
               <option value="asc">asc</option>
               <option value="desc">desc</option>
             
            </select>

        </div>

    </div>
    <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
            @if($view === 'thumbnail')
            <div class="mb-5 mt-2 relative overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                <!-- Selected row actions, only show when rows are selected. -->
                <div class="absolute top-0 left-12 flex h-12 items-center space-x-3 bg-gray-50 sm:left-16">

                </div>
                <div class="max-w-2xl mx-auto py-8 px-4  sm:px-6 lg:max-w-7xl lg:px-8">
                    <div class="flex items-center justify-between space-x-4">
                        <h2 class="text-lg font-medium text-gray-900"></h2>

                    </div>

                    <div class="mt-6 grid grid-cols-1 gap-x-8 gap-y-8 sm:grid-cols-2 sm:gap-y-10 lg:grid-cols-6">
                        @foreach ($units as $unit)
                        @if(Session::get('tenant_uuid'))
                        <a
                            href="/property/{{ Session::get('property') }}/unit/{{ $unit->uuid }}/tenant/{{ Session::get('tenant_uuid') }}/contract/{{ Str::random(8) }}/create">
                            <div class="hover:bg-purple-200">
                                @if($unit->status_id == '1')
                                <img src="{{ asset('/brands/vacant.png') }}"
                                    class="object-center object-cover aspect-w-4 aspect-h-3 rounded-lg overflow-hidden">
                                @elseif($unit->status_id == '2')
                                <img src="{{ asset('/brands/occupied.png') }}"
                                    class="object-center object-cover aspect-w-4 aspect-h-3 rounded-lg overflow-hidden">
                                @elseif($unit->status_id == '3')
                                <img src="{{ asset('/brands/maintenance.png') }}"
                                    class="object-center object-cover aspect-w-4 aspect-h-3 rounded-lg overflow-hidden">

                                @elseif($unit->status_id == '4' || ($unit->status_id == '6'))
                                <img src="{{ asset('/brands/reserved.png') }}"
                                    class="object-center object-cover aspect-w-4 aspect-h-3 rounded-lg overflow-hidden">
                                @else
                                <img src="{{ asset('/brands/maintenance.png') }}"
                                    class="object-center object-cover aspect-w-4 aspect-h-3 rounded-lg overflow-hidden">
                                @endif
                                <h3 class="text-center mt-2">{{ $unit->unit }}</h3>
                            </div>
                        </a>
                        @elseif(Session::get('owner_uuid'))
                        <a
                            href="/property/{{ Session::get('property') }}/unit/{{ $unit->uuid }}/owner/{{ Session::get('owner_uuid') }}/deed_of_sale/{{ Str::random(8) }}/create">
                            <div class="hover:bg-purple-200">
                                @if($unit->status_id == '1')
                                <img src="{{ asset('/brands/vacant.png') }}"
                                    class="object-center object-cover aspect-w-4 aspect-h-3 rounded-lg overflow-hidden">
                                @elseif($unit->status_id == '2')
                                <img src="{{ asset('/brands/occupied.png') }}"
                                    class="object-center object-cover aspect-w-4 aspect-h-3 rounded-lg overflow-hidden">
                                @elseif($unit->status_id == '3')
                                <img src="{{ asset('/brands/maintenance.png') }}"
                                    class="object-center object-cover aspect-w-4 aspect-h-3 rounded-lg overflow-hidden">

                                @elseif($unit->status_id == '4' || ($unit->status_id == '6'))
                                <img src="{{ asset('/brands/reserved.png') }}"
                                    class="object-center object-cover aspect-w-4 aspect-h-3 rounded-lg overflow-hidden">
                                @else
                                <img src="{{ asset('/brands/maintenance.png') }}"
                                    class="object-center object-cover aspect-w-4 aspect-h-3 rounded-lg overflow-hidden">
                                @endif
                                <h3 class="text-center mt-2">{{ $unit->unit }}</h3>
                            </div>
                        </a>
                        @else
                        <a href="/property/{{ Session::get('property') }}/unit/{{ $unit->uuid }}">
                            <div class="hover:bg-purple-200">
                                @if($unit->status_id == '1')
                                <img src="{{ asset('/brands/vacant.png') }}"
                                    class="object-center object-cover aspect-w-4 aspect-h-3 rounded-lg overflow-hidden">
                                @elseif($unit->status_id == '2')
                                <img src="{{ asset('/brands/occupied.png') }}"
                                    class="object-center object-cover aspect-w-4 aspect-h-3 rounded-lg overflow-hidden">
                                @elseif($unit->status_id == '3')
                                <img src="{{ asset('/brands/maintenance.png') }}"
                                    class="object-center object-cover aspect-w-4 aspect-h-3 rounded-lg overflow-hidden">

                                @elseif($unit->status_id == '4' || ($unit->status_id == '6'))
                                <img src="{{ asset('/brands/reserved.png') }}"
                                    class="object-center object-cover aspect-w-4 aspect-h-3 rounded-lg overflow-hidden">
                                @else
                                <img src="{{ asset('/brands/maintenance.png') }}"
                                    class="object-center object-cover aspect-w-4 aspect-h-3 rounded-lg overflow-hidden">
                                @endif
                                <h3 class="text-center mt-2">{{ $unit->unit }}</h3>
                            </div>
                        </a>
                        @endif



                        @endforeach

                    </div>

                </div>

            </div>

            @else
            <div class="mb-5 mt-2 relative overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                <!-- Selected row actions, only show when rows are selected. -->
                <div class="absolute top-0 left-12 flex h-12 items-center space-x-3 bg-gray-50 sm:left-16">

                </div>
                <table class="min-w-full table-fixed">
                    <thead class="">
                        <tr>
                            <th scope="col" class="relative w-12 px-6 sm:w-16 sm:px-8">

                            </th>
                            <th scope="col"
                                class="min-w-[12rem] py-3.5 pr-3 text-left text-sm font-semibold text-gray-900">
                                #
                            </th>
                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">UNIT
                            </th>
                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">TENANT
                            </th>
                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                CONTRACT</th>
                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                BUILDING
                            </th>
                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">FLOOR
                            </th>
                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                STATUS</th>


                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">RENT
                            </th>

                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                OCCUPANCY</th>


                        </tr>
                    </thead>


                    <tbody class=" divide-gray-50 border divide-y gap-y-6 bg-white">
                        <!-- Selected: "bg-gray-50" -->
                        @foreach($units as $index => $unit )
                        <tr>
                            <td class="relative w-12 px-6 sm:w-16 sm:px-8">
                                <!-- Selected row marker, only show when row is selected. -->
                                {{--
                                <input type="checkbox"
                                    class="absolute left-4 top-1/2 -mt-2 h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500 sm:left-6">
                                --}}
                            </td>
                            <!-- Selected: "text-indigo-600", Not Selected: "text-gray-900" -->
                            <td class="whitespace-nowrap py-4 pr-3 text-sm font-medium text-gray-900">{{ $index + 1
                                }}
                            </td>
                            <td
                                class="whitespace-nowrap px-3 py-4 text-sm text-blue-500 text-decoration-line: underline">
                                @if(Session::get('tenant_uuid'))
                                <a
                                    href="/property/{{ Session::get('property') }}/unit/{{ $unit->uuid }}/tenant/{{ Session::get('tenant_uuid') }}/contract/{{ Str::random(8) }}/create">{{
                                    $unit->unit }}</a>
                                @elseif(Session::get('owner_uuid'))
                                <a
                                    href="/property/{{ Session::get('property') }}/unit/{{ $unit->uuid }}/owner/{{ Session::get('owner_uuid') }}/deed_of_sale/{{ Str::random(8) }}/create">{{
                                    $unit->unit }}</a>
                                @else
                                <a href="/property/{{ $unit->property_uuid }}/unit/{{ $unit->uuid }}">{{ $unit->unit
                                    }}</a>
                                @endif
                            </td>
                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                @if($unit->contracts->count())
                                @foreach ($unit->contracts->where('status','!=','inactive')->take(1) as $tenant)
                                <a class="text-blue-500 text-decoration-line: underline"
                                    href="/property/{{ $unit->property_uuid }}/tenant/{{ $tenant->tenant->uuid }}">{{
                                    $tenant->tenant->tenant }}</a>
                                @endforeach
                                @else
                                NA
                                @endif
                            </td>
                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                @if($unit->contracts->count())
                                @foreach ($unit->contracts->where('status','!=','inactive')->take(1) as $contract)
                                {{ Carbon\Carbon::parse($contract->start)->format('M d, Y').' - '.
                                Carbon\Carbon::parse($contract->end)->format('M d, Y')}}
                                @endforeach
                                @else
                                NA
                                @endif
                            </td>
                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                {{$unit->building->building }}</td>
                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $unit->floor->floor }}
                            </td>
                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $unit->status->status}}
                            </td>


                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ number_format($unit->rent,
                                2) }}</td>

                            <td class="whitespace-nowrap px-3 py-4 text-sm text-center text-gray-500">
                                {{$unit->occupancy }} pax
                            </td>

                        </tr>
                        @endforeach

                    </tbody>

                </table>

            </div>

            @endif
            {{-- {{ $units->links() }} --}}
        </div>

    </div>
    @endif
    @include('modals.create-unit-modal')
</div>