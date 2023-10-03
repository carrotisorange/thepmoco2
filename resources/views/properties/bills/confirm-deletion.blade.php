<x-new-layout>
    @section('title','Bills | '. env('APP_NAME'))

    <div class="mt-10 px-4 sm:px-6 lg:px-8">
        <div class="sm:flex sm:items-center">
            <div class="sm:flex-auto">
                <h1 class="text-3xl font-bold text-gray-700">Confirm Bill Deletion</h1>
            </div>

        </div>


        <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                <div class="mt-3">
                    {{-- {{ $bills->links() }} --}}
                </div>
                <div class="mb-5 mt-2 relative overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                    <div class="absolute top-0 left-12 flex h-12 items-center space-x-3 bg-gray-50 sm:left-16">

                    </div>
                    @include('tables.bills')

                </div>
                <p class="text-right">
                    <a class="whitespace-nowrap px-3 py-2 text-sm text-red-500 text-decoration-line: underline"
                        href="{{ url()->previous() }}">
                        Cancel
                    </a>
                    <x-button type="button"
                        onclick="window.location.href='/property/{{ Session::get('property_uuid') }}/unit'">
                        Confirm</x-button>
                </p>
            </div>

        </div>
    </div>

    <div class="px-4 mt-5 py-3 flex items-center justify-between border-t border-gray-200 sm:px-6">

    </div>
    {{-- @endcan --}}

</x-new-layout>