<x-new-layout>
    @section('title','Bills | '. $property->property)
    <div class="mt-8">
        <div class="max-full mx-auto sm:px-6">
            @livewire('guest-bill-create-component', [
            'guest'=> $guest,
            'property' => $property
            ])
        </div>
    </div>

</x-new-layout>