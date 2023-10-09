<x-new-layout>
    <div class="mt-8">
        <div class="max-full mx-auto sm:px-6">
            <div class="sm:flex-auto">
                <h1 class="text-3xl font-bold text-gray-500">Election</h1>
            </div>

            <div class="mx-auto">
                <!-- show this if no existing election is taking place -->
                            <div class=" mt-10 text-center mb-10">
                                <div class="flex justify-center">
                                    <img src="{{ asset('/brands/election-vector.png') }}" alt="election vector" class="w-64" />
                                </div>
                                <h3 class="mt-8 text-base font-medium text-gray-700">You don't have an ongoing election at the moment. <br> Click
                                    the button below to start.</h3>

                                <div class="mt-6">
                                    <button type="button" onclick="window.location.href='/property/{{ Session::get('property_uuid') }}/election/{{ Carbon\Carbon::now()->format('Y') }}/step-1'"
                                        class="inline-flex items-center rounded-md border border-transparent bg-purple-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2">

                                        Plan a new Election
                                    </button>
                                </div>
                            </div>
            </div>
        </div>
    </div>

    </x-new-layout>

    <script src="https://unpkg.com/@themesberg/flowbite@1.2.0/dist/flowbite.bundle.js"></script>
