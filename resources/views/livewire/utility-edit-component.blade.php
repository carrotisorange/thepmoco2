<div>
    <div class="mt-10 px-4 sm:px-6 lg:px-8">
        <div class="sm:flex sm:items-center">
            <div class="sm:flex-auto">
                <h1 class="text-3xl font-bold text-gray-700">Utilities / {{ $option }}</h1>
            </div>
            <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
                <button onclick="window.location.href='/property/{{ Session::get('property') }}/utilities'"
                    class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-purple-500 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    type="button">Back
                </button>
                @if($this->start_date&&$this->end_date&&$this->kwh&&$this->min_charge)
                <button type="submit" wire:click="postUtilities" wire:loading.remove
                    class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-purple-500 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Post Utilities
                </button>
                @endif
                <button type="button" wire:loading wire:target="postUtilities" disabled
                    class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-purple-500 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Loading...
                </button>
                {{-- @if($selectedUtilities)
                <button type="submit" wire:click="removeUtilities()"
                    class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-500 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">

                    <svg wire:loading wire:target="removeUtilities" class="animate-spin -ml-1 mr-3 h-5 w-5 text-white"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4">
                        </circle>
                        <path class="opacity-75" fill="currentColor"
                            d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                        </path>
                    </svg>
                    Remove utilities ({{ count($selectedUtilities) }})
                </button>
                @endif --}}


            </div>
        </div>
        {{-- @if(!$this->min_charge) --}}

        <div class="mt-5 grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">

            <div class="sm:col-span-2">
                <label for="">Start date</label>
                <input type="date" id="start_date" wire:model="start_date" wire:keyup="updateParameters"
                    class="bg-white block p-4 w-full text-sm h-5 text-gray-90 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Search for unit" required>

            </div>
            <div class="sm:col-span-2">
                <label for="">End date</label>
                <input type="date" id="end_date" wire:model="end_date" wire:keyup="updateParameters"
                    class="bg-white block p-4 w-full text-sm h-5 text-gray-90 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Search for unit" required>

            </div>
            <div class="sm:col-span-1">
                <label for="">
                    Rate
                </label>
                <input type="text" id="kwh" wire:model="kwh" wire:keyup="updateParameters"
                    class="bg-white block p-4  w-full text-sm h-5 text-gray-90 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="" required>

            </div>
            <div class="sm:col-span-1">
                <label for="">Mininum Charge</label>
                <input type="text" id="min_charge" wire:model="min_charge" wire:keyup="updateParameters"
                    class="bg-white block p-4 w-full text-sm h-5 text-gray-90 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="" required>

            </div>

        </div>

        <p class="text-center mt-10 mb-10">
            <button type="button" wire:loading disabled wire:target="updateParameters"
                class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-purple-500 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Loading...
            </button>
        </p>
        {{-- @endif --}}

        <div class="mt-3 -my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">

            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">


                @if($this->start_date&&$this->end_date&&$this->kwh)
                <div>
                    <p class="mt-3 text-sm text-center text-gray-500">
                        Showing
                        <span class="font-medium">{{ $utilities->count() }}</span>

                        {{Str::plural('utility', $utilities->count())}}

                        {{--
                    <p class="text-center">
                        <a wire:loading wire:target="updateParameters"
                            class="text-green-500 text-decoration-line: underline" href="#/">
                            Saving...
                        </a>
                    </p> --}}
                    </p>

                    @include('forms.utilities.utility-edit')


                </div>
                @endif
                {{-- {{ $utilities->links() }} --}}
            </div>
        </div>
    </div>
    @include('layouts.notifications')
</div>