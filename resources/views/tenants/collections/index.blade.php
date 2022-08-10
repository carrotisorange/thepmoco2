<x-index-layout>
    @section('title', '| Payments')
    <x-slot name="labels">
        <li class="text-gray-500">{{ $tenant->tenant }}</li>
        <li><span class="text-gray-500 mx-2">/</span></li>
        <li class="text-gray-500">Payments</li>
    </x-slot>

    <x-slot name="options">
        <x-button onclick="window.location.href='/property/{{ Session::get('property') }}/tenant/{{ $tenant->uuid }}'">
            Go back to tenant
        </x-button>
    </x-slot>

    @include('tables.collections')
    <div class="mt-5 p-6">
        {{ $collections->links() }}
    </div>
</x-index-layout>