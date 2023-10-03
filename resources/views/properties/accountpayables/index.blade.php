<x-new-layout>
    @section('title','Account Payables | '. env('APP_NAME'))
    <div class="mt-8">
        <div class="max-full mx-auto sm:px-6">
            @livewire('account-payable-index-component', ['property' => $property])
        </div>
    </div>
</x-new-layout>