<x-new-layout>
    <div class="mt-10 px-4 sm:px-6 lg:px-8">
      <div class="sm:flex sm:items-center">
            <div class="sm:flex-auto">
                <h1 class="text-3xl font-bold text-gray-500" wire:ignore>
                    {{ucfirst(Route::current()->getName())}}
                </h1>
            </div>
            <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
            <x-button
                onclick="window.location.href='/property/{{ Session::get('property_uuid') }}/election/create'">
               New Election
            </x-button>
            </div>
        </div>
        </div>
    <div class="mt-8">
        <div class="max-full mx-auto sm:px-6">
            <div class="mt-10 px-4 sm:px-6 lg:px-8">
                <div class="mt-3">
                    @if(!$elections->count())
                    <div class=" mt-10 text-center mb-10">
                        <div class="flex justify-center">
                            <img src="{{ asset('/brands/election-vector.png') }}" alt="election vector" class="w-64" />
                        </div>
                        <h3 class="mt-8 text-base font-medium text-gray-700">You don't have an ongoing election at the
                            moment. <br> Click
                            the button below to start.</h3>

                        <div class="mt-6">
                            <x-button
                                onclick="window.location.href='/property/{{ Session::get('property_uuid') }}/election/create'">
                                Plan a new Election
                            </x-button>
                        </div>
                    </div>

                    @else
                    @include('tables.elections')
                    @endif

                </div>
            </div>
        </div>
    </div>
    </div>
</x-new-layout>
