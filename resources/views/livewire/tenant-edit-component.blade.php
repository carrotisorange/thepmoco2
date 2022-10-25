<div>
    @include('layouts.notifications')
    <div class="mt-8 max-w-2xl mx-auto sm:px-6 lg:max-w-7xl lg:px-8">
        <div class="lg:grid lg:grid-cols-12 lg:auto-rows-min lg:gap-x-8">
            <div class="lg:col-start-5 lg:col-span-9">

                <div class="flex justify-between">
                    <h1 class="text-3xl font-bold text-white">{{ $tenant_details->tenant }}</h1>
                    @can('tenantportal')
                    <button type="button"
                        onclick="window.location.href='/property/{{ Session::get('property') }}/tenant/unlock'"
                        class="inline-flex items-center px-3.5 py-2 border border-transparent text-sm leading-4 font-medium rounded-full shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Tenant Portal
                    </button>
                    @else
                    @if(!App\Models\User::where('email', $tenant_details->email)->count())
                    <button type="submit" wire:click="sendCredentials"
                        class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-purple-500 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">

                        <svg wire:loading wire:target="sendCredentials"
                            class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4">
                            </circle>
                            <path class="opacity-75" fill="currentColor"
                                d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                            </path>
                        </svg>
                        Send access to tenant portal
                    </button>
                    @else
                    <button type="submit" wire:click="removeCredentials"
                        class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-500 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">

                        <svg wire:loading wire:target="removeCredentials"
                            class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4">
                            </circle>
                            <path class="opacity-75" fill="currentColor"
                                d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                            </path>
                        </svg>
                        Remove access to tenant portal
                    </button>

                    @endif
                    @endcan


                </div>

            </div>

            <!-- Image gallery -->
            <div class="mt-8 lg:mt-0 lg:col-start-1 lg:col-span-4  lg:row-span-3">
                <h2 class="sr-only">Images</h2>

                <div class="flex items-center justify-center mr-5">
                    <img src="{{ asset('/brands/user.png') }}" alt="door"
                        class="h-56 lg:col-span-2 md:row-span-2 rounded-md">
                </div>
                {{-- <a href="#"
                    class="mt-10 relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">Change
                    username </a>
                <a href="#"
                    class="mt-10 relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">Change
                    password</a> --}}
                @if($tenant_details->photo_id)
                <a href="{{ asset('/storage/'.$tenant_details->photo_id) }}" target="_blank" class="mt-10 relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700
                                        bg-white hover:bg-gray-50">
                    View valid ID 1</a>
                @else
                <a href="#/"
                    class="mt-10 relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700
                                                                                                bg-white hover:bg-black-50">
                    Valid ID 2 is not available</a>
                @endif
                <br>
                @if($tenant_details->photo_id_2)
                <a href="{{ asset('/storage/'.$tenant_details->photo_id_2) }}" target="_blank" class="mt-10 relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700
                                                            bg-white hover:bg-gray-50">
                    View valid ID 2</a>
                @else
                <a href="#/" class="mt-10 relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700
                                                                            bg-white hover:bg-black-50">
                    Valid ID 2 is not available</a>
                @endif
                <br>
                @if($tenant_details->photo_id_2)
                <a href="{{ asset('/storage/'.$tenant_details->photo_id_2) }}" target="_blank" class="mt-10 relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700
                                                                                bg-white hover:bg-gray-50">
                    View valid ID 3</a>
                @else
                <a href="#/"
                    class="mt-10 relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700
                                                                                                bg-white hover:bg-black-50">
                    Valid ID 3 is not available</a>
                @endif



            </div>

            <div class="mt-2 lg:col-span-9">
                @include('forms.tenant-edit')
            </div>


            <section class="mb-10">
                <h1 class="mt-10 text-xl font-bold text-black">Contracts</h1>
                <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">



                    <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">

                        <div
                            class="mb-5 mt-2 relative overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                            <!-- Selected row actions, only show when rows are selected. -->
                            <div class="absolute top-0 left-12 flex h-12 items-center space-x-3 bg-gray-50 sm:left-16">

                            </div>

                            @include('admin.tables.contracts')

                        </div>

                        <div class="mt-8 flex justify-end">
                            @can('tenantportal')
                            <button type="button"
                                onclick="window.location.href='/property/{{ Session::get('property') }}/contract'"
                                class="inline-flex items-center px-3.5 py-2 border border-transparent text-sm leading-4 font-medium rounded-full shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                New Contract
                            </button>
                            @else
                            <button type="button"
                                onclick="window.location.href='/property/{{ Session::get('property') }}/tenant/{{ $tenant_details->uuid }}/units'"
                                class="inline-flex items-center px-3.5 py-2 border border-transparent text-sm leading-4 font-medium rounded-full shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">New
                                Contract</button>
                            @endif
                        </div>
            </section>

            <section class="mb-10">
                <h1 class="text-xl font-bold text-black">Bills</h1>
                <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">



                    <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">

                        <div
                            class="mb-5 mt-2 relative overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                            <!-- Selected row actions, only show when rows are selected. -->
                            <div class="absolute top-0 left-12 flex h-12 items-center space-x-3 bg-gray-50 sm:left-16">

                            </div>
                            @include('admin.tables.bills')
                        </div>

                        <div class="mt-8 flex justify-end">
                            @can('accountreceivable')
                            <button type="button"
                                onclick="window.location.href='/property/{{ Session::get('property') }}/bill'"
                                class="inline-flex items-center px-3.5 py-2 border border-transparent text-sm leading-4 font-medium rounded-full shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                View Bills
                            </button>
                            @else
                            <button type="button"
                                onclick="window.location.href='/property/{{ Session::get('property') }}/tenant/{{ $tenant_details->uuid}}/bills'"
                                class="inline-flex items-center px-3.5 py-2 border border-transparent text-sm leading-4 font-medium rounded-full shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">View
                                Bills</button>
                            @endif
                        </div>
            </section>

            <section class="mb-10">
                <h1 class="text-xl font-bold text-black">Guardians</h1>
                <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">



                    <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">

                        <div
                            class="mb-5 mt-2 relative overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                            <!-- Selected row actions, only show when rows are selected. -->
                            <div class="absolute top-0 left-12 flex h-12 items-center space-x-3 bg-gray-50 sm:left-16">

                            </div>

                            @include('admin.tables.guardians')
                        </div>
            </section>
            <section class="mb-10">
                <h1 class="text-xl font-bold text-black">References</h1>
                <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">

                    <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">

                        <div
                            class="mb-5 mt-2 relative overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                            <!-- Selected row actions, only show when rows are selected. -->
                            <div class="absolute top-0 left-12 flex h-12 items-center space-x-3 bg-gray-50 sm:left-16">

                            </div>

                            @include('admin.tables.references')
                        </div>
            </section>

            <section class="mb-10">
                <h1 class="text-xl font-bold text-black">Collections</h1>
                <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">



                    <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">

                        <div
                            class="mb-5 mt-2 relative overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                            <!-- Selected row actions, only show when rows are selected. -->
                            <div class="absolute top-0 left-12 flex h-12 items-center space-x-3 bg-gray-50 sm:left-16">

                            </div>
                            @include('admin.tables.collections')

                        </div>
                        <div class="mt-8 flex justify-end">
                            @can('accountreceivable')
                            <button type="button"
                                onclick="window.location.href='/property/{{ Session::get('property') }}/bill'"
                                class="inline-flex items-center px-3.5 py-2 border border-transparent text-sm leading-4 font-medium rounded-full shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                View Collections
                            </button>
                            @else
                            <button type="button"
                                onclick="window.location.href='/property/{{ Session::get('property') }}/tenant/{{ $tenant_details->uuid }}/collections'"
                                class="inline-flex items-center px-3.5 py-2 border border-transparent text-sm leading-4 font-medium rounded-full shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                View Collections</button>
                            @endif
                        </div>
            </section>
        </div>
    </div>

</div>