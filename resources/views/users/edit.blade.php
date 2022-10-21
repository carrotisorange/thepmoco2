<x-new-layout-base>
    @section('title', 'The Property Manager | Profile')

    @livewire('user-edit-component', ['user' => $user])
</x-main-layout>