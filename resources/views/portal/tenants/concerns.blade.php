<x-tenant-portal-layout>
    @section('title', 'Concerns')

    @section('header', 'Concerns')

    <div class="flex flex-col p-10">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="mb-5">
                    {{ $concerns->links() }}
                </div>
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    @include('tables.concerns')
                </div>
            </div>
        </div>
    </div>
</x-tenant-portal-layout>