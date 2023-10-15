<div>
    {{-- @include('layouts.notifications') --}}
    <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:max-w-7xl lg:px-8">
        <div class="flex justify-center items-center">
            <h2 class="max-w-xl p-8 text-center text-xl font-medium tracking-tight text-gray-900 font-pop">You've
                successfully created your first property!
                <br> <span class="font-semibold text-purple-900">{{ Session::get('property')}}</span></h2>
        </div>

        <div class=" flex items-center justify-center">
            <img class="h-49 w-auto" src="{{ asset('/brands/success_property.png') }}">
        </div>

        <div class=" mt-10 flex items-center justify-center">
            <x-button wire:click='continueButton'>Continue</x-button>
        </div>
    </div>
</div>
