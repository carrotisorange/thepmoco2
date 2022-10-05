<x-new-layout>
    @section('title','Employees | '. Session::get('property_name'))

    <div class="max-w-full mx-auto px-4 sm:px-6">
        <div class="mt-5 px-4 sm:px-6 lg:px-8">
            <div class="sm:flex sm:items-center">
                <div class="sm:flex-auto">
                    <h1 class="text-3xl font-bold text-indigo-700 mb-5 mt-5 ">New Employee</h1>
                </div>
            </div>
            @livewire('user-component')

        </div>
    </div>
</x-new-layout>