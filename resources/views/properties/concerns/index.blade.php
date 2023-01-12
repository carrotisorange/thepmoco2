<x-new-layout>
    @section('title','Concerns | '. Session::get('property_name'))
    <div class="mt-8">
        <div class="max-full mx-auto sm:px-6">
            @can('concern')
            @include('admin.restrictedpages.concern')
            @else
            @livewire('concern-index-component')
            @endcan
        </div>
    </div>
</x-new-layout>