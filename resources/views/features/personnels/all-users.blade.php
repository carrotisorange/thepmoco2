<x-main-layout>
    <div class="mx-auto px-12 px-4 max-w-7xl sm:px-6 lg:px-8 lg:py-10">
        <!-- This example requires Tailwind CSS v2.0+ -->
        <div class="flex flex-col">
            <div class="-my-2 overflow-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        @include('tables.users')
                    </div>
                </div>
                {{ $users->links() }}
            </div>
        </div>
    </div>
</x-main-layout>