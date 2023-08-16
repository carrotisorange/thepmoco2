<x-new-layout>
    @section('title', $tenant->tenant.' | '.Session::get('property'))
    <div class="mt-8">
        <div class="max-full mx-auto md:px-6">
            @livewire('collection-tenant-edit-component', ['collections' => $collections,'tenant' => $tenant,'batch_no'
            => $batch_no])
        </div>
    </div>
</x-new-layout>