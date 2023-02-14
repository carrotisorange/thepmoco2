<div>
    @if(!App\Models\UserProperty::where('user_id', Auth::user()->id)->count())
    <div class="mt-10">
        <nav aria-label="Progress">
            <ol role="list" class="divide-y divide-gray-300 rounded-md border border-gray-300 md:flex md:divide-y-0">
                <li class="relative md:flex md:flex-1">
                    <!-- Completed Step -->
                    <a href="#" class="flex items-center px-6 py-4 text-sm font-medium" aria-current="step">
                        <span
                            class="flex h-10 w-10 flex-shrink-0 items-center justify-center rounded-full border-2 border-indigo-600">
                            <span class="text-purple-500">01</span>
                        </span>
                        <span class="ml-4 text-sm font-medium text-purple-500">Create a property</span>
                    </a>

                    <!-- Arrow separator for lg screens and up -->
                    <div class="absolute top-0 right-0 hidden h-full w-5 md:block" aria-hidden="true">
                        <svg class="h-full w-full text-gray-300" viewBox="0 0 22 80" fill="none"
                            preserveAspectRatio="none">
                            <path d="M0 -2L20 40L0 82" vector-effect="non-scaling-stroke" stroke="currentcolor"
                                stroke-linejoin="round" />
                        </svg>
                    </div>
                </li>

                <li class="relative md:flex md:flex-1">
                    <!-- Current Step -->
                    <a href="#" class="group flex items-center">
                        <span class="flex items-center px-6 py-4 text-sm font-medium">
                            <span
                                class="flex h-10 w-10 flex-shrink-0 items-center justify-center rounded-full border-2 border-gray-300 group-hover:border-gray-400">
                                <span class="text-gray-500 group-hover:text-gray-900">02</span>
                            </span>
                            <span class="ml-4 text-sm font-medium text-gray-500 group-hover:text-gray-900">Add units
                            </span>
                        </span>
                    </a>

                    <!-- Arrow separator for lg screens and up -->
                    <div class="absolute top-0 right-0 hidden h-full w-5 md:block" aria-hidden="true">
                        <svg class="h-full w-full text-gray-300" viewBox="0 0 22 80" fill="none"
                            preserveAspectRatio="none">
                            <path d="M0 -2L20 40L0 82" vector-effect="non-scaling-stroke" stroke="currentcolor"
                                stroke-linejoin="round" />
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
                            <span class="ml-4 text-sm font-medium text-gray-500 group-hover:text-gray-900">Add
                                tenants</span>
                        </span>
                    </a>


                    <!-- Arrow separator for lg screens and up -->
                    <div class="absolute top-0 right-0 hidden h-full w-5 md:block" aria-hidden="true">
                        <svg class="h-full w-full text-gray-300" viewBox="0 0 22 80" fill="none"
                            preserveAspectRatio="none">
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
                                <span class="text-gray-500 group-hover:text-gray-900">04</span>
                            </span>
                            <span class="ml-4 text-sm font-medium text-gray-500 group-hover:text-gray-900">Add
                                personnels</span>
                        </span>
                    </a>
                </li>
            </ol>
        </nav>
    </div>
    {{-- <h2 class="text-2xl font-bold tracking-tight text-gray-900 font-pop">Welcome, {{
        auth()->user()->name }}!</h2> --}}
    <!-- This example requires Tailwind CSS v2.0+ -->
    <div class="mt-32 text-center">
        <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"
            aria-hidden="true">
            <path vector-effect="non-scaling-stroke" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M9 13h6m-3-3v6m-9 1V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z" />
        </svg>
        <h3 class="mt-2 text-sm font-medium text-gray-900">No properties</h3>
        <p class="mt-1 text-sm text-gray-500">Get started by creating a new property.</p>
        <div class="mt-6">
            <button type="button" wire:loading wire:target="submitForm" disabled
                class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-purple-500 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Loading...
            </button>
            <button type="submit" wire:click="submitForm()" wire:loading.remove
                class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-purple-500 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">

                <svg wire:loading wire:target="submitForm" class="animate-spin -ml-1 mr-3 h-5 w-5 text-white"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4">
                    </circle>
                    <path class="opacity-75" fill="currentColor"
                        d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                    </path>
                </svg>
                <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                    fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd"
                        d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z"
                        clip-rule="evenodd" />
                </svg>
                Create your first property
            </button>
        </div>
    </div>
    @else

    {{-- <h2 class="text-2xl mt-5 font-bold tracking-tight text-gray-900 font-pop">Welcome back, {{
        auth()->user()->name }}!</h2> --}}
    <div class="sm:flex sm:items-center">
        <div class="sm:flex-auto">
            <h2 class="text-2xl mt-5 font-bold tracking-tight text-gray-900 font-pop">Welcome back, {{
                auth()->user()->name }}!</h2>
            {{-- <h1 class="text-xl font-semibold text-gray-900">Portfolio</h1> --}}
        </div>
        <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
            @if($search || $sortBy || $filterByPropertyType)
            <button type="button" wire:click="clearFilters"
                class="inline-flex items-center justify-center rounded-md border border-transparent bg-purple-500 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-gray-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto">
                 &nbsp; Clear
                Filters</button>
            @endif

            <button type="button" wire:click="exportPortfolio" wire:loading.remove
                class="inline-flex items-center justify-center rounded-md border border-transparent bg-purple-500 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-gray-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto">
              <i class="fa-solid fa-download"></i> &nbsp  Export Portfolio
            </button>

            <button type="button" wire:loading disabled
                class="inline-flex items-center justify-center rounded-md border border-transparent bg-purple-500 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-gray-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto">
                Loading...
            </button>

            <button type="button" wire:click="createNewProperty" wire:loading.remove
                class="inline-flex items-center justify-center rounded-md border border-transparent bg-purple-500 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-gray-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto">
               <i class="fa-solid fa-circle-plus"></i> &nbsp; New
                property</button>

        </div>
    </div>
    {{-- <p class="mt-2 text-sm text-gray-700">Select a property.</p> --}}
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
                <input type="text" id="search" wire:model="search"
                    class="bg-white block p-4 pl-10 w-full text-sm h-5 text-gray-90 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Enter a property name" required>

            </div>

        </div>

        <div class="sm:col-span-1">
            <select id="filterByPropertyType" wire:model="filterByPropertyType"
                class="text-left bg-white block p-1 w-full text-sm h-8 text-gray-90 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                <option value="" selected>Filter by property type</option>
                @foreach ($property_types as $item)
                <option value="{{ $item->type_id }}">{{ $item->type }}</option>
                @endforeach
            </select>

        </div>

        <div class="sm:col-span-1">
            <select id="sortBy" wire:model="sortBy"
                class="text-left bg-white block p-1 w-full text-sm h-8 text-gray-90 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                <option value="" selected>Sort property by</option>
                <option value="property">name</option>
                <option value="created_at">date created</option>
            </select>

        </div>


    </div>
    {{-- <div>
        <p class="text-sm text-center text-gray-500">
            Showing
            <span class="font-medium"><b>{{ $portfolio->count() }}</b></span>

            {{Str::plural('properties', $portfolio->count())}}
        </p>
    </div> --}}
    <div class="mt-5 mb-5">
        {{ $portfolio->links() }}
    </div>
    <div class="mt-1 mb-5 grid grid-cols-5 gap-y-10 gap-x-6 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
        @foreach ($portfolio->where('status', 'active') as $property)
        <div class="group relative">
            <div class="w-full h-32 bg-white rounded-md overflow-hidden group-hover:opacity-75 lg:h-80 lg:aspect-none">
                <a href="/property/{{ $property->property_uuid }}">
                    <img src="{{ asset('/brands/property_page.png') }}" title="{{ $property->property }}" alt="building"
                        class="w-40 object-center object-cover lg:w-full lg:h-full">
                </a>
            </div>
           <h3 class="text-center mt-2">{{ $property->property }}</h3>
        </div>
        @endforeach
    </div>




    <div class="mt-8 flex flex-col">
        <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-9">
            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                    @include('tables.portfolio')
                </div>
            </div>
        </div>
    </div>


    @endif

</div>