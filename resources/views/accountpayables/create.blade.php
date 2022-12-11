<x-new-layout>
    @section('title','Account Payables | '. Session::get('property_name'))
    <div class="mx-auto px-4 sm:px-6 lg:px-8">
        <div class="mt-5 px-4 sm:px-6 lg:px-8">
            @livewire('account-payable-component')
        </div>
    </div>
</x-new-layout>