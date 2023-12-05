<x-modal-component>
    <x-slot name="id">
        bill-post-component
    </x-slot>
    <h1 class="text-center font-medium">Confirm Post Bills</h1>
    <div class="p-5">
        <form wire:submit.prevent="submit">
            <div class="mt-2 sm:mt-6">
                <x-label for="dueDate">Due Date</x-label>
                <x-form-input type="date" id="dueDate" wire:model="dueDate" />
                <x-validation-error-component name='dueDate' />
            </div>

            <div class="mt-5 sm:mt-6">
                <x-label for="penaltyAfterDueDate">Penalty After Due Date</x-label>
                <x-form-input type="number" step="0.001" id="penaltyAfterDueDate" wire:model="penaltyAfterDueDate" />
                <x-validation-error-component name='penaltyAfterDueDate' />
            </div>

            <div class="mt-5 sm:mt-6">
                <x-label for="sendBillToEmail">Send bill to email?</x-label>
                <x-form-select wire:model="sendBillToEmail">
                    <option value="no">no</option>
                    <option value="yes">yes</option>
                </x-form-select>
                <x-validation-error-component name='sendBillToEmail' />
            </div>

            <div class="mt-5 sm:mt-6">
                <x-label for="noteToBill">Note To Bill</x-label>
                <x-form-textarea id="noteToBill" wire:model="noteToBill" />
                <x-validation-error-component name='noteToBill' />
            </div>

            <div class="mt-5 sm:mt-6">
                <x-button class="w-full" type="submit">
                    Confirm
                </x-button>
            </div>
        </form>
    </div>
</x-modal-component>
