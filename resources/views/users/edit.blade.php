<x-new-layout-base>
    @section('title', 'Profile | '. env('APP_NAME'))

    @livewire('user-edit-component', ['user' => $user])
</x-main-layout>