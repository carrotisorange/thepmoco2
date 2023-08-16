<x-new-layout>
    @section('title','Bills | '. Session::get('property'))
    <div class="mt-10 px-4 sm:px-6 lg:px-8">
        @livewire('bill-edit-component', [
        'property' => $property,
        'bill' => $bill
        ])
    </div>
</x-new-layout>