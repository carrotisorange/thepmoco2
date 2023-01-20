<x-new-layout>
    @section('title','Bills | '. Session::get('property_name'))
    <div class="mt-8">
        <div class="max-full mx-auto sm:px-6">
            @livewire('bill-edit-component', ['batch_no' => $batch_no])
        </div>
    </div>
</x-new-layout>
