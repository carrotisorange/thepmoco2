<x-new-layout>
    @section('title','Tenants | '. Session::get('property'))
    <div class="mt-8">
        <div class="max-full mx-auto px-4 sm:px-6 lg:px-11">
           @livewire('tenant-index-component')
        </div>
    </div>
</x-new-layout>