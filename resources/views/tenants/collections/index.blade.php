<x-new-layout>
    @section('title', $tenant->tenant.' | '. env('APP_NAME'))
    <div class="mx-auto px-4 sm:px-6 lg:px-8">
        <div class="mt-5 px-4 sm:px-6 lg:px-8">
            <div class="sm:flex sm:items-center">
                <div class="sm:flex-auto">
                    <h1 class="text-3xl font-bold text-gray-700 mb-5 mt-5 ">{{ $tenant->tenant }} /
                        Collections</h1>
                </div>
                <x-button type="button"
                    onclick="window.location.href='/property/{{ Session::get('property_uuid') }}/bill/{{ 'tenant' }}/{{ $tenant->uuid }}'">
                    Go back to bills
                    </a></x-button>
            </div>
            <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">



                <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">

                    <div
                        class="mb-5 mt-2 relative overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                        <!-- Selected row actions, only show when rows are selected. -->
                        <div class="absolute top-0 left-12 flex h-12 items-center space-x-3 bg-gray-50 sm:left-16">

                        </div>

                        @include('tables.collections')
                    </div>
              
                </div>
            </div>

</x-new-layout>