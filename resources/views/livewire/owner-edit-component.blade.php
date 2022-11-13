<div>
    @include('layouts.notifications')
    <div class="h-full w-full bg-no-repeat bg-cover" style="background-image: url('/brands/profile_bg.png');">
        <div class="mx-auto px-4 sm:px-6 lg:px-8">

            <div class="pt-6 sm:pb-5">

                <nav aria-label="Breadcrumb" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <ol role="list" class="flex items-center space-x-4">
                        <li>
                            <div class="flex items-center">
                                <a href="{{ url()->previous() }}"><img class="h-5 w-auto"
                                        src="{{ asset('/brands/back-button.png') }}"></a>
                            </div>
                        </li>
                    </ol>
                </nav>

                <div class="mt-8 max-w-2xl mx-auto sm:px-6 lg:max-w-7xl lg:px-8">
                    <div class="lg:grid lg:grid-cols-12 lg:auto-rows-min lg:gap-x-8">
                        <div class="lg:col-start-5 lg:col-span-9">

                            <div class="flex justify-between">
                                <h1 class="text-3xl font-bold text-white">{{ $owner_details->owner }}</h1>
                                @can('ownerportal')
                                <button type="button"
                                    onclick="window.location.href='/property/{{ Session::get('property') }}/owner/unlock'"
                                    class="inline-flex items-center px-3.5 py-2 border border-transparent text-sm leading-4 font-medium rounded-full shadow-sm text-white bg-purple-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    Send access to owner portal
                                </button>
                                @else
                                @if(!App\Models\User::where('email', $owner_details->email)->count())
                                <button type="submit" wire:click="sendCredentials"
                                    class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-purple-500 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">

                                    <svg wire:loading wire:target="sendCredentials"
                                        class="animate-spin -ml-1 mr-3 h-5 w-5 text-white"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                            stroke-width="4">
                                        </circle>
                                        <path class="opacity-75" fill="currentColor"
                                            d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                        </path>
                                    </svg>
                                    Send access to owner portal
                                </button>
                                @else
                                <button type="submit" wire:click="removeCredentials"
                                    class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-500 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">

                                    <svg wire:loading wire:target="removeCredentials"
                                        class="animate-spin -ml-1 mr-3 h-5 w-5 text-white"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                            stroke-width="4">
                                        </circle>
                                        <path class="opacity-75" fill="currentColor"
                                            d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                        </path>
                                    </svg>
                                    Remove access to owner portal
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

                            @if(App\Models\User::where('email', $owner_details->email)->count())
                            @foreach ($credentials as $credential)
                            <p class="mt-5 text-lg text-center text-white">
                                username:
                                <span class="font-bold">{{ $credential->username }}</span>
                            </p>


                            <div class="mt-5 flex items-center justify-center">
                                <button type="submit" wire:click="resetPassword"
                                    class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-purple-500 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">

                                    <svg wire:loading wire:target="resetPassword"
                                        class="animate-spin -ml-1 mr-3 h-5 w-5 text-white"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                            stroke-width="4">
                                        </circle>
                                        <path class="opacity-75" fill="currentColor"
                                            d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                        </path>
                                    </svg>
                                    Reset Password
                                </button>
                            </div>
                            {{-- <div class="flex items-center justify-center">
                                <a href="change-password"
                                    class="mt-5 relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">Change
                                    password</a>
                            </div> --}}

                            @endforeach
                            @endif


                        </div>

                        <div class="mt-2 lg:col-span-9">
                            @include('forms.owners.owner-edit')
                        </div>

                        <section class="mb-10">
                            <h1 class="text-xl font-bold text-black">Units</h1>
                            <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">



                                <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">

                                    <div
                                        class="mb-5 mt-2 relative overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                                        <!-- Selected row actions, only show when rows are selected. -->
                                        <div
                                            class="absolute top-0 left-12 flex h-12 items-center space-x-3 bg-gray-50 sm:left-16">

                                        </div>

                                        @include('portals.owners.tables.deedofsales')

                                    </div>
                                    <div class="mt-8 flex justify-end">
                                        <button type="button"
                                            onclick="window.location.href='/property/{{ Session::get('property') }}/owner/{{ $owner_details->uuid }}/unit'"
                                            class="inline-flex items-center px-3.5 py-2 border border-transparent text-sm leading-4 font-medium rounded-full shadow-sm text-white bg-purple-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">New
                                            unit</button>
                                    </div>

                        </section>


                        <section class="mb-10">
                            <h1 class="mt-10 text-xl font-bold text-black">Representatives</h1>
                            <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">



                                <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">

                                    <div
                                        class="mb-5 mt-2 relative overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                                        <!-- Selected row actions, only show when rows are selected. -->
                                        <div
                                            class="absolute top-0 left-12 flex h-12 items-center space-x-3 bg-gray-50 sm:left-16">

                                        </div>

                                        @include('portals.owners.tables.representatives')

                                    </div>
                                    <div class="mt-8 flex justify-end">
                                        <button type="button"
                                            onclick="window.location.href='/property/{{ Session::get('property') }}/owner/{{ $owner_details->uuid }}/representative/create'"
                                            class="inline-flex items-center px-3.5 py-2 border border-transparent text-sm leading-4 font-medium rounded-full shadow-sm text-white bg-purple-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">New
                                            representative</button>
                                    </div>

                        </section>
                        <section class="mb-10">
                            <h1 class="mt-10 text-xl font-bold text-black">Bills</h1>
                            <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">



                                <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">

                                    <div
                                        class="mb-5 mt-2 relative overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                                        <!-- Selected row actions, only show when rows are selected. -->
                                        <div
                                            class="absolute top-0 left-12 flex h-12 items-center space-x-3 bg-gray-50 sm:left-16">

                                        </div>

                                        @include('portals.owners.tables.bills')

                                    </div>
                                    <div class="mt-8 flex justify-end">
                                        <button type="button"
                                            onclick="window.location.href='/property/{{ Session::get('property') }}/owner/{{ $owner_details->uuid }}/bills'"
                                            class="inline-flex items-center px-3.5 py-2 border border-transparent text-sm leading-4 font-medium rounded-full shadow-sm text-white bg-purple-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">View
                                            bills</button>
                                    </div>

                        </section>

                        <section class="mb-10">
                            <h1 class="mt-10 text-xl font-bold text-black">Payments</h1>
                            <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">



                                <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">

                                    <div
                                        class="mb-5 mt-2 relative overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                                        <!-- Selected row actions, only show when rows are selected. -->
                                        <div
                                            class="absolute top-0 left-12 flex h-12 items-center space-x-3 bg-gray-50 sm:left-16">

                                        </div>

                                        @include('portals.owners.tables.payments')

                                    </div>
                                    <div class="mt-8 flex justify-end">
                                        <button type="button"
                                            onclick="window.location.href='/property/{{ Session::get('property') }}/owner/{{ $owner_details->uuid }}/collections'"
                                            class="inline-flex items-center px-3.5 py-2 border border-transparent text-sm leading-4 font-medium rounded-full shadow-sm text-white bg-purple-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">View
                                            payments</button>
                                    </div>

                        </section>




                        <section class="mb-10">
                            <h1 class="text-xl font-bold text-black">Banks</h1>
                            <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">



                                <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">

                                    <div
                                        class="mb-5 mt-2 relative overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                                        <!-- Selected row actions, only show when rows are selected. -->
                                        <div
                                            class="absolute top-0 left-12 flex h-12 items-center space-x-3 bg-gray-50 sm:left-16">

                                        </div>

                                        @include('portals.owners.tables.banks')

                                    </div>
                                    <div class="mt-8 flex justify-end">
                                        <button type="button"
                                            onclick="window.location.href='/property/{{ Session::get('property') }}/owner/{{ $owner_details->uuid }}/bank/create'"
                                            class="inline-flex items-center px-3.5 py-2 border border-transparent text-sm leading-4 font-medium rounded-full shadow-sm text-white bg-purple-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">New
                                            bank</button>
                                    </div>

                        </section>



                        <section class="mb-10">
                            <h1 class="text-xl font-bold text-black">Guests</h1>
                            <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">



                                <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">

                                    <div
                                        class="mb-5 mt-2 relative overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                                        <!-- Selected row actions, only show when rows are selected. -->
                                        <div
                                            class="absolute top-0 left-12 flex h-12 items-center space-x-3 bg-gray-50 sm:left-16">

                                        </div>



                                    </div>
                                    <div class="mt-8 flex justify-end">

                                    </div>
                        </section>


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>