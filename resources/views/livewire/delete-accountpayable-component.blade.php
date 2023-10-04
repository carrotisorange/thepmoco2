<x-modal-component>
    @include('layouts.notifications')
    <x-slot name="id">
        delete-accountpayable-modal-{{$accountpayable->id}}
    </x-slot>
    <div class="p-6 text-center">

        <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to delete
            this request ({{ $accountpayable->batch_no }})?</h3>
        <x-button wire:click="submitButton({{ $accountpayable->id }})">
            Yes, I'm sure
        </x-button>

        <x-button class="w-full" data-modal-toggle="delete-accountpayable-modal-{{$accountpayable->id}}" >No,
            Cancel</x-button>
    </div>

</x-modal-component>


