<x-new-layout>
    @section('title','Contracts | '. Session::get('property_name'))
    @can('contract')
        @include('admin.restrictedpages.contract')
    @else

    <div class="mt-10 px-4 sm:px-6 lg:px-8">
        <div class="sm:flex sm:items-center">
            <div class="sm:flex-auto">
                <h1 class="text-3xl font-bold text-gray-700">Contracts</h1>
            </div>
            <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">

                <button type="button" onclick="window.location.href='/property/{{ Session::get('property') }}/unit'"
                    class="inline-flex items-center justify-center rounded-md border border-transparent bg-indigo-500 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto">
                    New Contract</button>

            </div>
        </div>


        <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">

                <div class="mb-5 mt-2 relative overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                    <!-- Selected row actions, only show when rows are selected. -->
                    <div class="absolute top-0 left-12 flex h-12 items-center space-x-3 bg-gray-50 sm:left-16">

                    </div>
                    @include('admin.tables.contracts')
                </div>
                {{-- <button type="button"
                    class="mb-5 inline-flex items-center rounded border border-gray-300 bg-white px-2.5 py-1.5 text-xs font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-30">Select
                    All</button> --}}
            </div>
        </div>
    </div>

    <div class="px-4 mt-5 py-3 flex items-center justify-between border-t border-gray-200 sm:px-6">
        {{-- {{ $contracts->links() }} --}}
    </div>
    @endcan

</x-new-layout>

{{-- <x-app-layout>
    @livewire('tenant-index-component')
</x-app-layout> --}}