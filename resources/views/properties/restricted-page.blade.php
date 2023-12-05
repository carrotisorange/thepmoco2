<x-new-layout>
    <div class="mt-8">
        <div class="max-full mx-auto sm:px-6">

            <h1 class="py-12 font-light text-gray-800 text-2xl text-center">Sorry you do not have access to this page.
            </h1>
            <div class="flex justify-center items-center">
                <img src="{{ asset('/brands/restricted.png') }}" class="-mt-32 w-96">
            </div>
            <div class="mx-auto py-12 flex justify-center space-x-7 items-center">
                <x-button onclick="window.location.href='{{ url()->previous() }}'">
                    Go Back
                </x-button>
            </div>
        </div>
</x-new-layout>
