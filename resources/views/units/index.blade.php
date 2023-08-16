<x-new-layout>
    @section('title','Units | '. Session::get('property'))
    <div class="mt-8">
        <div class="max-full mx-auto sm:px-6">
            @livewire('unit-index-component',['property' => $property, 'batch_no' => $batch_no])
        </div>
    </div>
</x-new-layout>