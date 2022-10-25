<div class="mt-8 max-w-2xl mx-auto sm:px-6 lg:max-w-7xl lg:px-8">
    <div class="lg:grid lg:grid-cols-12 lg:auto-rows-min lg:gap-x-8">
        <div class="lg:col-start-5 lg:col-span-9">

            <div class="flex justify-between">
                <h1 class="text-3xl font-bold text-gray-900">{{ $unit_details->unit }}</h1>
                <button
                    class="inline-flex items-center justify-center rounded-md border border-transparent bg-indigo-500 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto"
                    id="dropdownButton" data-dropdown-toggle="unitCreateDropdown" type="button">Add
                    <svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                        </path>
                    </svg></button>

                <div id="unitCreateDropdown"
                    class="text-left hidden z-10 w-30 text-base list-none bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700">
                    <ul class="py-1" aria-labelledby="dropdownButton">
                        @if($unit_details->is_the_unit_for_rent_to_tenant)
                        <li>
                            @if($unit_details->occupancy > $unit_details->contracts()->where('status',
                            'active')->count())
                            <a href="/property/{{ Session::get('property') }}/unit/{{ $unit_details->uuid }}/tenant/{{ Str::random(8) }}/create"
                                class=" block py-2 px-4 text-sm
                                                text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600
                                                dark:text-gray-200 dark:hover:text-white">
                                New tenant
                            </a>
                            @else
                            <a href="#/" data-modal-toggle="popup-error-modal" class=" block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600
                                                dark:text-gray-200 dark:hover:text-white">
                                New tenant
                            </a>
                            @endif
                        </li>
                        @endif

                        <li>
                            <a href="/property/{{ Session::get('property') }}/unit/{{ $unit_details->uuid }}/owner/{{ Str::random(8) }}/create"
                                class=" block py-2 px-4 text-sm
                                                text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600
                                                dark:text-gray-200 dark:hover:text-white">
                                New owner
                            </a>
                        </li>
                        {{-- <li>
                            <a href="#/"
                                class=" block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white"
                                data-modal-toggle="add-building-modal">
                                New building
                            </a>
                        </li> --}}
                    </ul>
                </div>
                {{-- <a
                    href="/property/{{ Session::get('property') }}/unit/{{ $unit_details->uuid }}/tenant/{{ Str::random(8) }}/create"
                    class="flex text-right text-sm font-medium text-purple-500 hover:text-purple-700">Add
                    a
                    new tenant</a>
                <a href="/property/{{ Session::get('property') }}/unit/{{ $unit_details->uuid }}/owner/{{ Str::random(8) }}/create"
                    class="flex text-right text-sm font-medium text-purple-500 hover:text-purple-700">Add
                    a
                    new owner</a> --}}
            </div>

        </div>

        <!-- Image gallery -->
        <div class="mt-8 lg:mt-0 lg:col-start-1 lg:col-span-4 lg:row-start-1 lg:row-span-3">
            <h2 class="sr-only">Images</h2>

            <div class="grid grid-cols-1 lg:gap-6">
                <img src="{{ asset('/brands/door_detail.png') }}" alt="door"
                    class="lg:col-span-2 md:row-span-2 rounded-md">

                <div class="flex items-center justify-center ml-5">
                    {{-- <a href="#"
                        class="relative inline-flex items-center px-4 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">Upload

                    </a> --}}
                </div>


            </div>
        </div>

        <div class="mt-8 lg:col-span-8">
            <div class="mb-4 border-b border-gray-200 dark:border-gray-700">
                <ul class="flex flex-wrap -mb-px text-sm font-medium text-center grid grid-cols-5 gap-2 sm:grid-cols-5"
                    id="myTab" data-tabs-toggle="#myTabContent" role="tablist">
                    <li class="mr-2" role="presentation">
                        <button
                            class="inline-block p-4 rounded-t-lg border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300 dark:border-transparent text-gray-500 dark:text-gray-400 border-gray-100 dark:border-gray-700"
                            id="details-tab" data-tabs-target="#details" type="button" role="tab"
                            aria-controls="details" aria-selected="true">Details</button>
                    </li>

                    <li class="mr-2" role="presentation">
                        <button
                            class="inline-block p-4 rounded-t-lg border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300 dark:border-transparent text-gray-500 dark:text-gray-400 border-gray-100 dark:border-gray-700"
                            id="financials-tab" data-tabs-target="#financials" type="button" role="tab"
                            aria-controls="financials" aria-selected="false">Financials</button>
                    </li>

                    <li class="mr-2" role="presentation">
                        <button
                            class="inline-block p-4 rounded-t-lg border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300 dark:border-transparent text-gray-500 dark:text-gray-400 border-gray-100 dark:border-gray-700"
                            id="owners-tab" data-tabs-target="#owners" type="button" role="tab" aria-controls="owners"
                            aria-selected="false">Owners</button>
                    </li>
                    <li role="presentation">
                        <button
                            class="inline-block p-4 rounded-t-lg border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300 dark:border-transparent text-gray-500 dark:text-gray-400 border-gray-100 dark:border-gray-700"
                            id="tenants-tab" data-tabs-target="#tenants" type="button" role="tab"
                            aria-controls="tenants" aria-selected="false">Tenants</button>
                    </li>
                    {{-- <li role="presentation">
                        <button
                            class="inline-block p-4 rounded-t-lg border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300 dark:border-transparent text-gray-500 dark:text-gray-400 border-gray-100 dark:border-gray-700"
                            id="rooms-tab" data-tabs-target="#rooms" type="button" role="tab" aria-controls="rooms"
                            aria-selected="false">Rooms</button>
                    </li>
                    <li role="presentation">
                        <button
                            class="inline-block p-4 rounded-t-lg border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300 dark:border-transparent text-gray-500 dark:text-gray-400 border-gray-100 dark:border-gray-700"
                            id="furnitures-tab" data-tabs-target="#furnitures" type="button" role="tab"
                            aria-controls="furnitures" aria-selected="false">Furnitures</button>
                    </li> --}}
                </ul>
            </div>
            <div id="myTabContent">
                <div class="rounded-lg dark:bg-gray-800" id="details" role="tabpanel" aria-labelledby="details-tab">
                    <div>
                        <form method="POST" wire:submit.prevent="submitForm()" class="w-full"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')

                            <div class="grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6 mt-9">

                                <div class="sm:col-span-6">
                                    <div
                                        class="relative bg-white border border-gray-300 rounded-md rounded-b-none px-3 py-2 focus-within:z-10 focus-within:ring-1 focus-within:ring-indigo-600 focus-within:border-indigo-600">
                                        <label for="name" class="block text-xs font-medium text-gray-900">Unit
                                            No.</label>
                                        <input type="text" wire:model="unit"
                                            value="{{ old('unit', $unit_details->unit) }}"
                                            class="block w-full border-0 p-0 text-gray-900 placeholder-gray-500 focus:ring-0 sm:text-sm"
                                            placeholder="">
                                    </div>
                                </div>

                                {{-- <div class="sm:col-span-2">
                                    <div
                                        class="relative border bg-white border-gray-300 rounded-md rounded-t-none px-3 py-2 focus-within:z-10 focus-within:ring-1 focus-within:ring-indigo-600 focus-within:border-indigo-600">
                                        <label for="building_id"
                                            class="block text-xs font-medium text-gray-900">Building</label>
                                        <select wire:model="building_id"
                                            class="block w-full border-0 p-0 text-gray-900 placeholder-gray-500 focus:ring-0 sm:text-sm">
                                            @foreach($buildings as $building)
                                            <option value="{{ $building->id }}" {{ old('building_id', $unit_details->
                                                building_id) == $building->id ? 'selected' : 'selected' }}>
                                                {{ $building->building }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div> --}}

                                <div class="sm:col-span-2">
                                    <div
                                        class="relative border bg-white border-gray-300 rounded-md rounded-t-none px-3 py-2 focus-within:z-10 focus-within:ring-1 focus-within:ring-indigo-600 focus-within:border-indigo-600">
                                        <label for="floor_id"
                                            class="block text-xs font-medium text-gray-900">Floor</label>
                                        <select wire:model="floor_id"
                                            class="block w-full border-0 p-0 text-gray-900 placeholder-gray-500 focus:ring-0 sm:text-sm">
                                            @foreach($floors as $floor)
                                            <option value="{{ $floor->id }}" {{ old('floor_id', $unit_details->
                                                floor_id) == $floor->id ? 'selected' : 'selected' }}>
                                                {{ $floor->floor }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="sm:col-span-2">
                                    <div
                                        class="relative border bg-white border-gray-300 rounded-md rounded-t-none px-3 py-2 focus-within:z-10 focus-within:ring-1 focus-within:ring-indigo-600 focus-within:border-indigo-600">
                                        <label for="category_id"
                                            class="block text-xs font-medium text-gray-900">Category</label>
                                        <select wire:model="category_id"
                                            class="block w-full border-0 p-0 text-gray-900 placeholder-gray-500 focus:ring-0 sm:text-sm">
                                            @foreach($categories as $category)
                                            <option value="{{ $category->id }}" {{ old('category_id', $unit_details->
                                                category_id) == $category->id ? 'selected' : 'selected' }}>
                                                {{ $category->category }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="sm:col-span-2">
                                    <div
                                        class="relative border bg-white border-gray-300 rounded-md rounded-t-none px-3 py-2 focus-within:z-10 focus-within:ring-1 focus-within:ring-indigo-600 focus-within:border-indigo-600">
                                        <label for="job-title" class="block text-xs font-medium text-gray-900">Area
                                            (sqm)</label>
                                        <input type="text" wire:model="size"
                                            value="{{old('size', $unit_details->size)}}"
                                            class="block w-full border-0 p-0 text-gray-900 placeholder-gray-500 focus:ring-0 sm:text-sm"
                                            placeholder="">
                                    </div>
                                </div>

                                <div class="sm:col-span-2">
                                    <div
                                        class="relative border bg-white border-gray-300 rounded-md rounded-t-none px-3 py-2 focus-within:z-10 focus-within:ring-1 focus-within:ring-indigo-600 focus-within:border-indigo-600">
                                        <label for="job-title" class="block text-xs font-medium text-gray-900">Occupancy
                                            (No of allowable
                                            tenants)</label>
                                        <input type="text" wire:model="occupancy"
                                            value="{{old('occupancy', $unit_details->occupancy)}}"
                                            class="block w-full border-0 p-0 text-gray-900 placeholder-gray-500 focus:ring-0 sm:text-sm"
                                            placeholder="">
                                    </div>
                                </div>

                                <div class="sm:col-span-2">
                                    <div
                                        class="relative border bg-white border-gray-300 rounded-md rounded-t-none px-3 py-2 focus-within:z-10 focus-within:ring-1 focus-within:ring-indigo-600 focus-within:border-indigo-600">
                                        <label for="is_the_unit_for_rent_to_tenant"
                                            class="block text-xs font-medium text-gray-900">Is the
                                            unit for rent to
                                            tenant? </label>
                                        <select wire:model="is_the_unit_for_rent_to_tenant"
                                            class="block w-full border-0 p-0 text-gray-900 placeholder-gray-500 focus:ring-0 sm:text-sm">
                                            <option value="1" {{ old('is_the_unit_for_rent_to_tenant',
                                                $is_the_unit_for_rent_to_tenant)==1 ? 'selected' : 'selected' }}>
                                                yes
                                            </option>
                                            <option value="0" {{ old('is_the_unit_for_rent_to_tenant',
                                                $is_the_unit_for_rent_to_tenant)==0 ? 'selected' : 'selected' }}>
                                                no
                                            </option>
                                        </select>
                                    </div>
                                </div>

                                <div class="sm:col-span-2">
                                    <div
                                        class="relative border bg-white border-gray-300 rounded-md rounded-t-none px-3 py-2 focus-within:z-10 focus-within:ring-1 focus-within:ring-indigo-600 focus-within:border-indigo-600">
                                        <label for="job-title"
                                            class="block text-xs font-medium text-gray-900">Status</label>
                                        <select wire:model="status_id"
                                            class="block w-full border-0 p-0 text-gray-900 placeholder-gray-500 focus:ring-0 sm:text-sm">
                                            @foreach($statuses as $status)
                                            <option value="{{ $status->id }}" {{ old('status_id', $unit_details->
                                                status_id) == $status->id ? 'selected' : 'selected' }}>
                                                {{ $status->status }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="sm:col-span-2">
                                    <div
                                        class="relative border bg-white border-gray-300 rounded-md rounded-t-none px-3 py-2 focus-within:z-10 focus-within:ring-1 focus-within:ring-indigo-600 focus-within:border-indigo-600">
                                        <label for="rent"
                                            class="block text-xs font-medium text-gray-900">Rent/Month/Tenant</label>
                                        <input type="text" wire:model="rent"
                                            value="{{old('rent', $unit_details->rent)}}"
                                            class="block w-full border-0 p-0 text-gray-900 placeholder-gray-500 focus:ring-0 sm:text-sm"
                                            placeholder="">
                                    </div>
                                </div>

                                <div class="sm:col-span-2">
                                    <div
                                        class="relative border bg-white border-gray-300 rounded-md rounded-t-none px-3 py-2 focus-within:z-10 focus-within:ring-1 focus-within:ring-indigo-600 focus-within:border-indigo-600">
                                        <label for="discount"
                                            class="block text-xs font-medium text-gray-900">Discount</label>
                                        <input type="text" wire:model="discount"
                                            value="{{old('discount', $unit_details->discount)}}"
                                            class="block w-full border-0 p-0 text-gray-900 placeholder-gray-500 focus:ring-0 sm:text-sm"
                                            placeholder="">
                                    </div>
                                </div>
                            </div>
                            <div class="mt-10 flex justify-end">
                                <x-form-button wire:loading.remove wire:click="submitForm()">Update</x-form-button>
                            </div>
                        </form>
                        @include('layouts.notifications')
                        @include('modals.popup-error-modal')
                    </div>

                </div>

                <div class="hidden rounded-lg dark:bg-gray-800" id="owners" role="tabpanel"
                    aria-labelledby="owners-tab">
                    @if($deed_of_sales->count())
                    @include('tables.deed_of_sales')
                    @else
                    <div class="mt-10 text-center">
                        <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" aria-hidden="true">
                            <path vector-effect="non-scaling-stroke" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2"
                                d="M9 13h6m-3-3v6m-9 1V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z" />
                        </svg>
                        <h3 class="mt-2 text-sm font-medium text-gray-900">No owners</h3>
                        <p class="mt-1 text-sm text-gray-500">You're almost there!</p>
                        <div class="mt-6">
                            <button type="button"
                                onclick="window.location.href='/property/{{ Session::get('property') }}/unit/{{ $unit_details->uuid }}/owner/{{ Str::random(8) }}/create'"
                                class="inline-flex items-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                                <!-- Heroicon name: mini/plus -->
                                <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                    fill="currentColor" aria-hidden="true">
                                    <path
                                        d="M10.75 4.75a.75.75 0 00-1.5 0v4.5h-4.5a.75.75 0 000 1.5h4.5v4.5a.75.75 0 001.5 0v-4.5h4.5a.75.75 0 000-1.5h-4.5v-4.5z" />
                                </svg>
                                Add an owner
                            </button>
                        </div>
                    </div>
                    @endif


                    </table>
                </div>
                <div class="hidden rounded-lg dark:bg-gray-800" id="tenants" role="tabpanel"
                    aria-labelledby="tenants-tab">
                    @if($contracts->count())
                    @include('admin.tables.contracts')
                    @else
                    <div class="mt-10 text-center">
                        <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" aria-hidden="true">
                            <path vector-effect="non-scaling-stroke" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2"
                                d="M9 13h6m-3-3v6m-9 1V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z" />
                        </svg>
                        <h3 class="mt-2 text-sm font-medium text-gray-900">No tenants</h3>
                        <p class="mt-1 text-sm text-gray-500">You're almost there!</p>
                        <div class="mt-6">
                            <button type="button"
                                onclick="window.location.href='/property/{{ Session::get('property') }}/unit/{{ $unit_details->uuid }}/tenant/{{ Str::random(8) }}/create'"
                                class="inline-flex items-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                                <!-- Heroicon name: mini/plus -->
                                <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                    fill="currentColor" aria-hidden="true">
                                    <path
                                        d="M10.75 4.75a.75.75 0 00-1.5 0v4.5h-4.5a.75.75 0 000 1.5h4.5v4.5a.75.75 0 001.5 0v-4.5h4.5a.75.75 0 000-1.5h-4.5v-4.5z" />
                                </svg>
                                Add a tenant.
                            </button>
                        </div>
                    </div>
                    @endif
                </div>

                <div class="hidden rounded-lg dark:bg-gray-800" id="financials" role="tabpanel"
                    aria-labelledby="financials-tab">
                    <div class="text-sm">

                        <div
                            class="mb-5 bg-blue-50 h-full w-full shadow-md rounded-lg pointer-events-auto ring-1 ring-black ring-opacity-5 overflow-hidden">
                            <div class="p-4">
                                <div class="flex items-start">
                                    <div class="flex-shrink-0">
                                        <svg class="w-6 h-6" viewBox="-3 0 143 143" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <g clip-path="url(#a)" fill="#000">
                                                <path
                                                    d="M120.6 8.383c.449 11.6.645 22.706 1.355 33.779 1.51 23.515 4.141 46.96 4.506 70.547.086 5.496 0 11.003-.286 16.491a21.134 21.134 0 0 1-1.572 6.12c-1.176 3.151-3.306 4.02-6.332 2.532a47.556 47.556 0 0 1-5.698-3.567c-2.311-1.58-4.554-3.259-6.957-4.989-.574.302-1.129.64-1.662 1.01-3.971 3.121-7.956 6.222-11.873 9.41-4.115 3.347-7.81 3.386-12.344-.55-2.878-2.5-5.624-5.151-8.443-7.72-.401-.366-.876-.653-1.482-1.098-3.44 2.572-6.834 5.139-10.258 7.662-5.01 3.692-5.077 4.271-12.011.262-4.05-2.34-7.634-5.485-11.61-8.401-4.445 2.641-9.133 5.465-13.857 8.223-5.427 3.169-9.643.925-10.215-5.397-.04-.446-.03-.897-.037-1.346-.239-18.86-.476-37.718-.711-56.577-.188-15.828-.36-31.656-.513-47.483-.05-5.157-.007-10.316-.007-16.02-.788 0-1.844.021-2.9-.005a25.536 25.536 0 0 1-4.681-.25c-.794-.17-1.908-1.076-1.993-1.761a3.725 3.725 0 0 1 1.058-2.864 5.364 5.364 0 0 1 3.12-.968c11.1-.503 22.202-.96 33.305-1.369 16.938-.642 33.874-1.35 50.816-1.849 14.026-.411 28.059-.56 42.09-.824a8.22 8.22 0 0 1 .673.011c2.731.175 4.441 1.631 4.332 3.684-.105 1.97-1.684 3.244-4.319 3.288-3.68.066-7.364.019-11.494.019Zm-4.143 119.549c.077-1.497.163-2.167.138-2.833-.632-16.943-1.182-33.889-1.944-50.826-.812-18.054-2.467-36.08-1.313-54.186.239-3.768.035-7.563.035-11.803l-94.96 3.085c.538 39.283 2.277 78.382 2.797 117.838.924-.459 1.531-.713 2.083-1.053 2.197-1.355 4.266-2.964 6.584-4.064 5.167-2.457 8.694-2.954 12.886.944 3.372 3.135 7.685 5.259 11.486 7.77 1.561-1.201 2.744-2.054 3.864-2.985a366.84 366.84 0 0 0 5.894-5.028c3.208-2.781 6.534-3.177 10.22-1.136.976.555 1.919 1.169 2.822 1.838 3.072 2.219 6.124 4.465 9.274 6.769 3.91-2.852 7.721-5.621 11.52-8.407 4.335-3.178 7.171-3.281 11.71-.379 2.137 1.366 4.269 2.751 6.904 4.456Z" />
                                                <path
                                                    d="M44.381 79.789c-3.918 0-7.836.008-11.754-.006a12.8 12.8 0 0 1-2.673-.149c-1.662-.364-2.865-1.296-2.94-3.162a3.125 3.125 0 0 1 2.682-3.363 45.292 45.292 0 0 1 5.979-.816c7.244-.629 14.49-1.252 21.744-1.76a19.16 19.16 0 0 1 4.981.419 3.602 3.602 0 0 1 2.96 3.263 3.42 3.42 0 0 1-2.1 3.84 22.684 22.684 0 0 1-6.46 1.486c-4.13.229-8.28.066-12.42.066l.001.182ZM34.632 45.388c-1.01 0-2.024.045-3.032-.01-2.38-.13-3.873-1.273-4.188-3.15-.328-1.93.932-3.72 3.398-4.31a61.25 61.25 0 0 1 7.628-1.29c5.804-.63 11.617-1.217 17.44-1.62 1.778-.135 3.564.12 5.232.749 3.03 1.217 3.38 4.512.671 6.351a11.644 11.644 0 0 1-4.965 1.818c-3.56.434-7.166.479-10.753.69-3.811.225-7.622.455-11.433.687l.002.085ZM45.89 88.354c2.358 0 4.72-.092 7.069.037a9.699 9.699 0 0 1 3.872.836 4.263 4.263 0 0 1 2.35 3.811 4.268 4.268 0 0 1-2.35 3.812c-1.325.593-2.759.906-4.21.919-5.94.276-11.885.459-17.83.59a17.088 17.088 0 0 1-4.32-.44c-1.999-.48-3.262-2.078-3.15-3.82.115-1.844 1.036-3.282 2.891-3.7a64.42 64.42 0 0 1 7.279-1.232c2.787-.304 5.6-.375 8.401-.547l-.001-.266ZM36.844 28.567c-2.015 0-4.033.05-6.046-.022-.988-.035-2.17-.013-2.901-.53a5.638 5.638 0 0 1-2.049-2.783c-.411-1.39.355-2.661 1.686-3.323a9.114 9.114 0 0 1 2.853-.903c4.552-.572 9.11-1.115 13.68-1.527 1.304-.119 2.841-.123 3.927.459a6.373 6.373 0 0 1 2.7 3.077c.58 1.49-.385 3.014-1.75 3.629a20.582 20.582 0 0 1-5.725 1.63c-2.093.273-4.247.062-6.375.062v.23ZM36.145 62.17c-2.025-.293-3.491-.388-4.893-.739-1.576-.394-2.672-1.64-2.46-3.18.16-1.171.999-2.892 1.927-3.205 4.373-1.47 8.91-2.246 13.54-1.181a3.14 3.14 0 0 1 2.678 3.037 3.271 3.271 0 0 1-2.433 3.616c-2.905.77-5.905 1.185-8.36 1.651ZM90.334 44.23c-2.214-.3-4.485-.394-6.616-.985-.994-.278-2.418-1.552-2.39-2.33.038-1.076 1.144-2.228 2.025-3.116.482-.486 1.428-.598 2.19-.705 2.664-.376 5.332-.759 8.012-.985 3.493-.295 6.248 1.287 6.422 3.529.171 2.217-2.297 4.05-5.913 4.314-1.228.09-2.467.014-3.702.014l-.028.264ZM91.055 95.77c-1.151-.11-3.04-.223-4.91-.486a2.821 2.821 0 0 1-2.582-3.023 2.967 2.967 0 0 1 2.57-3.092c3.633-.598 7.285-1.162 10.953-1.431 2.51-.184 4.214 1.312 4.375 3.224.163 1.938-1.187 3.626-3.653 4.113-1.964.388-3.996.428-6.754.695ZM90.511 79.682c-1.829-.262-3.395-.398-4.917-.731-1.685-.37-2.854-1.473-2.888-3.243a3.243 3.243 0 0 1 2.745-3.359 72.338 72.338 0 0 1 8.26-1.36c2.517-.24 4.4 1.264 4.719 3.347.284 1.857-1.014 3.863-3.226 4.525a36.88 36.88 0 0 1-4.692.821ZM89.072 60.41a25.732 25.732 0 0 1-4.804-.947c-.811-.295-1.575-1.522-1.792-2.457a2.261 2.261 0 0 1 .363-1.795 2.247 2.247 0 0 1 1.575-.934 68.506 68.506 0 0 1 9.654-.803 3.498 3.498 0 0 1 3.374 3.182c.036 1.453-1.266 2.937-3.252 3.344-1.697.234-3.405.37-5.118.41Z" />
                                            </g>
                                            <defs>
                                                <clipPath id="a">
                                                    <path fill="#fff" transform="translate(.735 .953)"
                                                        d="M0 0h135.862v141.769H0z" />
                                                </clipPath>
                                            </defs>
                                        </svg>
                                    </div>
                                    <div class="ml-3 w-0 flex-1 pt-0.5">

                                        <p class="text-sm font-medium text-gray-900">Purchase Price
                                        </p>
                                        <p class="mt-1 text-2xl font-semibold text-gray-500">
                                            {{
                                            App\Http\Controllers\CollectionController::shortNumber($unit_details->price)
                                            }}
                                        </p>
                                    </div>
                                    <div class="ml-3 w-0 flex-1 pt-0.5">

                                        <p class="text-sm font-medium text-gray-900">Total
                                            Remaining Amount to get the ROI</p>
                                        <p class="mt-1 text-2xl font-semibold text-gray-500">
                                            {{
                                            App\Http\Controllers\CollectionController::shortNumber($unit_details->price
                                            -
                                            $total_collected_bills)
                                            }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div
                            class="mb-5 bg-green-50 h-full w-full shadow-md rounded-lg pointer-events-auto ring-1 ring-black ring-opacity-5 overflow-hidden">
                            <div class="p-4">
                                <div class="flex items-start">
                                    <div class="flex-shrink-0">
                                        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 95.929 95.929" style="enable-background:new 0 0 95.929 95.929"
                                            xml:space="preserve">
                                            <path
                                                d="M11.465 87.419c2 1.4 4 2.4 6.1 3.3 4.1 1.8 8.4 2.9 12.7 3.7s8.6 1.2 13 1.2c2.1.2 4.3.3 6.4.3 6.8.1 13.7-.5 20.4-2.1 3.4-.8 6.7-1.8 10-3.3 1.6-.7 3.2-1.6 4.8-2.7 1.5-1.1 3.1-2.3 4.4-3.9.8-.9 1.4-2 1.8-3 .4-1.1.5-2.1.4-3s-.4-1.5-.7-1.8c-.3-.3-.7-.4-1.2-.4-.8.1-1.5 1-2.1 1.7l-2.6 2.6c-2.1 1.9-5 3.3-8 4.4s-6.2 1.9-9.4 2.6c-5.2 1.1-10.5 1.8-15.9 2.1-5.4.3-10.8.2-16.2-.4-4.7-1.2-9.3-2.5-13.7-4.3-2.1-.9-4.2-1.9-6-3s-3.3-2.6-3.8-3.7c-.1-.1-.1-.3-.2-.4 0-.1 0-.1-.1-.2V66.719c1.8 1.8 3.9 3.1 6.2 4.2 6.1 2.7 12.4 4.4 18.8 5.3 3.2.5 6.4.7 9.7.8h2.5c.8 0 1.5 0 2.4-.1 1.7-.1 3.3-.2 4.9-.4 1.6 0 3.2-.1 4.8-.2 5.1-.4 10.2-1.3 15.2-3 2.5-.8 5-1.9 7.4-3.3 1.2-.7 2.4-1.5 3.5-2.4s2.2-2 3.1-3.3c1.1-1.5 1.6-3.4 1.3-4.7-.1-.7-.4-1.2-.7-1.5-.3-.3-.7-.4-1.2-.4h-.1c1.5-6.4 2.2-13.9 2.4-21.4.2-5.3.3-10.5.4-15.8v-2.6l-.1-.4c0-.3-.1-.6-.2-.9-.1-.5-.3-1-.4-1.4-.7-1.8-1.8-3.2-2.9-4.4-2.3-2.3-4.9-3.8-7.4-5.1-5.2-2.5-10.6-3.9-16-4.8-5.4-.7-10.9-1-16.3-.9-2.7 0-5.4 0-8.1.1-4.3.2-8.6.7-12.9 1.6s-8.5 2.1-12.7 4c-2.1 1-4.1 2.1-6.1 3.7-1 .8-1.9 1.7-2.8 2.9-.9 1.1-1.6 2.5-2.1 4-.2.8-.4 1.6-.4 2.4V20.419l.3 3.1.3 6.2c.2 4.7 1.1 8.6 2.9 8.2 1.6-.3 2.8-3.7 3-8.5 0-.9.1-1.7.1-2.6.2.2.4.5.6.7 1.8 2 4.2 3.6 6.7 4.7 6.1 2.7 12.4 4.4 18.8 5.3 3.2.5 6.4.7 9.7.8h2.5c.8 0 1.5 0 2.4-.1 1.7-.1 3.3-.2 4.9-.4 1.6 0 3.2-.1 4.8-.2 5.1-.4 10.2-1.3 15.2-3 2.5-.8 5-1.9 7.4-3.3.6-.4 1.2-.7 1.8-1.2v11.3c-1.4 1.4-3.4 2.6-5.5 3.5-2.1 1-4.4 1.8-6.7 2.5-7.5 2.4-15.5 3.7-23.7 4-7.3-1.1-14.5-1.9-21.4-3.6-3.5-.8-6.9-1.9-9.9-3.3-1.5-.7-2.9-1.6-4.1-2.5-.6-.5-1-1-1.4-1.4-.4-.5-.6-1-.7-1.3 0-.1-.1-.1-.2-.2s-.2 0-.3 0h-.2c-.1 0-.1-.2-.2-.2-.1-.2-.3-.3-.4-.3-.5-.3-.9-.2-1.3.1-.2.2-.4.4-.5.6-.1.2-.3.5-.3.8-.2 1.1-.1 2.4.4 3.6.5 1.2 1.3 2.3 2.2 3.3 1.8 2 4.2 3.6 6.7 4.7 6.1 2.7 12.4 4.4 18.8 5.3 3.2.5 6.4.7 9.7.8h2.5c.8 0 1.5 0 2.4-.1 1.7-.1 3.3-.2 4.9-.4 1.6 0 3.2-.1 4.8-.2 5.1-.4 10.2-1.3 15.2-3 2.5-.8 5-1.9 7.4-3.3.6-.4 1.3-.8 1.9-1.2 0 3.3 0 6.7-.1 10 0 .3 0 .6.1 1-1.4 1.4-3.4 2.6-5.5 3.5-2.1 1-4.4 1.8-6.7 2.5-7.5 2.4-15.5 3.7-23.7 4-7.3-1.1-14.5-1.9-21.4-3.6-3.5-.8-6.9-1.9-9.9-3.3-1.5-.7-2.9-1.6-4.1-2.5-.6-.5-1-1-1.4-1.4-.4-.5-.6-1-.7-1.3 0-.1-.1-.1-.2-.2h-.1c0-3 0-6 .1-8.9 0-.9-.7-2.3-1.1-2.7-1-.9-1.8.3-2.4 2-2.2 5.6-3.1 12.4-3.3 19.3l-.2 6.3-.1 1.6v1.8c0 .4.1.9.2 1.3.1.3.2.6.3 1 .3.7.6 1.4.9 2 1.6 2.4 3.5 4 5.5 5.4zm-.9-68V19.119c0-.1 0-.3.1-.4.1-.3.2-.5.3-.8.5-1.2 1.8-2.4 3.3-3.4s3.3-1.9 5.1-2.7c6-2.5 12.7-3.9 19.4-4.7 6.7-.8 13.6-.9 20.4-.3 6 1.2 11.9 2.8 17.2 5.1 2.6 1.2 5.2 2.6 6.9 4.2.8.8 1.5 1.7 1.7 2.3 0 .1.1.2.1.3v.1c0-.2.1.6.1.7v2.9c-1.4 1.4-3.4 2.5-5.4 3.5-2.1 1-4.4 1.8-6.7 2.5-7.5 2.4-15.5 3.7-23.7 4-7.3-1.1-14.5-1.9-21.4-3.6-3.5-.8-6.9-1.9-9.9-3.3-1.5-.7-2.9-1.6-4.1-2.5-2.3-1.8-3.4-3.6-3.4-3.6z" />
                                        </svg>

                                    </div>
                                    <div class="ml-3 w-0 flex-1 pt-0.5">

                                        <p class="text-sm font-medium text-gray-900">Potential Gross Revenue per month
                                        </p>
                                        <p class="mt-1 text-2xl font-semibold text-gray-500">
                                            {{
                                            App\Http\Controllers\CollectionController::shortNumber($unit_details->rent *
                                            $unit_details->occupancy)
                                            }}
                                        </p>
                                    </div>
                                    {{-- <div class="ml-3 w-0 flex-1 pt-0.5">

                                        <p class="text-sm font-medium text-gray-900">Total
                                            Remaining Amount to get the ROI</p>
                                        <p class="mt-1 text-2xl font-semibold text-gray-500">
                                            {{
                                            App\Http\Controllers\CollectionController::shortNumber($unit_details->price
                                            -
                                            $total_collected_bills)
                                            }}
                                        </p>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                        <h2 class="p-2 text-lg font-semibold text-gray-700">Bills and
                            Collection</h2>


                        <div
                            class="mb-5 bg-gray-50 h-full w-full shadow-md rounded-lg pointer-events-auto ring-1 ring-black ring-opacity-5 overflow-hidden">
                            <div class="p-4">
                                <div class="flex items-start">
                                    <div class="flex-shrink-0">
                                        <svg class="w-6 h-6" viewBox="-3 0 143 143" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <g clip-path="url(#a)" fill="#000">
                                                <path
                                                    d="M120.6 8.383c.449 11.6.645 22.706 1.355 33.779 1.51 23.515 4.141 46.96 4.506 70.547.086 5.496 0 11.003-.286 16.491a21.134 21.134 0 0 1-1.572 6.12c-1.176 3.151-3.306 4.02-6.332 2.532a47.556 47.556 0 0 1-5.698-3.567c-2.311-1.58-4.554-3.259-6.957-4.989-.574.302-1.129.64-1.662 1.01-3.971 3.121-7.956 6.222-11.873 9.41-4.115 3.347-7.81 3.386-12.344-.55-2.878-2.5-5.624-5.151-8.443-7.72-.401-.366-.876-.653-1.482-1.098-3.44 2.572-6.834 5.139-10.258 7.662-5.01 3.692-5.077 4.271-12.011.262-4.05-2.34-7.634-5.485-11.61-8.401-4.445 2.641-9.133 5.465-13.857 8.223-5.427 3.169-9.643.925-10.215-5.397-.04-.446-.03-.897-.037-1.346-.239-18.86-.476-37.718-.711-56.577-.188-15.828-.36-31.656-.513-47.483-.05-5.157-.007-10.316-.007-16.02-.788 0-1.844.021-2.9-.005a25.536 25.536 0 0 1-4.681-.25c-.794-.17-1.908-1.076-1.993-1.761a3.725 3.725 0 0 1 1.058-2.864 5.364 5.364 0 0 1 3.12-.968c11.1-.503 22.202-.96 33.305-1.369 16.938-.642 33.874-1.35 50.816-1.849 14.026-.411 28.059-.56 42.09-.824a8.22 8.22 0 0 1 .673.011c2.731.175 4.441 1.631 4.332 3.684-.105 1.97-1.684 3.244-4.319 3.288-3.68.066-7.364.019-11.494.019Zm-4.143 119.549c.077-1.497.163-2.167.138-2.833-.632-16.943-1.182-33.889-1.944-50.826-.812-18.054-2.467-36.08-1.313-54.186.239-3.768.035-7.563.035-11.803l-94.96 3.085c.538 39.283 2.277 78.382 2.797 117.838.924-.459 1.531-.713 2.083-1.053 2.197-1.355 4.266-2.964 6.584-4.064 5.167-2.457 8.694-2.954 12.886.944 3.372 3.135 7.685 5.259 11.486 7.77 1.561-1.201 2.744-2.054 3.864-2.985a366.84 366.84 0 0 0 5.894-5.028c3.208-2.781 6.534-3.177 10.22-1.136.976.555 1.919 1.169 2.822 1.838 3.072 2.219 6.124 4.465 9.274 6.769 3.91-2.852 7.721-5.621 11.52-8.407 4.335-3.178 7.171-3.281 11.71-.379 2.137 1.366 4.269 2.751 6.904 4.456Z" />
                                                <path
                                                    d="M44.381 79.789c-3.918 0-7.836.008-11.754-.006a12.8 12.8 0 0 1-2.673-.149c-1.662-.364-2.865-1.296-2.94-3.162a3.125 3.125 0 0 1 2.682-3.363 45.292 45.292 0 0 1 5.979-.816c7.244-.629 14.49-1.252 21.744-1.76a19.16 19.16 0 0 1 4.981.419 3.602 3.602 0 0 1 2.96 3.263 3.42 3.42 0 0 1-2.1 3.84 22.684 22.684 0 0 1-6.46 1.486c-4.13.229-8.28.066-12.42.066l.001.182ZM34.632 45.388c-1.01 0-2.024.045-3.032-.01-2.38-.13-3.873-1.273-4.188-3.15-.328-1.93.932-3.72 3.398-4.31a61.25 61.25 0 0 1 7.628-1.29c5.804-.63 11.617-1.217 17.44-1.62 1.778-.135 3.564.12 5.232.749 3.03 1.217 3.38 4.512.671 6.351a11.644 11.644 0 0 1-4.965 1.818c-3.56.434-7.166.479-10.753.69-3.811.225-7.622.455-11.433.687l.002.085ZM45.89 88.354c2.358 0 4.72-.092 7.069.037a9.699 9.699 0 0 1 3.872.836 4.263 4.263 0 0 1 2.35 3.811 4.268 4.268 0 0 1-2.35 3.812c-1.325.593-2.759.906-4.21.919-5.94.276-11.885.459-17.83.59a17.088 17.088 0 0 1-4.32-.44c-1.999-.48-3.262-2.078-3.15-3.82.115-1.844 1.036-3.282 2.891-3.7a64.42 64.42 0 0 1 7.279-1.232c2.787-.304 5.6-.375 8.401-.547l-.001-.266ZM36.844 28.567c-2.015 0-4.033.05-6.046-.022-.988-.035-2.17-.013-2.901-.53a5.638 5.638 0 0 1-2.049-2.783c-.411-1.39.355-2.661 1.686-3.323a9.114 9.114 0 0 1 2.853-.903c4.552-.572 9.11-1.115 13.68-1.527 1.304-.119 2.841-.123 3.927.459a6.373 6.373 0 0 1 2.7 3.077c.58 1.49-.385 3.014-1.75 3.629a20.582 20.582 0 0 1-5.725 1.63c-2.093.273-4.247.062-6.375.062v.23ZM36.145 62.17c-2.025-.293-3.491-.388-4.893-.739-1.576-.394-2.672-1.64-2.46-3.18.16-1.171.999-2.892 1.927-3.205 4.373-1.47 8.91-2.246 13.54-1.181a3.14 3.14 0 0 1 2.678 3.037 3.271 3.271 0 0 1-2.433 3.616c-2.905.77-5.905 1.185-8.36 1.651ZM90.334 44.23c-2.214-.3-4.485-.394-6.616-.985-.994-.278-2.418-1.552-2.39-2.33.038-1.076 1.144-2.228 2.025-3.116.482-.486 1.428-.598 2.19-.705 2.664-.376 5.332-.759 8.012-.985 3.493-.295 6.248 1.287 6.422 3.529.171 2.217-2.297 4.05-5.913 4.314-1.228.09-2.467.014-3.702.014l-.028.264ZM91.055 95.77c-1.151-.11-3.04-.223-4.91-.486a2.821 2.821 0 0 1-2.582-3.023 2.967 2.967 0 0 1 2.57-3.092c3.633-.598 7.285-1.162 10.953-1.431 2.51-.184 4.214 1.312 4.375 3.224.163 1.938-1.187 3.626-3.653 4.113-1.964.388-3.996.428-6.754.695ZM90.511 79.682c-1.829-.262-3.395-.398-4.917-.731-1.685-.37-2.854-1.473-2.888-3.243a3.243 3.243 0 0 1 2.745-3.359 72.338 72.338 0 0 1 8.26-1.36c2.517-.24 4.4 1.264 4.719 3.347.284 1.857-1.014 3.863-3.226 4.525a36.88 36.88 0 0 1-4.692.821ZM89.072 60.41a25.732 25.732 0 0 1-4.804-.947c-.811-.295-1.575-1.522-1.792-2.457a2.261 2.261 0 0 1 .363-1.795 2.247 2.247 0 0 1 1.575-.934 68.506 68.506 0 0 1 9.654-.803 3.498 3.498 0 0 1 3.374 3.182c.036 1.453-1.266 2.937-3.252 3.344-1.697.234-3.405.37-5.118.41Z" />
                                            </g>
                                            <defs>
                                                <clipPath id="a">
                                                    <path fill="#fff" transform="translate(.735 .953)"
                                                        d="M0 0h135.862v141.769H0z" />
                                                </clipPath>
                                            </defs>
                                        </svg>
                                    </div>
                                    <div class="ml-3 w-0 flex-1 pt-0.5">

                                        <p class="text-sm font-medium text-gray-900">Total
                                            Bills for Collection</p>
                                        <p class="mt-1 text-2xl font-semibold text-gray-500">
                                            {{
                                            App\Http\Controllers\CollectionController::shortNumber($total_uncollected_bills
                                            + $total_collected_bills)
                                            }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div
                            class="mb-5 bg-purple-100 w-full shadow-md rounded-lg pointer-events-auto ring-1 ring-black ring-opacity-5 overflow-hidden">
                            <div class="p-4">
                                <div class="flex items-start">

                                    <div class="flex-shrink-0">
                                        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 95.929 95.929" style="enable-background:new 0 0 95.929 95.929"
                                            xml:space="preserve">
                                            <path
                                                d="M11.465 87.419c2 1.4 4 2.4 6.1 3.3 4.1 1.8 8.4 2.9 12.7 3.7s8.6 1.2 13 1.2c2.1.2 4.3.3 6.4.3 6.8.1 13.7-.5 20.4-2.1 3.4-.8 6.7-1.8 10-3.3 1.6-.7 3.2-1.6 4.8-2.7 1.5-1.1 3.1-2.3 4.4-3.9.8-.9 1.4-2 1.8-3 .4-1.1.5-2.1.4-3s-.4-1.5-.7-1.8c-.3-.3-.7-.4-1.2-.4-.8.1-1.5 1-2.1 1.7l-2.6 2.6c-2.1 1.9-5 3.3-8 4.4s-6.2 1.9-9.4 2.6c-5.2 1.1-10.5 1.8-15.9 2.1-5.4.3-10.8.2-16.2-.4-4.7-1.2-9.3-2.5-13.7-4.3-2.1-.9-4.2-1.9-6-3s-3.3-2.6-3.8-3.7c-.1-.1-.1-.3-.2-.4 0-.1 0-.1-.1-.2V66.719c1.8 1.8 3.9 3.1 6.2 4.2 6.1 2.7 12.4 4.4 18.8 5.3 3.2.5 6.4.7 9.7.8h2.5c.8 0 1.5 0 2.4-.1 1.7-.1 3.3-.2 4.9-.4 1.6 0 3.2-.1 4.8-.2 5.1-.4 10.2-1.3 15.2-3 2.5-.8 5-1.9 7.4-3.3 1.2-.7 2.4-1.5 3.5-2.4s2.2-2 3.1-3.3c1.1-1.5 1.6-3.4 1.3-4.7-.1-.7-.4-1.2-.7-1.5-.3-.3-.7-.4-1.2-.4h-.1c1.5-6.4 2.2-13.9 2.4-21.4.2-5.3.3-10.5.4-15.8v-2.6l-.1-.4c0-.3-.1-.6-.2-.9-.1-.5-.3-1-.4-1.4-.7-1.8-1.8-3.2-2.9-4.4-2.3-2.3-4.9-3.8-7.4-5.1-5.2-2.5-10.6-3.9-16-4.8-5.4-.7-10.9-1-16.3-.9-2.7 0-5.4 0-8.1.1-4.3.2-8.6.7-12.9 1.6s-8.5 2.1-12.7 4c-2.1 1-4.1 2.1-6.1 3.7-1 .8-1.9 1.7-2.8 2.9-.9 1.1-1.6 2.5-2.1 4-.2.8-.4 1.6-.4 2.4V20.419l.3 3.1.3 6.2c.2 4.7 1.1 8.6 2.9 8.2 1.6-.3 2.8-3.7 3-8.5 0-.9.1-1.7.1-2.6.2.2.4.5.6.7 1.8 2 4.2 3.6 6.7 4.7 6.1 2.7 12.4 4.4 18.8 5.3 3.2.5 6.4.7 9.7.8h2.5c.8 0 1.5 0 2.4-.1 1.7-.1 3.3-.2 4.9-.4 1.6 0 3.2-.1 4.8-.2 5.1-.4 10.2-1.3 15.2-3 2.5-.8 5-1.9 7.4-3.3.6-.4 1.2-.7 1.8-1.2v11.3c-1.4 1.4-3.4 2.6-5.5 3.5-2.1 1-4.4 1.8-6.7 2.5-7.5 2.4-15.5 3.7-23.7 4-7.3-1.1-14.5-1.9-21.4-3.6-3.5-.8-6.9-1.9-9.9-3.3-1.5-.7-2.9-1.6-4.1-2.5-.6-.5-1-1-1.4-1.4-.4-.5-.6-1-.7-1.3 0-.1-.1-.1-.2-.2s-.2 0-.3 0h-.2c-.1 0-.1-.2-.2-.2-.1-.2-.3-.3-.4-.3-.5-.3-.9-.2-1.3.1-.2.2-.4.4-.5.6-.1.2-.3.5-.3.8-.2 1.1-.1 2.4.4 3.6.5 1.2 1.3 2.3 2.2 3.3 1.8 2 4.2 3.6 6.7 4.7 6.1 2.7 12.4 4.4 18.8 5.3 3.2.5 6.4.7 9.7.8h2.5c.8 0 1.5 0 2.4-.1 1.7-.1 3.3-.2 4.9-.4 1.6 0 3.2-.1 4.8-.2 5.1-.4 10.2-1.3 15.2-3 2.5-.8 5-1.9 7.4-3.3.6-.4 1.3-.8 1.9-1.2 0 3.3 0 6.7-.1 10 0 .3 0 .6.1 1-1.4 1.4-3.4 2.6-5.5 3.5-2.1 1-4.4 1.8-6.7 2.5-7.5 2.4-15.5 3.7-23.7 4-7.3-1.1-14.5-1.9-21.4-3.6-3.5-.8-6.9-1.9-9.9-3.3-1.5-.7-2.9-1.6-4.1-2.5-.6-.5-1-1-1.4-1.4-.4-.5-.6-1-.7-1.3 0-.1-.1-.1-.2-.2h-.1c0-3 0-6 .1-8.9 0-.9-.7-2.3-1.1-2.7-1-.9-1.8.3-2.4 2-2.2 5.6-3.1 12.4-3.3 19.3l-.2 6.3-.1 1.6v1.8c0 .4.1.9.2 1.3.1.3.2.6.3 1 .3.7.6 1.4.9 2 1.6 2.4 3.5 4 5.5 5.4zm-.9-68V19.119c0-.1 0-.3.1-.4.1-.3.2-.5.3-.8.5-1.2 1.8-2.4 3.3-3.4s3.3-1.9 5.1-2.7c6-2.5 12.7-3.9 19.4-4.7 6.7-.8 13.6-.9 20.4-.3 6 1.2 11.9 2.8 17.2 5.1 2.6 1.2 5.2 2.6 6.9 4.2.8.8 1.5 1.7 1.7 2.3 0 .1.1.2.1.3v.1c0-.2.1.6.1.7v2.9c-1.4 1.4-3.4 2.5-5.4 3.5-2.1 1-4.4 1.8-6.7 2.5-7.5 2.4-15.5 3.7-23.7 4-7.3-1.1-14.5-1.9-21.4-3.6-3.5-.8-6.9-1.9-9.9-3.3-1.5-.7-2.9-1.6-4.1-2.5-2.3-1.8-3.4-3.6-3.4-3.6z" />
                                        </svg>
                                    </div>
                                    <div class="ml-3 w-0 flex-1 pt-0.5">

                                        <p class="text-sm font-medium text-gray-900">
                                            Collected Amount </p>
                                        <p class="mt-1 text-2xl font-semibold text-gray-500">
                                            {{
                                            App\Http\Controllers\CollectionController::shortNumber($total_collected_bills)
                                            }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div
                            class="mb-5 bg-indigo-200 w-full shadow-md rounded-lg pointer-events-auto ring-1 ring-black ring-opacity-5 overflow-hidden">
                            <div class="p-4">
                                <div class="flex items-start">
                                    <div class="flex-shrink-0">
                                        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 297 297"
                                            style="enable-background:new 0 0 297 297" xml:space="preserve">
                                            <path
                                                d="M47.156 188.376c0 2.861 1.109 14.855 9.212 29.09 6.86 12.052 19.88 26.147 43.843 29.262v40.243c0 5.538 4.49 10.029 10.029 10.029 5.538 0 10.028-4.491 10.028-10.029v-49.644c0-5.538-4.49-10.029-10.028-10.029-16.487 0-28.643-6.465-36.128-19.216-5.521-9.402-6.922-17.345-6.922-20.844v-82.294c0-1.782 0-6.519 8.237-6.519 8.235 0 8.235 4.736 8.235 6.519v34.548c0 2.736 1.117 5.354 3.095 7.246a9.982 9.982 0 0 0 7.374 2.773c.024-.011 5.862.022 13.244 4.191 11.333 6.402 20.478 19.249 26.445 37.151 1.752 5.255 7.432 8.097 12.686 6.344 5.255-1.752 8.095-7.432 6.343-12.686-12.976-38.932-35.79-50.37-49.128-53.701V38.037c0-2.17 0-5.803 8.236-5.803 8.235 0 8.235 3.633 8.235 5.803v54.73c0 5.539 4.491 10.029 10.029 10.029s10.028-4.49 10.028-10.029V25.86c0-2.17 0-5.803 8.236-5.803 8.235 0 8.235 3.633 8.235 5.803v66.907c0 5.539 4.491 10.029 10.029 10.029s10.029-4.49 10.029-10.029v-54.73c0-2.17 0-5.803 8.235-5.803 8.236 0 8.236 3.633 8.236 5.803v71.278c0 5.538 4.491 10.029 10.029 10.029 5.539 0 10.029-4.491 10.029-10.029V71.849c0-1.782 0-6.519 8.236-6.519s8.244 4.736 8.244 6.519v116.402c.011.177.717 18.087-9.919 29.341-6.086 6.441-15.135 9.706-26.894 9.706-5.539 0-10.029 4.491-10.029 10.029v49.644c0 5.538 4.49 10.029 10.029 10.029 5.538 0 10.028-4.491 10.028-10.029v-40.253c12.868-1.712 23.415-6.855 31.443-15.35 15.825-16.745 15.516-40.586 15.391-43.899V71.849c0-15.647-11.636-26.577-28.294-26.577-2.912 0-5.667.342-8.236.977v-8.211c0-15.469-11.371-25.86-28.295-25.86-3.986 0-7.66.583-10.954 1.667C169.732 5.253 160.514 0 148.487 0c-12.028 0-21.245 5.253-25.575 13.844-3.294-1.084-6.968-1.667-10.954-1.667-16.924 0-28.295 10.392-28.295 25.86v41.307c-2.569-.635-5.324-.976-8.235-.976-16.66 0-28.295 10.93-28.295 26.577-.001-.001.023 61.792.023 83.431z" />
                                        </svg>
                                    </div>

                                    <div class="ml-3 w-0 flex-1 pt-0.5">

                                        <p class="text-sm font-medium text-gray-900">Total
                                            Unpaid Collection:</p>
                                        <p class="mt-1 text-2xl font-semibold text-gray-500">
                                            {{
                                            App\Http\Controllers\CollectionController::shortNumber($total_uncollected_bills)
                                            }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                {{-- <div class="hidden rounded-lg dark:bg-gray-800" id="rooms" role="tabpanel"
                    aria-labelledby="rooms-tab">
                    rooms
                </div>
                <div class="hidden rounded-lg dark:bg-gray-800" id="furnitures" role="tabpanel"
                    aria-labelledby="furnitures-tab">
                    furnitures
                </div> --}}
            </div>
        </div>
    </div>
</div>