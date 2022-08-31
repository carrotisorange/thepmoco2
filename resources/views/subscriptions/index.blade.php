<x-new-layout-base>
    @section('title','Units | '. Session::get('property'))
    <div class="mt-8">
        <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">

                <div class="mb-5 mt-2 relative overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                    <!-- Selected row actions, only show when rows are selected. -->
                    <div class="absolute top-0 left-12 flex h-12 items-center space-x-3 bg-gray-50 sm:left-16">

                    </div>
                    @include('tables.subscriptions')
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
</x-new-layout-base>