<x-new-layout>
    @section('title','Concerns | '. $property->property)
    <div class="mt-8">
        <div class="max-full mx-auto sm:px-6">
            @can('is_concern_read_allowed')
            @include('admin.restrictedpages.concern')
            @else
            @livewire('concern-index-component', ['property' => $property])
            @endcan
        </div>
    </div>
</x-new-layout>