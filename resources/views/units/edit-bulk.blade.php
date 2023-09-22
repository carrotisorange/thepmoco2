<x-new-layout>
    @section('title','Units | '. env('APP_NAME'))
    <div class="mt-8">
        <div class="max-full mx-auto sm:px-6">
            @livewire('unit-edit-bulk-component', ['property'=> $property, 'batch_no' => $batch_no])
        </div>
    </div>
    @include('modals.create-unit')
    @include('modals.create-building')
</x-new-layout>