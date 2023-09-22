<x-new-layout>
    @section('title','Guests | '. env('APP_NAME'))
    <div class="mt-8">
        <div class="max-full mx-auto sm:px-6">
            @livewire('guest-index-component')
        </div>
    </div>
</x-new-layout>