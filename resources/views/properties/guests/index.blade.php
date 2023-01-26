<x-new-layout>
    @section('title','Guests | '. Session::get('property_name'))
    <div class="mt-8">
        <div class="max-full mx-auto sm:px-6">
            @livewire('guest-index-component')
        </div>
    </div>
</x-new-layout>