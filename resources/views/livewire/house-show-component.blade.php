<?php
    $statusIcon = App\Models\Status::find($house_details->status_id)->alt_icon;
    $addAnchorClass = 'block py-2 px-4 text-sm
                                                    text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600
                                                    dark:text-gray-200 dark:hover:text-white';
?>

<div>
    @include('layouts.notifications')
    @include('modals.popup-error')
    <div class="mt-8 max-w-2xl mx-auto sm:px-6 lg:max-w-7xl lg:px-8">
        <div class="lg:grid lg:grid-cols-12 lg:auto-rows-min lg:gap-x-8">
            <div class="lg:col-start-4 lg:col-span-9">
                <h1 class="text-3xl font-bold text-gray-900">{{ $house_details->unit }}</h1>
            </div>
            <div class="lg:col-start-5 lg:col-span-9">
                <div class="flex justify-end">
                    <x-button id="dropdownButton" data-dropdown-toggle="unitCreateDropdown">Add
                        &nbsp; <i class="fa-solid fa-caret-down"></i>
                    </x-button>

                    <div id="unitCreateDropdown"
                        class="text-left hidden z-10 w-30 text-base list-none bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700">
                        <ul class="py-1" aria-labelledby="dropdownButton">
                            @if($house_details->is_the_unit_for_rent_to_tenant)
                            <li>
                                @if($house_details->occupancy >
                                $house_details->contracts()->where('status','active')->count())
                                <a href="/property/{{ Session::get('property_uuid') }}/unit/{{ $house_details->uuid }}/tenant/{{ Str::random(8) }}/create"
                                    class="{{ $addAnchorClass }}">
                                    New tenant
                                </a>
                                @else
                                <a href="#/" data-modal-toggle="warning-create-tenant-modal"
                                    class="{{ $addAnchorClass }}">
                                    New tenant
                                </a>
                                @endif
                            </li>
                            @endif

                            <li>
                                <a href="/property/{{ Session::get('property_uuid') }}/unit/{{ $house_details->uuid }}/owner/{{ Str::random(8) }}/create"
                                    class="{{ $addAnchorClass }}">
                                    New owner
                                </a>
                            </li>
                            <li>
                                <a href="/property/{{ Session::get('property_uuid') }}/unit/{{ $house_details->uuid }}/guest/{{ Str::random(8) }}/create"
                                    class="{{ $addAnchorClass }}">
                                    New guest
                                </a>
                            </li>
                            <li>
                                <a href="/property/{{ Session::get('property_uuid') }}/unit/{{ $house_details->uuid }}/concern/{{ Str::random(8) }}/create"
                                    class="{{ $addAnchorClass }}">
                                    New concern
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>

            <!-- Image gallery -->
            <div class="mt-8 lg:mt-0 lg:col-start-1 lg:col-span-3 lg:row-start-1 lg:row-span-3">
                <h2 class="sr-only">Images</h2>
                <div class="grid grid-cols-2 lg:gap-6">
                    <img src="{{ asset('/brands/'.$statusIcon) }}" alt="door"
                        class="lg:col-span-2 md:row-span-2 rounded-md" />

                    <div class="flex items-center justify-center ml-5">
                        {{-- <a href="#"
                            class="relative inline-flex items-center px-4 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:purple">Upload

                        </a> --}}
                    </div>
                </div>
            </div>

            <div class="mt-8 lg:col-span-9">
                <div class="mb-4 border-b border-gray-200 dark:border-gray-700">
                    <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="myTab"
                        data-tabs-toggle="#myTabContent" role="tablist">
                        @foreach($unitSubfeaturesArray as $subfeature)
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
                    @foreach($unitSubfeaturesArray as $subfeature)
                    @if($subfeature == 'house')
                    <div class="p-4 purple rounded-lg dark:bg-gray-800" id="{{ $subfeature }}" role="tabpanel"
                        aria-labelledby="{{ $subfeature }}-tab">
                        <div>
                            @include('forms.houses.house-edit')
                        </div>
                    </div>
                    @else
                    <div class="p-4 purple rounded-lg dark:bg-gray-800" id="{{ $subfeature }}" role="tabpanel"
                        aria-labelledby="{{ $subfeature }}-tab">
                        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                                <div
                                    class="mb-5 mt-2 relative overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">

                                    @if($subfeature == 'owner')

                                    @elseif($subfeature == 'guest')

                                    @elseif($subfeature == 'concern')

                                    @elseif($subfeature == 'utility')

                                    @elseif($subfeature == 'collection')

                                    @elseif($subfeature == 'bill')

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
</div>
