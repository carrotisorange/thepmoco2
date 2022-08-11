<x-main-layout>
    @section('title', 'The Property Manager | Users')
    <div class="mx-auto px-12 px-4 max-w-7xl sm:px-6 lg:px-8 lg:py-10">
        <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                       @include('tables.subscriptions')
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-main-layout>