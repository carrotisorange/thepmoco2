<x-new-layout>
    @section('title','Bills | '. Session::get('property_name'))
    <div class="mt-10 px-4 sm:px-6 lg:px-8">
        @livewire('bill-bulk-edit-component', [
        'property' => $property,
        'accountpayable' => $accountpayable
        ])
    </div>
</x-new-layout>