<x-modal-component>
    <x-slot name="id">
        delete-accountpayable-modal-{{$accountpayable->id}}
    </x-slot>
    <div class="p-6 text-center">

        <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to delete
            this request ({{ $accountpayable->batch_no }})?</h3>
        <x-button wire:click="submitButton({{ $accountpayable->id }})"
            class="bg-red-600 hover:bg-red-800 focus:ring-red-300 dark:focus:ring-red-800">
            Yes, I'm sure
        </x-button>

        <x-button data-modal-toggle="delete-accountpayable-modal-{{$accountpayable->id}}" >No,
            Cancel</x-button>
    </div>

</x-modal-component>


