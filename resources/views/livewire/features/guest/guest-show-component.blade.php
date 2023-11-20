<?php
    $addAnchorClass = 'block py-2 px-4 text-sm
                                                    text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600
                                                    dark:text-gray-200 dark:hover:text-white';
?>
<div>

    <div class="mt-8 max-w-2xl mx-auto sm:px-6 lg:max-w-7xl lg:px-8">
        <div class="lg:grid lg:grid-cols-12 lg:auto-rows-min lg:gap-x-8">
            <div class="lg:col-start-4 lg:col-span-9">
                <h1 class="text-3xl font-bold text-gray-900">{{ $guest_details->guest }}</h1>
            </div>
            <div class="lg:col-start-5 lg:col-span-9">
                <div class="flex justify-end">
                    <x-button id="dropdownButton" data-dropdown-toggle="guestCreateDropdown">Add
                        &nbsp; <i class="fa-solid fa-caret-down"></i>
                    </x-button>

                    <div id="guestCreateDropdown"
                        class="text-left hidden z-10 w-30 text-base list-none bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700">
                        <ul class="py-1" aria-labelledby="dropdownButton">
                            <li>
                                <a href="#/" data-modal-toggle="create-bill-modal" class="{{ $addAnchorClass }}">
                                    New bill
                                </a>
                            </li>

                            <li>
                                <a href="#/" data-modal-toggle="create-booking-modal" class="{{ $addAnchorClass }}">
                                    New booking
                                </a>
                            </li>
                            <li>
                                <a href="/property/{{ $this->guest_details->property_uuid }}/guest/{{ $guest_details->uuid }}/bills"
                                    class="{{$addAnchorClass}}">
                                    New collection
                                </a>
                            </li>

                        </ul>
                    </div>

                </div>

            </div>

            <div class="mt-8 lg:mt-0 lg:col-start-1 lg:col-span-3 lg:row-start-1 lg:row-span-3">
                <h2 class="sr-only">Images</h2>

                <div class="grid grid-cols-1 lg:gap-6">
                    <img src="{{ asset('/brands/avatar.png') }}" alt="door"
                        class="lg:col-span-2 md:row-span-2 rounded-md">

                    <div class="mt-5 flex items-center justify-center">

                    </div>
                </div>
            </div>

            <div class="mt-8 lg:col-span-9">
                <div class="mb-4 border-b border-gray-200 dark:border-gray-700">
                    <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="myTab"
                        data-tabs-toggle="#myTabContent" role="tablist">
                        @foreach($guestSubfeaturesArray as $subfeature)
                        <li class="mr-2" role="presentation">
                            <button class="inline-block p-4 rounded-t-lg border-b-2" id="{{ $subfeature }}-tab"
                                data-tabs-target="#{{ $subfeature }}" type="button" role="tab"
                                aria-controls="{{ $subfeature }}" aria-selected="false">
                                {{ $subfeature }}
                            </button>
                        </li>
                        @endforeach
                    </ul>
                </div>
                <div id="myTabContent" wire:ignore>
                    @foreach($guestSubfeaturesArray as $subfeature)
                    @if($subfeature == 'guest')
                    <div class="p-4 purple rounded-lg dark:bg-gray-800" id="{{ $subfeature }}" role="tabpanel"
                        aria-labelledby="{{ $subfeature }}-tab">
                        <div>
                            @include('forms.guests.guest-edit')
                        </div>
                    </div>
                    @else
                    <div class="p-4 purple rounded-lg dark:bg-gray-800" id="{{ $subfeature }}" role="tabpanel"
                        aria-labelledby="{{ $subfeature }}-tab">
                        <div class="-my-2 overflow-auto sm:-mx-6 lg:-mx-8">
                            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                                <div
                                    class="mb-5 mt-2 relative overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                                    @if($subfeature == 'booking')
                                    @if($bookings->count())
                                    @include('tables.bookings')
                                    @else
                                    <div class="mt-10 text-center mb-10">
                                        <i class="fa-solid fa-circle-plus"></i>
                                        <h3 class="mt-2 text-sm font-medium text-gray-900">No bookings</h3>
                                        <p class="mt-1 text-sm text-gray-500">You're almost there!</p>
                                        <div class="mt-6">
                                            <button type="button" data-modal-toggle="create-additional-guest-modal"
                                                class="inline-flex items-center rounded-md border border-transparent bg-purple-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2">


                                                New booking
                                            </button>

                                        </div>
                                    </div>
                                    @endif
                                    @elseif($subfeature == 'bill')
                                    @if($bills->count())
                                    <x-button
                                        onclick="window.location.href='/property/{{ Session::get('property_uuid') }}/guest/{{ $guest_details->uuid }}/bills'">

                                        Pay Bills
                                    </x-button>

                                    {{-- <x-button data-modal-toggle="create-bill-modal">
                                        New Bill</x-button>

                                    <x-button data-modal-toggle="create-particular-modal">
                                        Add Particular</x-button> --}}
                                    @include('tables.bills')
                                    @else
                                    <div class=" mt-10 text-center mb-10">
                                        <i class="fa-solid fa-circle-plus"></i>
                                        <h3 class="mt-2 text-sm font-medium text-gray-900">No bills</h3>
                                        <p class="mt-1 text-sm text-gray-500">You're almost there!</p>
                                        <div class="mt-6">
                                            <button type="button" data-modal-toggle="create-bill-modal"
                                                class="inline-flex items-center rounded-md border border-transparent bg-purple-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2">


                                                Create first bill
                                            </button>

                                        </div>
                                    </div>
                                    @endif
                                    @elseif($subfeature == 'collection')
                                    @include('tables.collections')
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                    @endforeach
                </div>
            </div>

        </div>
    </div>
    @include('modals.create-additional-guest-modal')
    @include('modals.create-booking-modal')
    @include('modals.warnings.destroy-guest-modal')
    @livewire('create-particular-component', [ 'guest' => $guest_details])
    @livewire('create-bill-component', ['bill_to' => $guest_details])
</div>
