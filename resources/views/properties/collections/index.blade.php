<x-new-layout>
    @section('title','Collections | '. env('APP_NAME'))
    {{-- @can('is_account_receivable_read_allowed')
    @include('admin.restrictedpages.accountreceivable')
    @else --}}
    <div class="mt-8">
        <div class="max-full mx-auto sm:px-6">
            @livewire('collection-index-component',[
            'property' => $property
            ])
        </div>
    </div>
    {{-- @endcan --}}
</x-new-layout>