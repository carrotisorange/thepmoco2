<x-modal-component>
    <x-slot name="id">
       send-bill-modal
    </x-slot>
    <h1 class="text-center font-medium">Send Bills</h1>
    <div class="p-5">
    <form wire:submit.prevent="sendButton">
        <div class="mt-5 flex flex-wrap -mx-3 mb-6">
            <div class="w-full md:w-full px-3">
                <x-label for="email">Email</x-label>
                <x-form-input type="email" wire:model="email" />
                <x-validation-error-component name='email' />
            </div>
        </div>
        <div class="mt-5 flex flex-wrap -mx-3 mb-6">
            <div class="w-full md:w-full px-3">
                <x-label for="due_date"> Due Date</x-label>
                <x-form-input type="date" wire:model="due_date" />
                <x-validation-error-component name='due_date' />
            </div>
        </div>
        <div class="mt-5 flex flex-wrap -mx-3 mb-6">
            <div class="w-full md:w-full px-3">
                <x-label for="due_date">Total Unpaid Bills </x-label>
                <x-form-input wire:model="totalUnpaidBills" readonly/>
            </div>
        </div>
        <div class="mt-5 flex flex-wrap -mx-3 mb-6">
            <div class="w-full md:w-full px-3">
                <x-label for="penalty">Penalty After Due Date  </x-label>
                <x-form-input wire:model="penalty" type="number" step="0.001" />
                <x-validation-error-component name='penalty' />
            </div>
        </div>
        <div class="mt-5 flex flex-wrap -mx-3 mb-6">
            <div class="w-full md:w-full px-3">
                <x-label for="noteToBill"> Note </x-label>
                <x-form-textarea wire:model="noteToBill"></x-form-textarea>
                <x-validation-error-component name='noteToBill' />
            </div>
        </div>
        <div class="mt-5">
            <p class="text-right">
                <x-button class="w-full" type="submit">
                    Send
                </x-button>
            </p>
        </div>
    </form>
   </div>
</x-modal-component>
