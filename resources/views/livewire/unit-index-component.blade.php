<div>
    <div class="sm:flex sm:items-center">
        <div class="sm:flex-auto">
            <h1 class="text-3xl font-bold text-gray-700">Units</h1>
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

            <button type="button" data-modal-toggle="create-unit-modal" {{--
                onclick="window.location.href='/property/{{ Session::get('property') }}/unit/{{ Str::random(8) }}/edit'"
                --}}
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
        <div class="sm:col-span-4">

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

        <div class="sm:col-span-2">
            <select id="small" wire:model="status_id" 
            class="text-center bg-white block p-1 w-full text-sm h-8 text-gray-90 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                <option value="">Filter unit status</option>
                @foreach ($statuses as $item)
                <option value="{{ $item->status_id }}">{{ $item->status }}</option>
                @endforeach
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
                        <a href="/property/{{ $unit->property_uuid }}/unit/{{ $unit->uuid }}">
                            <div class="hover:bg-purple-200">
                                <img src="{{ asset('/brands/close_occupied.png') }}"
                                    class="object-center object-cover aspect-w-4 aspect-h-3 rounded-lg overflow-hidden">
                                <h3 class="text-center mt-2">{{ $unit->unit }}</h3>
                            </div>
                        </a>
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
                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                BUILDING
                            </th>
                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">FLOOR
                            </th>
                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                STATUS</th>
                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">TENANT
                            </th>
                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                CONTRACT</th>
                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">RENT
                            </th>

                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                OCCUPANCY</th>
                            {{-- <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">ROOMS
                            </th> --}}

                        </tr>
                    </thead>


                    <tbody class=" divide-gray-50 border divide-y gap-y-6 bg-white">
                        <!-- Selected: "bg-gray-50" -->
                        @foreach($units as $index => $unit )
                        <tr>
                            <td class="relative w-12 px-6 sm:w-16 sm:px-8">
                                <!-- Selected row marker, only show when row is selected. -->

                                <input type="checkbox"
                                    class="absolute left-4 top-1/2 -mt-2 h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500 sm:left-6">
                            </td>
                            <!-- Selected: "text-indigo-600", Not Selected: "text-gray-900" -->
                            <td class="whitespace-nowrap py-4 pr-3 text-sm font-medium text-gray-900">{{ $index + 1
                                }}
                            </td>
                            <td
                                class="whitespace-nowrap px-3 py-4 text-sm text-blue-500 text-decoration-line: underline">
                                <a href="/property/{{ $unit->property_uuid }}/unit/{{ $unit->uuid }}">{{ $unit->unit
                                    }}</a>
                            </td>
                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                {{$unit->building->building }}</td>
                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $unit->floor->floor }}
                            </td>
                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $unit->status->status}}
                            </td>
                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                @if($unit->contracts->count())
                                @foreach ($unit->contracts->where('status','!=','inactive')->take(1) as $tenant)
                                <a class="text-blue-500 text-decoration-line: underline"
                                    href="/property/{{ $unit->property_uuid }}/tenant/{{ $tenant->tenant->uuid }}">{{
                                    $tenant->tenant->tenant }}</a>,
                                @endforeach
                                @else
                                NA
                                @endif
                            </td>
                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                @if($unit->contracts->count())
                                @foreach ($unit->contracts->where('status','!=','inactive')->take(1) as $contract)
                                {{ Carbon\Carbon::parse($contract->start)->format('M d, Y').' - '.
                                Carbon\Carbon::parse($contract->end)->format('M d, Y')}},
                                @endforeach
                                @else
                                NA
                                @endif
                            </td>
                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $unit->rent }}</td>

                            <td class="whitespace-nowrap px-3 py-4 text-sm text-center text-gray-500">
                                {{$unit->occupancy }} pax
                            </td>
                            <td class="whitespace-nowrap px-3 py-4 text-sm text-center text-gray-500">
                            </td>
                        </tr>
                        @endforeach
                        <!-- More people... -->
                    </tbody>

                </table>

            </div>

            @endif
            {{-- <button type="button"
                class="mb-5 inline-flex items-center rounded border border-gray-300 bg-white px-2.5 py-1.5 text-xs font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-30">Select
                All</button> --}}
        </div>
    </div>

    {{-- <div class="px-4 mt-5 py-3 flex items-center justify-between border-t border-gray-200 sm:px-6">
        {{ $units->links() }}
    </div> --}}
    @include('modals.create-unit-modal')
</div>