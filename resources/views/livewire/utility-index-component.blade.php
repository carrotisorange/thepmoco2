<div>

    <style>
        li>ul {
            transform: translatex(100%) scale(0)
        }

        li:hover>ul {
            transform: translatex(50%) scale(1)
        }

        li>button svg {
            transform: rotate(-90deg)
        }

        li:hover>button svg {
            transform: rotate(-270deg)
        }

        .group:hover .group-hover\:scale-100 {
            transform: scale(1)
        }

        .group:hover .group-hover\:-rotate-180 {
            transform: rotate(180deg)
        }

        .scale-0 {
            transform: scale(0)
        }

        .min-w-32 {
            min-width: 8rem
        }
    </style>
    <div class="mt-10 px-4 sm:px-6 lg:px-8">
        <div class="sm:flex sm:items-center">
            <div class="sm:flex-auto">
                <h1 class="text-3xl font-bold text-gray-700">
                    {{ucfirst(Route::current()->getName())}}
                </h1>
            </div>
            <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
                @if($date_created || $search || $type || $status)
                <x-button wire:click="clearFilters">
                    Clear Filters
                </x-button>
                @endif

                <div class="group inline-block">
                    <span>
                        <x-button data-modal-toggle="instructions-create-utility-modal">
                            New utilities
                            <span>


                            </span>
                        </x-button>

                    </span>

                </div>

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
                        placeholder="Search for unit..." required>

                </div>

            </div>

            <div class="sm:col-span-2">
                <x-form-select id="date_created" wire:model="filter_date">
                    <option value="">Filter date</option>
                    @foreach ($dates as $date)
                    <option value="{{ $date->start_date }}">{{ Carbon\Carbon::parse($date->start_date)->format('M d, Y')
                        }}</option>
                    @endforeach
                </x-form-select>

            </div>

            <div class="sm:col-span-2">
                <x-form-select id="type" wire:model="type">
                    <option value="">Filter utility</option>
                    @foreach ($types as $item)
                    <option value="{{ $item->type }}">{{ $item->type }}</option>
                    @endforeach
                </x-form-select>

            </div>

            <div class="sm:col-span-2">
                <x-form-select id="small" wire:model="status">
                    <option value="">Filter status</option>
                    @foreach ($statuses as $item)
                    <option value="{{ $item->status }}">{{ $item->status }}</option>
                    @endforeach
                </x-form-select>

            </div>



        </div>

        <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">


                <div class="mb-5 mt-2 relative overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">


                    @if($utilities->count())

                    @include('tables.utilities')
                    <br><br><br>
                    @else
                    <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8 mt-10 mb-10">
                        <div class="text-center mb-10">
                            <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" aria-hidden="true">
                                <path vector-effect="non-scaling-stroke" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M9 13h6m-3-3v6m-9 1V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z" />
                            </svg>
                            <h3 class="mt-2 text-sm font-medium text-gray-900">No utilities</h3>
                            <p class="mt-1 text-sm text-gray-500">Get started by creating new utilities</p>
                            <div class="mt-6">

                                <div class="group inline-block">
                                    <x-button data-modal-toggle="instructions-create-utility-modal">
                                        <span class="pr-1 font-semibold flex-1">
                                            New utilities</span>

                                    </x-button>



                                </div>

                            </div>
                        </div>
                    </div>
                    @endif

                </div>

            </div>
        </div>
    </div>
    @include('modals.instructions.create-utility-modal')
</div>