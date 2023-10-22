<?php $name = auth()->user()->name;
    $firstName = explode(" ",$name);
?>
<div>
    @if(!$userPropertyCount)
    <div class="mt-10">
        <nav aria-label="Progress">
            <ol role="list" class="divide-y divide-gray-300 rounded-md border border-gray-300 md:flex md:divide-y-0">
                @foreach($propertySubfeaturesArray as $index => $subfeature)
                @if($subfeature === 'property')
                <li class="relative md:flex md:flex-1">
                    <!-- Completed Step -->
                    <a href="#" class="flex items-center px-6 py-4 text-sm font-medium"
                        aria-current="{{ $subfeature }}">
                        <span
                            class="flex h-10 w-10 flex-shrink-0 items-center justify-center rounded-full border-2 border-indigo-600">
                            <span class="text-purple-500">{{ $index+1 }}</span>
                        </span>
                        <span class="ml-4 text-sm font-medium text-purple-500">Add a {{ $subfeature }}</span>
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
                @else
                <li class="relative md:flex md:flex-1">
                    <!-- Current Step -->
                    <a href="#" class="group flex items-center">
                        <span class="flex items-center px-6 py-4 text-sm font-medium">
                            <span
                                class="flex h-10 w-10 flex-shrink-0 items-center justify-center rounded-full border-2 border-gray-300 group-hover:border-gray-400">
                                <span class="text-gray-500 group-hover:text-gray-900">{{ $index+1 }}</span>
                            </span>
                            <span class="ml-4 text-sm font-medium text-gray-500 group-hover:text-gray-900">Add a {{
                                $subfeature }}
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
                @endif
                @endforeach


            </ol>
        </nav>
    </div>

    <div class="mt-32 text-center">
        <i class="fa-solid fa-circle-plus"></i>
        <h3 class="mt-2 text-sm font-medium text-gray-900">No properties</h3>
        <p class="mt-1 text-sm text-gray-500">Get started by creating a new property.</p>
        <div class="mt-6">

            <x-button onclick="window.location.href='/property/{{Str::random(8)}}/create'">
                New Property
            </x-button>
        </div>
    </div>
    @else


    <div class="sm:flex sm:items-center mt-5">
        <div class="sm:flex-auto">
            <h1 class="text-left text-xl font-bold tracking-tight sm:text-xl lg:text-2xl">
                <span class="block  font-semibold text-gray-700">Welcome back,
                    <span class=" text-purple-900 font-bold ">{{ $firstName[0] }}!</span></span>
            </h1>
        </div>
        <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">

            @if($propertyView === 'list')
            <x-button wire:click="changePropertyView('thumbnail')">
                View as Thumbnail

            </x-button>
            @else
            <x-button wire:click="changePropertyView('list')">
                View Portfolio
            </x-button>
            @endif

            {{-- <x-button onclick="window.location.href='/user/{{ auth()->user()->id }}/export/portfolio'">Export
                Portfolio</x-button> --}}


            {{-- <x-button onclick="window.location.href='/property/{{Str::random(8)}}/create'">New Property</x-button>
            --}}


        </div>
    </div>

    <div class="mt-6 grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
        <div class="sm:col-span-6">

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
                <input type="search" id="search" wire:model="search"
                    class="bg-white block p-4 pl-10 w-full text-sm h-5 text-gray-90 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Search for property..." required>

            </div>

        </div>

        <div class="sm:col-span-2">
            <x-form-select name="filterByPropertyType" wire:model="filterByPropertyType">
                <option value="" selected>Filter by property type</option>
                @foreach ($propertyTypes as $item)
                <option value="{{ $item->type_id }}">{{ $item->type }}</option>
                @endforeach
            </x-form-select>

        </div>

        <div class="sm:col-span-2">
            <x-form-select name="sortBy" wire:model="sortBy">
                <option value="" selected>Sort property by</option>
                <option value="property">name</option>
                <option value="created_at">date created</option>
            </x-form-select>
        </div>

        <div class="sm:col-span-2">
            <x-form-select name="limitDisplayTo" wire:model="limitDisplayTo">
                <option value="" selected>Limit display to</option>
                @for ($i = 1; $i <= $userPropertyCount; $i++) @if($i%4==0 || $i==$userPropertyCount) <option
                    value="{{ $i }}">{{ $i }}</option>
                    @endif
                    @endfor
                    </x-select>
        </div>
    </div>

    <div class="mt-5 mb-5">
        {{ $properties->links() }}
    </div>
    @if($propertyView == 'thumbnail')
    <div class="mt-1 mb-5 grid grid-cols-5 gap-y-10 gap-x-6 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
        @foreach ($properties->where('status', 'active') as $property)
        <?php
            $propertyTypeLandingPage = App\Models\Feature::find(App\Models\Type::find( $property->type_id)->landing_page_feature_id)->alias;
            $propertyTypeIcon = App\Models\Type::find( $property->type_id)->icon;
            $propertyType = App\Models\Type::find( $property->type_id)->type;
        ?>
        <div class="group relative">
            <div class="w-full h-32 bg-white rounded-md overflow-hidden group-hover:opacity-75 lg:h-80 lg:aspect-none">
                <a href="/property/{{ $property->property_uuid }}/{{ $propertyTypeLandingPage }}">
                    <img src="{{ asset('/brands/'.$propertyTypeIcon) }}" title="{{ $propertyType }}" alt="building"
                        class="w-40 object-center object-cover lg:w-full lg:h-full">
                </a>
            </div>
            <h3 class="text-center mt-2">
                <a title="{{ $propertyType }}" class="text-blue-500 text-decoration-line: underline"
                    href="/property/{{ $property->property_uuid }}/{{ $propertyTypeLandingPage }}">
                    {{ Str::limit($property->property,15) }}
                </a>
            </h3>
        </div>
        @endforeach
    </div>
    @else
    <div class="mt-8 flex flex-col">
        <div class="-my-2 -mx-4 overflow-auto sm:-mx-6 lg:-mx-9">
            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">

                </div>
            </div>
        </div>
    </div>
    <div class="mt-8 flex flex-col">
        <div class="-my-2 -mx-4 overflow-auto sm:-mx-6 lg:-mx-9">
            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                    @include('tables.portfolio')
                </div>
            </div>
        </div>
    </div>
    @endif
    @endif
</div>