<x-new-layout>
    <div class="mt-8">
        <div class="max-full mx-auto sm:px-6">
            <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:max-w-7xl lg:px-8">

                <div class=" flex items-center justify-center">
                    <img class="h-48 w-auto" src="{{ asset('/brands/success_property.png') }}">
                </div>

                <div class=" mt-10 flex items-center justify-center">
                    <x-button type="button"
                        onclick="window.location.href='/property/{{ Session::get('property_uuid') }}/utilities'"
                   >
                        Go back.</x-button>

                </div>
            </div>
        </div>
    </div>
</x-new-layout>
