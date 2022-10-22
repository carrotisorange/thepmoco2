<x-new-layout-base>
    @section('title', '| Profile')

    @livewire('user-edit-component', ['user' => $user])
</x-main-layout>