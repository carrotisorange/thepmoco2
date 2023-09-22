<x-new-layout>
    @section('title', $owner->owner.' | '. env('APP_NAME'))

    <div class="mx-auto px-4 sm:px-6 lg:px-8">

        <div class="pt-6 sm:pb-5">

            @livewire('representative-component', ['owner' => $owner])
        </div>
    </div>
</x-new-layout>