<x-new-layout>
    @section('title','Concerns | '. env('APP_NAME'))

    @livewire('concern-edit-component', ['concern_details' => $concern])
</x-new-layout>