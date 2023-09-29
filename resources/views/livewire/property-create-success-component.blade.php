<div>
    <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:max-w-7xl lg:px-8">
        <div class="flex justify-center items-center">
            <h2 class="max-w-xl p-10 text-center text-2xl font-medium tracking-tight text-gray-900 font-pop">You've
                successfully created <br> <span class="font-semibold text-purple-900">{{ Session::get('property') .' '.
                    Session::get('property_type') }}!</span></h2>
        </div>

        <div class=" flex items-center justify-center">
            <img class="h-48 w-auto" src="{{ asset('/brands/success_property.png') }}">
        </div>

        <div class=" mt-10 flex items-center justify-center">
            <button type="button" wire:click="redirectToUnitPage"
                class="w-64 items-center px-4 py-2 border border-transparent text-sm font-medium rounded-full shadow-sm text-white text-center bg-purple-500 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Let's get started.</button>

        </div>
    </div>
</div>
