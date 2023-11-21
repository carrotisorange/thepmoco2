<?php $name = auth()->user()->name;
    $firstName = explode(" ",$name);
?>
<div>
    @if(!$userPropertyCount)
    <div class="mt-10">
        <nav class="mx-auto max-w-9xl px-4 sm:px-6 lg:px-8" aria-label="Progress">
            <ol role="list"
                class="overflow-hidden rounded-md lg:flex lg:rounded-none lg:border-l lg:border-r lg:border-gray-200">
                @foreach($steps as $index => $item)
                <li class="relative overflow-hidden lg:flex-1">
                    <div class="border border-gray-200 overflow-hidden border-b-0 rounded-t-md lg:border-0">
                        @if($item == 'property')
                        <x-current-step-stepper-component index="{{ $index+1 }}"
                            link="/property/"
                            subfeature="{{ $item }}" />
                        @else
                        <x-next-step-stepper-component index="{{ $index+1 }}"
                            link="#/"
                            subfeature="{{ $item }}" />
                        @include('layouts.separator')
                        @endif
                    </div>
                </li>
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
                View as List
            </x-button>
            @endif
            <x-button onclick="window.location.href='/property/{{Str::random(8)}}/create'">New Property</x-button>
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

        <div class="sm:col-span-3">
            <x-form-select name="filterByPropertyType" wire:model="filterByPropertyType">
                <option value="" selected>Filter property</option>
                @foreach ($propertyTypes as $item)
                <option value="{{ $item->type_id }}">{{ $item->type }}</option>
                @endforeach
            </x-form-select>
        </div>

        <div class="sm:col-span-3">
            <x-form-select name="sortBy" wire:model="sortBy">
                <option value="" selected>Sort property</option>
                <option value="property">name</option>
                <option value="created_at">date created</option>
            </x-form-select>
        </div>
    </div>

    <div class="mt-5 mb-5">
        <p class="text-sm text-gray-700">
            Showing
            <span class="font-medium">{{ $properties->count() }}</span>
            of
            <span class="font-medium">{{ $userPropertyCount }}</span>
            properties
        </p>
    </div>

    @if($propertyView == 'thumbnail')
    <div class="max-w-2xl mx-auto py-8 px-4 sm:px-6 lg:max-w-7xl lg:px-8 mb-24">
        <div class="mt-6 grid grid-cols-1 gap-x-8 gap-y-8 sm:grid-cols-2 sm:gap-y-10 lg:grid-cols-6">
            @foreach ($properties->where('status', 'active') as $property)
            <?php
                    $propertyTypeLandingPage = App\Models\Feature::find(App\Models\Type::find( $property->type_id)->landing_page_feature_id)->alias;
                    $propertyTypeIcon = App\Models\Type::find( $property->type_id)->icon;
                    $propertyType = App\Models\Type::find( $property->type_id)->type;
                ?>
            <a href="/property/{{ $property->property_uuid }}/{{ $propertyTypeLandingPage }}">
                <div class="hover:bg-purple-200">
                    <img src="{{ asset('/brands/'.$propertyTypeIcon) }}" title="{{ $property->property }}"
                        class="object-center object-cover aspect-w-4 aspect-h-3 rounded-lg overflow-hidden">
                    <h3 class="text-center mt-2">{{ Str::limit($property->property,25) }}</h3>
                </div>
            </a>
            @endforeach
        </div>
    </div>
    @else
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
