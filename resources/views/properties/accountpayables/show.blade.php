<x-new-layout>
    <div class="mt-10 px-4 sm:px-6 lg:px-8">
        @livewire('account-payable-show-component', [
        'property' => $property,
        'accountpayable' => $accountpayable
        ])
    </div>

</x-new-layout>
