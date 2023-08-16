<x-new-layout>
    @section('title','Owners | '. Session::get('property'))
    <div class="mt-8">
        <div class="max-full mx-auto sm:px-6">
            @livewire('owner-index-component')
        </div>
    </div>
</x-new-layout>