<x-index-layout>
    @section('title', 'Thank You | The Property Manager')

    @section('styles')
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    @endsection
    <x-slot name="labels">
        Thank you message
    </x-slot>
    <x-slot name="options">
        {{-- <x-button data-modal-toggle="create-particular-modal">
            Create a Particular
        </x-button> --}}
    </x-slot>
    <div class="flex justify-center">
        <div class="p-6 mt-5 mb-5 flex flex-col md:flex-row md:max-w-xl rounded-lg bg-white shadow-lg">
            <img class=" w-full h-96 md:h-auto object-cover md:w-48 rounded-t-lg md:rounded-none md:rounded-l-lg"
                src="{{ asset('/brands/full-logo.png') }}" alt="" />
            <div class="p-6 flex flex-col justify-start">
                <h5 class="text-gray-900 text-xl font-medium mb-2">Thanks for Signing Up</h5>
                <p class="text-gray-700 text-base mb-4">
                   The Property Manager Online will help you to simplify your rental property operations.
                </p>
                <p class="text-gray-600"><x-button onclick="window.location.href='/property/{{ Str::random(8) }}/create'">Start Now</x-button></p>
            </div>
        </div>
    </div>
</x-index-layout>