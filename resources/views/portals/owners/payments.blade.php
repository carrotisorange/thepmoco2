<x-owner-portal-layout>

    @section('header', 'Payments')
    <div class=" mx-auto px-4 sm:px-6 lg:px-8">

        <div class="mt-10 px-4 sm:px-6 lg:px-8">
            <div class="sm:flex sm:items-center">
                <div class="sm:flex-auto">
                    <h1 class="text-3xl font-bold text-gray-700">
                        {{ucfirst(Route::current()->getName())}}
                    </h1>
                </div>
                <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">


                </div>
            </div>

            <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">



                <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">

                    <div
                        class="mb-5 mt-2 relative overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                        <!-- Selected row actions, only show when rows are selected. -->
                        <div class="absolute top-0 left-12 flex h-12 items-center space-x-3 bg-gray-50 sm:left-16">

                        </div>

                        @include('portals.owners.tables.payments')

                    </div>
                  
                </div>
            </div>
        </div>


    </div>
</x-owner-portal-layout>
