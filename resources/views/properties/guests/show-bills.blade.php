<x-new-layout>
    @section('title','Bills | '. env('APP_NAME'))
    <div class="mt-8">
        <div class="max-full mx-auto sm:px-6">
            @livewire('guest-bill-create-component', [
            'guest'=> $guest
            ])
        </div>
    </div>

</x-new-layout>
