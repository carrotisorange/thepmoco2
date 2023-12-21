<x-new-layout>
    @section('title','Under Construction | '. env('APP_NAME'))
    <div class="mt-8">
        <div class="max-full mx-auto sm:px-6">
            <nav class="mx-auto max-w-9xl px-4 sm:px-6 lg:px-8" aria-label="Progress">
            </nav>
            <h1 class="py-12 font-light text-gray-800 text-3xl text-center">Sorry, we're doing some improvements on this feature. </h1>
            <div class="flex justify-center items-center">
                <img src="{{ asset('/brands/pending-approval.png') }}" class="w-72">
            </div>

            <div class="mx-auto py-12 flex justify-center space-x-7 items-center">
                <button onclick="window.location.href='{{ url()->previous() }}'" class="px-3 py-2 bg-purple-500 rounded-full text-base text-white">
                    Go Back
                </button>

            </div>
        </div>
    </div>
</x-new-layout>
