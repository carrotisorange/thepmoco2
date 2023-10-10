<?php
    $addAnchorClass = 'block py-2 px-4 text-sm
                                                    text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600
                                                    dark:text-gray-200 dark:hover:text-white';
?>

<div>
    @include('layouts.notifications')
    <div class="min-h-screen mt-8 max-w-2xl mx-auto pb-56 sm:px-20 lg:max-w-7xl lg:px-8">
        <div class="lg:grid lg:grid-cols-12 lg:gap-x-8">
            <div class="lg:col-start-4 lg:col-span-9">
                <h1 class="text-3xl font-bold text-black-900">{{ $tenant_details->tenant }}</h1>
            </div>
            <div class="lg:col-start-5 lg:col-span-9">
                <div class="flex justify-end">
                    <x-button id="dropdownButton" data-dropdown-toggle="tenantCreateDropdown" >Add
                       &nbsp; <i class="fa-solid fa-caret-down"></i>
                    </x-button>

                    <div id="tenantCreateDropdown"
                        class="text-left hidden z-10 w-30 text-base list-none bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700">
                        <ul class="py-1" aria-labelledby="dropdownButton">
                            <li>
                                <a href="/property/{{ Session::get('property_uuid') }}/tenant/{{ $tenant_details->uuid }}/bills"
                                    class="{{ $addAnchorClass }}">
                                    New bill
                                </a>
                            </li>

                            <li>
                                <a href="/property/{{ Session::get('property_uuid') }}/tenant/{{ $tenant_details->uuid }}/bills"
                                    class="{{ $addAnchorClass }}">
                                    New collection
                                </a>
                            </li>

                            @if($username)
                            <li>
                                <a href="/8/tenant/{{ $username }}/bill"
                                    class="{{$addAnchorClass}}">
                                    New payment request
                                </a>
                            </li>
                            @endif
                            <li>
                                <a href="#/" data-modal-toggle="create-concern-modal" class="{{ $addAnchorClass }}">
                                    New concern
                                </a>
                            </li>
                            <li>
                                <a href="/property/{{ Session::get('property_uuid') }}/tenant/{{ $tenant_details->uuid }}/units"
                                    class="{{ $addAnchorClass }}">
                                    New contract
                                </a>
                            </li>
                            <li>
                                <a href="#/" data-modal-toggle="create-guardian-modal"
                                    class="{{ $addAnchorClass }}">
                                    New guardian
                                </a>
                            </li>
                            <li>
                                <a href="#/" data-modal-toggle="create-reference-modal"
                                    class="{{ $addAnchorClass }}">
                                    New reference
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
                        @if($tenant_details->photo_id)
                        <img src="{{ asset('/storage/'.$tenant_details->photo_id) }}" alt="door"
                            class="lg:col-span-2 md:row-span-2 rounded-md w-56 lg:w-full">
                        @else
                        <img src="{{ asset('/brands/avatar.png') }}" alt="door"
                            class="lg:col-span-2 md:row-span-2 rounded-md w-56 lg:w-full">
                        @endif

                    </div>

                    <div class="mt-5 flex items-center justify-center">
                        <p class="mt-5 text-lg text-center text-gray-700">
                            @if(!$email_cred)
                            <x-button type="button" wire:click="sendCredentials">
                                Send access to tenant
                            </x-button>
                            @endif
                        </p>
                    </div>


                </div>
            </div>

            <div class="mt-8 lg:col-span-10">
                <div class="mb-4 border-b border-gray-200 dark:border-gray-700">
                    <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="myTab"
                        data-tabs-toggle="#myTabContent" role="tablist">
                        @foreach($tenantSubfeaturesArray as $subfeature)
                        <li class="mr-2" role="presentation">
                            <button class="inline-block p-4 rounded-t-lg border-b-2" id="{{ $subfeature }}-tab"
                                data-tabs-target="#{{ $subfeature }}" type="button" role="tab" aria-controls="{{ $subfeature }}"
                                aria-selected="false">
                                {{ $subfeature }}
                            </button>
                        </li>
                        @endforeach
                    </ul>
                </div>
                <div id="myTabContent" wire:ignore>
                    @foreach($tenantSubfeaturesArray as $subfeature)
                    @if($subfeature === 'tenant')
                    <div class="p-4 purple rounded-lg dark:bg-gray-800" id="{{ $subfeature }}" role="tabpanel"
                        aria-labelledby="{{ $subfeature }}-tab">
                        <div>
                           @include('forms.tenants.tenant-edit')
                        </div>
                    </div>
                    @else
                    <div class="p-4 purple rounded-lg dark:bg-gray-800" id="{{ $subfeature }}" role="tabpanel" aria-labelledby="{{ $subfeature }}-tab">
                        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                                <div class="mb-5 mt-2 relative overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                              @if($subfeature === 'credentials')
                            @if($email_cred)
                            <div class="sm:col-span-4">
                                <div class="">
                                    <x-label for="tenant">Email</x-label>
                                    <x-form-input type="text" value="{{ $email_cred }}" disabled />
                                </div>
                            </div>
                            <div class="sm:col-span-4 mt-8">
                                <div class="">
                                    <x-label for="tenant">Username</x-label>
                                    <x-form-input type="text" value="{{ $username }}" disabled />


                                </div>
                            </div>
                            @else
                            <div class="mt-10 text-center mb-10">
                                {{-- <i class="fa-solid fa-circle-plus"></i> --}}
                                <h3 class="mt-2 text-sm font-medium text-gray-900">No credentials.</h3>

                                <div class="mt-6">
                                    {{-- <x-button disabled>
                                        New session
                                    </x-button> --}}
                                </div>
                            </div>
                            @endif
                                @elseif($subfeature === 'session')
                                  @if($sessions->count())
                                @include('tables.sessions')
                                @else
                                <div class="mt-10 text-center mb-10">
                                   {{-- <i class="fa-solid fa-circle-plus"></i> --}}
                                    <h3 class="mt-2 text-sm font-medium text-gray-900">No sessions.</h3>

                                    <div class="mt-6">
                                     {{-- <x-button disabled>
                                        New session
                                    </x-button> --}}
                                    </div>
                                </div>
                                @endif

                               @elseif($subfeature === 'contract')
                                  @if($contracts->count())
                                @include('tables.contracts')
                                @else
                                <div class="mt-10 text-center mb-10">
                                   <i class="fa-solid fa-circle-plus"></i>
                                    <h3 class="mt-2 text-sm font-medium text-gray-900">No contracts.</h3>
                                    <p class="mt-1 text-sm text-gray-500">You're almost there!</p>
                                    <div class="mt-6">
                                     <x-button wire:click="redirectToTheCreateContractPage">
                                        New contract
                                    </x-button>
                                    </div>
                                </div>
                                @endif
                                @elseif($subfeature === 'guardian')
                                 @if($guardians->count())
                                @include('tables.guardians')
                                @else
                                <div class="mt-10 text-center mb-10">
                                   <i class="fa-solid fa-circle-plus"></i>
                                    <h3 class="mt-2 text-sm font-medium text-gray-900">No guardians</h3>
                                    <p class="mt-1 text-sm text-gray-500">You're almost there!</p>
                                    <div class="mt-6">
                                        <x-button data-modal-toggle="create-guardian-modal">

                                            New guardian
                                        </x-button>

                                    </div>
                                </div>
                                @endif
                                @elseif($subfeature === 'reference')
                                  @if($references->count())
                                @include('tables.references')
                                @else
                                <div class="mt-10 text-center mb-10">
                                   <i class="fa-solid fa-circle-plus"></i>
                                    <h3 class="mt-2 text-sm font-medium text-gray-900">No references</h3>
                                    <p class="mt-1 text-sm text-gray-500">You're almost there!</p>
                                    <div class="mt-6">
                                        <x-button wire:click="redirectToTheCreateReferencePage">

                                            New reference
                                        </x-button>

                                    </div>
                                </div>
                                @endif
                                @elseif($subfeature === 'concern')
                                 @if($concerns->count())
                                @include('tables.concerns')
                                @else
                                <div class=" mt-10 text-center mb-10">
                                    <i class="fa-solid fa-circle-plus"></i>
                                    <h3 class="mt-2 text-sm font-medium text-gray-900">No concerns</h3>
                                    <p class="mt-1 text-sm text-gray-500">You're almost there!</p>
                                    <div class="mt-6">
                                        <x-button data-modal-toggle="create-concern-modal">

                                            New concern
                                        </x-button>


                                    </div>
                                </div>
                                @endif
                                @elseif($subfeature === 'bill')
                                   @if($bills->count())
                                    <x-button onclick="window.location.href='/property/{{ Session::get('property_uuid') }}/tenant/{{ $tenant_details->uuid }}/bills'">
                                        Pay Bills
                                    </x-button>

                                @include('tables.bills')
                                @else
                                <div class=" mt-10 text-center mb-10">
                                   <i class="fa-solid fa-circle-plus"></i>
                                    <h3 class="mt-2 text-sm font-medium text-gray-900">No bills</h3>
                                    <p class="mt-1 text-sm text-gray-500">You're almost there!</p>
                                    <div class="mt-6">
                                         <x-button onclick="window.location.href='/property/{{ Session::get('property_uuid') }}/tenant/{{ $tenant_details->uuid }}/bills'">
                                            New bill
                                        </x-button>
                                    </div>
                                </div>
                                @endif

                                @elseif($subfeature === 'deposit')
                                 @if($wallets->count())
                                @include('tenants.tables.deposits')
                                @else
                                <div class=" mt-10 text-center mb-10">
                                   <i class="fa-solid fa-circle-plus"></i>
                                    <h3 class="mt-2 text-sm font-medium text-gray-900">No deposits</h3>
                                    <p class="mt-1 text-sm text-gray-500">Deposits are being added during move-in. </p>
                                    <div class="mt-6">

                                    </div>
                                </div>
                                @endif
                                @elseif($subfeature === 'collection')
                                 @if($collections->count())
                                @include('tables.collections')
                                @else
                                <div class=" mt-10 text-center mb-10">
                                    <i class="fa-solid fa-circle-plus"></i>
                                    <h3 class="mt-2 text-sm font-medium text-gray-900">No collections</h3>
                                    <p class="mt-1 text-sm text-gray-500">You're almost there!</p>
                                    <div class="mt-6">
                                       <x-button onclick="window.location.href='/property/{{ Session::get('property_uuid') }}/tenant/{{ $tenant_details->uuid }}/bills'">
                                            New collection
                                        </x-button>

                                    </div>
                                </div>
                                @endif
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
    @livewire('create-guardian-component', ['tenant'=> $tenant_details])
    @livewire('create-reference-component',['tenant'=> $tenant_details])
    @livewire('create-concern-component',['tenant'=> $tenant_details])
</div>
