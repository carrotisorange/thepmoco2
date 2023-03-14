<x-new-layout>
    @section('title','Collections | '. Session::get('property_name'))
    @can('accountreceivable')
    @include('admin.restrictedpages.accountreceivable')
    @else
    <div class="mt-8">
        <div class="max-full mx-auto sm:px-6">
            @livewire('collection-index-component',[
                'property' => $property
            ])
        </div>
    </div>
    @endif
</x-new-layout>