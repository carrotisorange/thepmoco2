<x-new-layout>

    @section('title', 'Remittances | '. env('APP_NAME'))
    <div class="px-4 sm:px-6 lg:px-8 pt-10">
        @livewire('remittance-index-component',['property' => $property])
    </div>

</x-new-layout>