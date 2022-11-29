<x-new-layout>
    @section('title', $tenant->tenant.' | '.Session::get('property_name'))

    @livewire('tenant-concern-create-component', ['tenant' => $tenant])

</x-new-layout>