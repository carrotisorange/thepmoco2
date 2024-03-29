<div>
    <div class="sm:flex sm:items-center">
            <div class="sm:flex-auto">
                {{-- <h1 class="text-3xl font-bold text-gray-500">{{ $unitDetails->unit }} / Inventory</h1> --}}
                <p>Security Deposit: <b>{{ number_format($deposits,2) }}</b></p>
            </div>
            <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">

                <x-button data-modal-toggle="create-particular-modal">
                    Force Moveout
                </x-button>

            </div>
        </div>
        @if($bills->count())
    <div class="mb-5 mt-2 relative overflow-auto ring-opacity-5 md:rounded-lg">
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

                Go to step 4
            </button>

        </div>
    </div>
    @endif
    @include('modals.moveout-force')
</div>
