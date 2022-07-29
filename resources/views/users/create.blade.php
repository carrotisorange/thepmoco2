<x-index-layout>
    @section('title', '| User | Create')
    <x-slot name="labels">
        Add User
    </x-slot>

    <x-slot name="options">
        <x-button onclick="window.location.href='/property/{{ Session::get('property') }}/user'">
        Go Back
        </x-button>
    </x-slot>

    @livewire('user-component')

</x-index-layout>