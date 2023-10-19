<x-new-layout-base>
    @section('title', 'Success | '. env('APP_NAME'))

    <div>

        <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:max-w-7xl lg:px-8">
            <div class="flex justify-center items-center">
                <h2 class="max-w-xl p-8 text-center text-xl font-medium tracking-tight text-gray-900 font-pop">
                    Congratulations!
                    <br> <span class="font-semibold text-purple-900">You are now ready to manage your property.</span>
                </h2>
            </div>

            <div class=" flex items-center justify-center">
                <img class="h-49 w-auto" src="{{ asset('/brands/dashboard_tenant.png') }}">
            </div>

            <div class=" mt-10 flex items-center justify-center">
                <x-button onclick="window.location.href='/property/'">Let's Go</x-button>
            </div>
        </div>
    </div>
</x-new-layout-base>