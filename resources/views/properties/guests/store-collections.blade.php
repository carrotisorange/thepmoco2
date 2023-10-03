<x-new-layout>
    @section('title', $guest->guest.' | '. env('APP_NAME'))
    <div class="mt-8">
        <div class="max-full mx-auto md:px-6">
            @livewire('guest-store-collection-component', [
            'property' => $property,
            'collections' => $collections,
            'guest' => $guest,
            'batch_no' => $batch_no
            ])
        </div>
    </div>
</x-new-layout>