<x-new-layout>
    @section('title', $tenant->tenant.' | '. env('APP_NAME'))
    <div class="mt-8">
        <div class="max-full mx-auto md:px-6">
            @livewire('collection-tenant-edit-component', ['tenant' => $tenant,'batch_no' => $batch_no])
        </div>
    </div>
</x-new-layout>