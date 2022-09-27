<x-new-layout>
    @section('title','Contracts | '. Session::get('property_name'))
    @if(auth()->user()->user_type == '0')
    <div class="mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex min-h-full flex-col bg-white lg:relative">
            <div class="flex flex-grow flex-col">
                <main class="flex flex-grow flex-col bg-white">
                    <div class="mx-auto flex w-full max-w-7xl flex-grow flex-col px-4 sm:px-6 lg:px-8">

                        <div class="my-auto flex-shrink-0 py-16 sm:py-8">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="inline-block w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z" />
                            </svg>
                            <h1 class="mt-2 text-4xl font-bold tracking-tight text-gray-800 sm:text-4xl">
                                Contract Feature Locked</h1>
                            <p class="mt-2 text-base text-purple-500">Unlock this feature for only <span
                                    class="font-bold text-xl">₱300/month!</span></p>
                            <p class="mt-5 text-sm max-w-lg text-gray-600">Lease Contracts are the backbone
                                of a rental property business. This defines the obligations of the landlord
                                or property owner to provide the space to the tenant for the duration of the
                                contract for a fee and the tenants obligations to the landlord and the
                                property for the duration of the lease period. It's best practice to have a
                                written lease agreement between landlord and tenant that both parties have
                                copies of or have access to. </p>
                            <ul class="mt-5 text-sm max-w-lg font-md">

                                <li class=" mb-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor"
                                        class="text-green-800 w-5 h-5 inline-block">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>

                                    upload lease contracts for easy access anytime, anywhere
                                </li>



                                <li class=" mb-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor"
                                        class="text-green-800 w-5 h-5 inline-block">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    helps keep track of all leases
                                </li>







                                <li class=" mb-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor"
                                        class="text-green-800 w-5 h-5 inline-block">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    help landlords renew lease/advertise space to reduce vacancy periods
                                </li>


                                <li class=" mb-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor"
                                        class="text-green-800 w-5 h-5 inline-block">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>

                                    editable lease contract template available for use
                                </li>

                                <li class=" max-w-md mb-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor"
                                        class="text-green-800 w-5 h-5 inline-block">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    gets tenant notified of expiring contracts (available to Tenant through
                                    <a href="tenant-portal-lock" class="font-bold text-purple-700">TENANT
                                        PORTAL</a> for moveout request/renewal of contract)
                                </li>

                            </ul>
                            <div class="mt-8">
                                <div>
                                    <button type="submit"
                                        class="w-48 flex justify-center py-3 px-4 border border-transparent rounded-full shadow-sm text-sm font-medium text-white bg-purple-700 hover:bg-purple-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"><a
                                            href="check-page">Unlock now</a></button>

                                </div>
                            </div>
                        </div>
                    </div>
                </main>

            </div>
            <div class="hidden lg:absolute lg:inset-y-0 lg:right-0 lg:block lg:w-md">
                <img class="mt-20 h-80 w-fit" src="{{ asset('/brands/contracts.png') }}" alt="contracts feature">
            </div>
        </div>
    </div>
    @else

    <div class="mt-10 px-4 sm:px-6 lg:px-8">
        <div class="sm:flex sm:items-center">
            <div class="sm:flex-auto">
                <h1 class="text-3xl font-bold text-gray-700">Contracts</h1>
            </div>
            <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">

                <button type="button" onclick="window.location.href='/property/{{ Session::get('property') }}/unit'"
                    class="inline-flex items-center justify-center rounded-md border border-transparent bg-indigo-500 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto">
                    New Contract</button>

            </div>
        </div>


        <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">

                <div class="mb-5 mt-2 relative overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                    <!-- Selected row actions, only show when rows are selected. -->
                    <div class="absolute top-0 left-12 flex h-12 items-center space-x-3 bg-gray-50 sm:left-16">

                    </div>
                    @include('admin.tables.contracts')
                </div>
                {{-- <button type="button"
                    class="mb-5 inline-flex items-center rounded border border-gray-300 bg-white px-2.5 py-1.5 text-xs font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-30">Select
                    All</button> --}}
            </div>
        </div>
    </div>

    <div class="px-4 mt-5 py-3 flex items-center justify-between border-t border-gray-200 sm:px-6">
        {{-- {{ $contracts->links() }} --}}
    </div>
    @endif

</x-new-layout>

{{-- <x-app-layout>
    @livewire('tenant-index-component')
</x-app-layout> --}}