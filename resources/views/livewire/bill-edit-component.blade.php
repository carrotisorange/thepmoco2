<div>
    <div class="flex flex-row">
        <div class="basis-1/2">
            @if($bills->count())

            <x-button wire:loading.remove wire:click="saveBills()">Save Bills ({{ $bills->count() }})
            </x-button>

            <div wire:loading wire:target="saveBills">
                Processing...
            </div>

            <x-button wire:loading.remove wire:click="postBills()">Post Bills ({{ $bills->count() }})
            </x-button>

            <div wire:loading wire:target="postBills">
                Processing...
            </div>
            @endif
        </div>
        <div class="basis-1/2 ml-12 text-right">
            @if($selectedBills)
            <x-button wire:loading.remove onclick="confirmMessage()" wire:click="removeBills()">
                Remove Bills ({{ count($selectedBills) }})
            </x-button>
            <div wire:loading wire:target="removeBills">
                Processing...
            </div>
            @endif
        </div>
    </div>

    <div class="mt-5 bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="bg-white border-b border-gray-200">
            <div class="flex flex-col">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">

                        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                            @include('forms.bills.bill-customized-edit')
                        </div>

                    </div>
                </div>
            </div>

        </div>

    </div>
    @include('layouts.notifications')
</div>