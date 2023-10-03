<x-new-layout>
    @section('title','Personnels | '. env('APP_NAME'))
    <div class="mt-8">
        <div class="max-full mx-auto sm:px-6">
            @livewire('personnel-index-component')
        </div>
    </div>
</x-new-layout>