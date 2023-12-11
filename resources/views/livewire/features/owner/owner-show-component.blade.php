<?php
    $addAnchorClass = 'block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white';
?>
<div>
    <div class="mt-8 max-w-2xl mx-auto sm:px-6 lg:max-w-7xl lg:px-8">
        <div class="lg:grid lg:grid-cols-12 lg:auto-rows-min lg:gap-x-8">
            <div class="lg:col-start-4 lg:col-span-9">
                <h1 class="text-3xl font-bold text-gray-900">{{ $owner_details->owner }}</h1>
            </div>
            <div class="lg:col-start-5 lg:col-span-9">
                <div class="flex justify-end">
                    <x-button id="dropdownButton" data-dropdown-toggle="ownerCreateDropdown">Add
                        &nbsp; <i class="fa-solid fa-caret-down"></i>
                    </x-button>
                    <div id="ownerCreateDropdown" class="text-left hidden z-10 w-30 text-base list-none bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700">
                        <ul class="py-1" aria-labelledby="dropdownButton">
                            <li>
                                <a href="/property/{{ Session::get('property_uuid') }}/owner/{{ $owner_details->uuid }}/unit"
                                    class="{{ $addAnchorClass }}">
                                     Unit
                                </a>
                            </li>
                            <li>
                                <a href="/property/{{ Session::get('property_uuid') }}/owner/{{ $owner_details->uuid }}/representative/create"
                                    class="{{ $addAnchorClass }}">
                                     Representative
                                </a>
                            </li>
                            <li>
                                <a href="#/" data-modal-toggle="bank-create-modal" class="{{ $addAnchorClass }}">
                                     Bank
                                </a>
                            </li>
                            <li>
                                <a href="/property/{{ Session::get('property_uuid') }}/owner/{{ $owner_details->uuid }}/bills"  class="{{ $addAnchorClass }}">
                                     Bill
                                </a>
                            </li>
                            <li>
                                <a href="/property/{{ Session::get('property_uuid') }}/owner/{{ $owner_details->uuid }}/bills" class="{{ $addAnchorClass }}">
                                    {{ csrf_field() }}ollection
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="mt-8 lg:mt-0 lg:col-start-1 lg:col-span-3 lg:row-start-1 lg:row-span-3">
                <h2 class="sr-only">Images</h2>
                <div class="grid grid-cols-1 lg:gap-6">
                    <div class="flex items-center justify-center">
                        @if($owner_details->photo_id)
                        <img src="{{ asset('/storage/'.$owner_details->photo_id) }}" alt="door"
                            class="lg:col-span-2 md:row-span-2 rounded-md w-56 lg:w-full">
                        @else
                        <img src="{{ asset('/brands/avatar.png') }}" alt="door"
                            class="lg:col-span-2 md:row-span-2 rounded-md w-56 lg:w-full">
                        @endif
                    </div>
                    <div class="mt-5 flex items-center justify-center">
                        <p class="mt-5 text-lg text-center text-gray-700">
                            @if(!$email_cred)
                            <x-button wire:click="sendCredentials">
                                Send access to owner
                            </x-button>
                            @endif
                        </p>
                    </div>
                </div>
            </div>
            <div class="mt-8 lg:col-span-10" wire:ignore>
                <div class="mb-4 border-b border-gray-200 dark:border-gray-700">
                    <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="myTab"
                        data-tabs-toggle="#myTabContent" role="tablist">
                        @foreach($ownerSubfeaturesArray as $subfeature)
                        <li class="mr-2" role="presentation">
                            <button class="inline-block p-4 rounded-t-lg border-b-2" id="{{ $subfeature }}-tab"  data-tabs-target="#{{ $subfeature }}" type="button" role="tab" aria-controls="{{ $subfeature }}" aria-selected="false">
                                {{ $subfeature }}
                            </button>
                        </li>
                        @endforeach
                    </ul>
                </div>
                <div id="myTabContent" wire:ignore>
                    @foreach($ownerSubfeaturesArray as $subfeature)
                    @if($subfeature == 'owner')
                    <div class="p-4 purple rounded-lg dark:bg-gray-800" id="{{ $subfeature }}" role="tabpanel" aria-labelledby="{{ $subfeature }}-tab">
                        <div>
                            @include('forms.owners.owner-edit')
                        </div>
                    </div>
                    @else
                    <div class="p-4 purple rounded-lg dark:bg-gray-800" id="{{ $subfeature }}" role="tabpanel"
                        aria-labelledby="{{ $subfeature }}-tab">
                        <div class="-my-2 overflow-auto sm:-mx-6 lg:-mx-8">
                            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                                <div class="mb-5 mt-2 relative overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                                    @if($subfeature == 'credentials')
                                    @if($email_cred)
                                    <div class="sm:col-span-4">
                                        <div class="">
                                            <x-label for="tenant">Email</x-label>
                                            <x-form-input type="text" value="{{ $email_cred }}" disabled />
                                        </div>
                                    </div>
                                    <div class="sm:col-span-4 mt-8">
                                            <x-label for="tenant">Username</x-label>
                                            <x-form-input type="text" value="{{ $username }}" disabled />
                                    </div>
                                    @else
                                    <div class="mt-10 text-center mb-10">
                                        <h3 class="mt-2 text-sm font-medium text-gray-900">No {{ $subfeature }}</h3>
                                    </div>
                                    @endif
                                    @elseif($subfeature == 'session')
                                    @if($sessions->count())
                                    @include('tables.sessions')
                                    @else
                                    <div class="mt-10 text-center mb-10">
                                        <h3 class="mt-2 text-sm font-medium text-gray-900">No {{ $subfeature }}</h3>
                                    </div>
                                    @endif
                                    @elseif($subfeature == 'unit')
                                    @include('tables.deedofsales')
                                    @elseif($subfeature == 'spouse')
                                    @if($spouses->count())
                                    @include('tables.spouses')
                                    @else
                                    <div class="mt-10 text-center mb-10">
                                        <h3 class="mt-2 text-sm font-medium text-gray-900">No {{ $subfeature }}</h3>
                                    </div>
                                    @endif
                                    @elseif($subfeature == 'representative')
                                    @if($representatives->count())
                                    @include('tables.representatives')
                                    @else
                                    <div class="mt-10 text-center mb-10">
                                        <h3 class="mt-2 text-sm font-medium text-gray-900">No {{ $subfeature }}</h3>
                                    </div>
                                    @endif
                                    @elseif($subfeature == 'bill')
                                    <x-button onclick="window.location.href='/property/{{ Session::get('property_uuid') }}/owner/{{ $owner_details->uuid }}/bills'">
                                        Pay Bills
                                    </x-button>
                                    @include('tables.bills')
                                    @elseif($subfeature == 'collection')
                                    @if($collections->count())
                                    @include('tables.collections')
                                    @else
                                    <div class="mt-10 text-center mb-10">
                                        <h3 class="mt-2 text-sm font-medium text-gray-900">No {{ $subfeature }}</h3>
                                    </div>
                                    @endif
                                    @elseif($subfeature == 'bank')
                                        @include('tables.banks')
                                
                                    @elseif($subfeature == 'violation')
                                        @include('tables.violations')
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
   @livewire('bank-create-component',['owner'=> $owner_details])
</div>
