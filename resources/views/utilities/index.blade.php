<x-new-layout>
    @section('title','Utilities | '. Session::get('property_name'))
    <div class="mt-10 px-4 sm:px-6 lg:px-8">
        <div class="sm:flex sm:items-center">
            <div class="sm:flex-auto">
                <h1 class="text-3xl font-bold text-gray-700">Utilities</h1>
            </div>
            <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
                <button wire:click="changeView('agingSummaryView')"
                    class="inline-flex items-center justify-center rounded-md border border-transparent bg-purple-900 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto"
                    type="button">New
                </button>

            </div>
        </div>


        <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">

                <div class="mb-5 mt-2 relative overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                    <!-- Selected row actions, only show when rows are selected. -->
                    <div class="absolute top-0 left-12 flex h-12 items-center space-x-3 bg-gray-50 sm:left-16">

                    </div>

                    @include('tables.utilities')

                </div>

            </div>
        </div>
    </div>

    <div class="px-4 mt-5 py-3 flex items-center justify-between border-t border-gray-200 sm:px-6">
    </div>
</x-new-layout>