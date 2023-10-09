<x-new-layout>
    <div class="mt-8">
        <div class="max-full mx-auto sm:px-6">
            {{-- @can('is_account_receivable_read_allowed')
            @include('admin.restrictedpages.accountreceivable')
            @else --}}
            @livewire('financial-index-component', ['property' => $property])
            {{-- @endcan --}}
        </div>
    </div>
</x-new-layout>
