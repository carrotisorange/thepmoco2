<x-new-layout>
    @section('title','Personnels | '. Session::get('property'))
    <div class="mt-8">
        <div class="max-full mx-auto sm:px-6">
            @livewire('personnel-index-component')
        </div>
    </div>
</x-new-layout>