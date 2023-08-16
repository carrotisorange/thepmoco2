<x-new-layout>
    @section('title', $tenant->tenant.' | '.Session::get('property'))

    @livewire('tenant-concern-create-component', ['tenant' => $tenant])

</x-new-layout>