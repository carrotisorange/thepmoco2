<div class="py-2">
    <div class="max-w-12xl mx-auto sm:px-6 lg:px-8">
        <div class="mt-1">
            @if(App\Models\Bill::where('property_uuid',Session::get('property'))->count())
            @if($status || $end || $start || $particular_id || $created_at)
            <span>
                <x-button class="text-black-600 cursor-pointer" wire:click="resetFilters"><i
                        class="fa-solid fa-circle-xmark"></i>&nbsp
                    Clear filters</x-button>
            </span>

            @endif
            @endif

            @if($selectedBills)
            {{-- <x-button onclick="confirmMessage()" wire:click="deleteBills()"><i class="fa-solid fa-trash"></i>&nbsp
                Remove ({{ count($selectedBills) }})
            </x-button> --}}

            <?php
                $paid_bills = App\Models\Bill::whereIn('id', $selectedBills)->where('status', 'paid')->orWhere('status', 'partially_paid')->count()
            ?>

            @if($paid_bills)
            <x-button onclick="confirmMessage()" wire:click="unpayBills()"><i class="fa-solid fa-rotate-right"></i>&nbsp
                Mark as Unpaid ({{$paid_bills }})
            </x-button>
            @endif

            @endif

            <x-button data-modal-toggle="create-particular-modal">
                <i class="fa-solid fa-circle-plus"></i>&nbsp Particular
            </x-button>
            @can('billing')
            <x-button id="dropdownButton" data-dropdown-toggle="unitCreateDropdown" type="button"> <i
                    class="fa-solid fa-circle-plus"></i>&nbsp Bill <svg class="ml-2 w-4 h-4" fill="none"
                    stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                    </path>
                </svg></x-button>
            @endcan
            <!-- Dropdown menu -->
            <div id="unitCreateDropdown"
                class="text-left hidden z-10 w-30 text-base list-none bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700">
                <ul class="py-1" aria-labelledby="dropdownButton">

                    <li>
                        <a href="#/" data-modal-toggle="create-express-bill-modal"
                            class=" block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                            <i class="fa-solid fa-truck-fast"></i>&nbsp Express Bill
                        </a>
                    </li>
                    <li>
                        <a href="#/" data-modal-toggle="create-customized-bill-modal"
                            class=" block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                            <i class="fa-solid fa-file-pen"></i>&nbsp Customized Bill
                        </a>
                    </li>



                </ul>
            </div>
        </div>
        <div class="mt-3 mb-3">
            <x-search placeholder="search for reference no"></x-search>
        </div>
        @if(App\Models\Bill::where('property_uuid',Session::get('property'))->count())
        <div class="mt-3 p-6">
            @include('utilities.show-bill-filters')

        </div>
        @endif
        <div class="mt-2 mb-2">
            {{ $bills->links() }}
        </div>

        <div class="mt-5 bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="bg-white border-b border-gray-200">
                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="overflow-hidden sm:rounded-lg">
                            @if(App\Models\Bill::where('property_uuid',Session::get('property'))->count())
                            <div class="overflow-hidden sm:rounded-lg">
                                @include('utilities.show-bill-results') 
                            </div>
                            @endif
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('utilities.create-particular-modal')