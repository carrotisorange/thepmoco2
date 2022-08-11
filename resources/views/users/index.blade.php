<x-index-layout>
    @section('title', '| User')
    <x-slot name="labels">
        User
    </x-slot>

    <x-slot name="options">
        <x-button
            onclick="window.location.href='/property/{{ Session::get('property') }}/user/{{ Str::random(8) }}/create'">
            Add a user</x-button>
    </x-slot>

    @include('tables.users')

</x-index-layout>