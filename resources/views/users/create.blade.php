<x-new-layout>
    @section('title','Personnels | '. env('APP_NAME'))

    <div class="max-w-full mx-auto px-4 sm:px-6">
        <div class="mt-5 px-4 sm:px-6 lg:px-8">
            <div class="sm:flex sm:items-center">
                <div class="sm:flex-auto">
                    <h1 class="text-3xl font-bold text-indigo-700 mb-5 mt-5 ">New Personnels</h1>
                </div>
            </div>
            @livewire('user-create-component',['property' => $property])
        </div>
    </div>
</x-new-layout>