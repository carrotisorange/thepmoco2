<x-new-layout>
    {{-- @can('accountreceivable')
    @include('admin.restrictedpages.accountreceivable')
    @else --}}
    <div class="mt-8">
        <div class="max-full mx-auto sm:px-6">
            @livewire('collection-index-component')
        </div>
    </div>
    {{-- @endif --}}
</x-new-layout>
