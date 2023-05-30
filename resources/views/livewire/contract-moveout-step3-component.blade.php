<div>


    {{-- <p>Security Deposit: <b>{{ number_format($deposits,2) }}</b></p> --}}
    @if($bills->count())
    <p class="text-center mb-5 text-red-800"><i class="fa-solid fa-triangle-exclamation"></i> Unpaid bills have to be
        settled to proceed.</p>
    <div class="mt-10 text-center mb-10">
        <button type="button" data-modal-toggle="create-particular-modal"
            class="inline-flex items-center rounded-md border border-transparent bg-purple-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2">

            <svg wire:loading wire:target="submitForm" class="animate-spin -ml-1 mr-3 h-5 w-5 text-white"
                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4">
                </circle>
                <path class="opacity-75" fill="currentColor"
                    d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                </path>
            </svg>
            Force Moveout
        </button>
    </div>

    <div class="mb-5 mt-2 relative overflow-x-auto ring-opacity-5 md:rounded-lg">
    @include('tables.bills')
    </div>
    @else
    <div class="mt-10 text-center mb-10">
        <i class="fa-solid fa-circle-check"></i>
        <h3 class="mt-2 text-sm font-medium text-gray-900">No bills found.</h3>
        <p class="mt-1 text-sm text-gray-500">Tenant is now ready to moveout.</p>
        <div class="mt-6">
            <button type="button" wire:click="submitForm()"
                class="inline-flex items-center rounded-md border border-transparent bg-purple-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2">

                <svg wire:loading wire:target="submitForm" class="animate-spin -ml-1 mr-3 h-5 w-5 text-white"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4">
                    </circle>
                    <path class="opacity-75" fill="currentColor"
                        d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                    </path>
                </svg>
                Go to step 3
            </button>

        </div>
    </div>
    @endif
    @include('modals.moveout-force')
</div>