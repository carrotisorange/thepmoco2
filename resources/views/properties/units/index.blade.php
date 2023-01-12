<x-new-layout>
    @section('title','Units | '. Session::get('property_name'))
    <div class="mt-8">
        <div class="max-full mx-auto sm:px-6">
            @livewire('unit-index-component')
        </div>
    </div>
</x-new-layout>
