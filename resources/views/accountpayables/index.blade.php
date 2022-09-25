<x-new-layout>
    @section('title','Account Payables | '. Session::get('property_name'))

    <div class="mx-auto px-4 sm:px-6 lg:px-8">
        <div class="mt-5 px-4 sm:px-6 lg:px-8">
            <div class="sm:flex sm:items-center">
                <div class="sm:flex-auto">
                    <h1 class="text-3xl font-bold text-gray-700 mb-5 mt-5 ">Accounts Payables</h1>
                </div>
{{-- 
                <div class="sm:col-span-2">
                    <select id="small" wire:model="status"
                        class="text-left bg-white block p-1 w-full text-sm h-8 text-gray-90 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                        <option value="">Filter account payable status</option>
                        {{-- @foreach ($statuses as $item)
                        <option value="{{ $item->status_id }}">{{ $item->status }}</option>
                        @endforeach -
                    </select>
                
                </div> --}}

                <button type="button"
                    class="ml-5 inline-flex items-center justify-center rounded-md border border-transparent bg-indigo-500 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto"><a
                        href="/property/{{ Session::get('property') }}/accountpayable/{{ Str::random(8) }}/create">Create New Request</a></button>
            </div>

          

            <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">



                <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">

                    <div
                        class="mb-5 mt-2 relative overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                        <!-- Selected row actions, only show when rows are selected. -->
                        <div class="absolute top-0 left-12 flex h-12 items-center space-x-3 bg-gray-50 sm:left-16">

                        </div>

                        <table class="min-w-full table-fixed">
                        @include('admin.tables.accountpayables')

                    </div>

                </div>
            </div>
        </div>

    </div>
</x-new-layout>