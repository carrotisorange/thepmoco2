<x-new-layout-base>
    @section('title', 'Success | '. env('APP_NAME'))

    @livewire('user-create-success-component', ['user' => $user])
</x-new-layout-base>

