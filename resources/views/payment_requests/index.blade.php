<x-new-layout>
    <div class="mt-8">
        <div class="max-full mx-auto sm:px-6">
            <div>
                <div class="sm:flex sm:items-center">
                    <div class="sm:flex-auto">
                       <h1 class="text-3xl font-bold text-gray-500" wire:ignore>
                            {{ucfirst(Route::current()->getName())}}
                        </h1>
                    </div>
                    <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
                        <div class="group inline-block">
                            <x-button>Filter</span>
                                &nbsp; <i class="fa-solid fa-caret-down"></i>
                            </x-button>
                            <ul
                                class="text-left z-50 bg-white border rounded-sm transform scale-0 group-hover:scale-100 absolute transition duration-150 ease-in-out origin-top min-w-32">
                                <li class="rounded-sm px-3 py-1 hover:bg-gray-100">
                                    <a href="/property/{{ Session::get('property_uuid') }}/collection/{{ 'pending' }}">Pending</a>
                                </li>
                                <li class="rounded-sm px-3 py-1 hover:bg-gray-100">
                                    <a href="/property/{{ Session::get('property_uuid') }}/collection/{{ 'approved' }}">Approved </a>
                                </li>
                                <li class="rounded-sm px-3 py-1 hover:bg-gray-100">
                                    <a href="/property/{{ Session::get('property_uuid') }}/collection/{{ 'declined' }}">Declined
                                    </a>
                                </li>
                            </ul>
                        </div>


                    </div>
                </div>

                <div class="mt-6 grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">


                </div>
                <div class="-my-2 -mx-4 overflow-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">

                        <div  class="mb-5 mt-2 relative overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                            @include('tables.verifypayments')

                        </div>

                    </div>
                </div>
            </div>


        </div>
    </div>
</x-new-layout>
