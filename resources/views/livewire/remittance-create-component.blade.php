<x-modal-component>
    <x-slot name="id">
        instructions-create-remittance-modal
    </x-slot>
    <h1 class="text-center font-medium">Create Remittances</h1>
    <div class="p-5">
        <form wire:submit.prevent="storeRemittance">
            <div class="mt-2 text-center sm:mt-5">
                <div class="mt-2">
                    @if($collectionsCount)
                    <p class="text-sm text-gray-500">You're about to create <b class="font-bold text-lg text-red-500">{{
                            $collectionsCount }}</b> remittance/s. You may still modify
                            the created remittances when you click
                            <b>CONFIRM
                    </p>
                    @else
                    <p class="text-sm text-gray-500">
                        There are no collections found. To continue creating remittances, please add an owner using the
                        button below.
                    </p>
                    @endif
                </div>
            </div>
            <div class="mt-5 sm:mt-6">
                <x-label for="">Select a month and year</x-label>
                <x-form-select wire:model="date">
                    @foreach ($dates as $item)
                    <option value="{{ $item->created_at }}">{{ Carbon\Carbon::parse($item->created_at)->format('M, Y') }}</option>
                    @endforeach
                </x-form-select>
                <x-validation-error-component name='date' />
            </div>

            <div class="mt-5 sm:mt-6">
                @if($collectionsCount)
                <x-button class="w-full" type="submit">
                    Confirm
                </x-button>

                @else
                <x-button class="w-full" wire:click="redirectToCollectionPage">
                    Add a collection
                </x-button>
                @endif
            </div>
        </form>
    </div>
</x-modal-component>
