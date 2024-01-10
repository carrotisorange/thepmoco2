<x-new-layout>
    <div class="mt-8">
        <div class="max-full mx-auto sm:px-6">
            @livewire('collection-reference-index-livewire-component', ['type'=> $type, 'uuid'=> $uuid, 'batch_no' => $batch_no])
        </div>
    </div>
</x-new-layout>
