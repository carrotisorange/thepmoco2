<x-new-layout>
    <div class="mx-auto px-4 sm:px-6 lg:px-8">
        <div class="mt-5 px-4 sm:px-6 lg:px-8">
            <div class="sm:flex sm:items-center">
                <div class="sm:flex-auto">
                    <h1 class="text-3xl font-bold text-gray-700 mb-5 mt-5 ">{{ $owner->owner }} /
                        Collections</h1>
                </div>
                <button type="button"
                    onclick="window.location.href='/property/{{ Session::get('property_uuid') }}/collection/{{ 'owner' }}/{{ $owner->uuid }}'"
                    class="inline-flex items-center justify-center rounded-md border border-transparent bg-purple-500 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto">
                    Go back to bills
                    </a></button>


            </div>
            @include('tables.collections')
        </div>
    </div>
</x-new-layout>
