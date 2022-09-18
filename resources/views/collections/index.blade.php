<x-new-layout>
    @section('title','Collections | '. Session::get('property_name'))
    <div class="mt-8">
        <div class="max-full mx-auto sm:px-6">
           @livewire('collection-index-component')
        </div>
    </div>
</x-new-layout>