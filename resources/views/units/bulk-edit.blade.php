<x-new-layout>
    @section('title','Units | '. Session::get('property_name'))
    <div class="mt-8">
        <div class="max-full mx-auto sm:px-6">
            @livewire('unit-component', ['batch_no' => $batch_no])
        </div>
    </div>
    @include('modals.create-unit-modal')
    @include('modals.create-building-modal')
</x-new-layout>