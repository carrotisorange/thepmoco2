<div>

    @livewire('create-bill-component', [ 'bill_to' => $tenant])

    <div class="mt-5 mb-10">

        <p class="text-right">
            <x-button data-modal-toggle="create-bill-modal">
                New Bill
            </x-button>

        </p>
        <div class="mb-5 mt-2 relative overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
            @if($bills->count())
            <div class="mb-5 mt-2 relative overflow-x-auto ring-opacity-5 md:rounded-lg">
                @include('tables.bills')
            </div>
            @endif
        </div>
    </div>
    <div class="flex justify-end mt-5">

        <x-button wire:click="redirectToContractShowPage">
            Finish
        </x-button>
    </div>

</div>