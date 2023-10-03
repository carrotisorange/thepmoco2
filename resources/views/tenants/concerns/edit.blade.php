<x-new-layout>
    @section('title', 'Concern | '. env('APP_NAME'))

    @livewire('concern-edit-component', ['concern_details' => $concern])
</x-new-layout>