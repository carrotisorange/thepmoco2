<x-sale-portal-layout>
    <div class=" mx-auto px-4 sm:px-6 lg:px-8">

        <div class="mt-10 px-4 sm:px-6 lg:px-8">
            <div class="sm:flex sm:items-center">
                <div class="sm:flex-auto">
                    <h1 class="text-3xl font-bold text-gray-700" wire:ignore>
                        {{ucfirst(Route::current()->getName())}}
                    </h1>
                </div>
                <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
                    Name : <b> {{ $user->name }}</b>,
                    Email : <b> {{ $user->email }}</b>,
                    Phone: <b> {{
                        $user->mobile_number }}</b>

                </div>
            </div>

            <div class="-my-2 -mx-4 overflow-auto sm:-mx-6 lg:-mx-8">



                <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">

                    <div
                        class="mb-5 mt-2 relative overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                        <!-- Selected row actions, only show when rows are selected. -->
                        <div class="absolute top-0 left-12 flex h-12 items-center space-x-3 bg-gray-50 sm:left-16">

                        </div>

                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="bg-gray-50">
                                <tr>
                                    <x-th>#</x-th>
                                    <x-th>Property</x-th>
                                    <x-th>Activity</x-th>
                                    <x-th>Description</x-th>
                                    <x-th>Created</x-th>
                                </tr>
                            </thead>
                            @forelse ($activities as $activity)
                            <tbody class="bg-white divide-y divide-gray-200">
                                <tr>
                                    <x-td>{{ $activity->id }}</x-td>
                                    <x-td>{{ $activity->property->property }}</x-td>
                                    <x-td>{{ $activity->description }}</x-td>
                                    <x-td>{{ $activity->activity_type->activity_type }}</x-td>
                                    <x-td>{{Carbon\Carbon::parse($activity->created_at)->diffForHumans()}}</x-td>
                                    @empty
                                    <x-td>No data found..</x-td>
                                </tr>
                            </tbody>
                            @endforelse
                        </table>
                    </div>

                </div>
            </div>
        </div>


    </div>
</x-sale-portal-layout>

{{-- <x-index-layout>
    @section('title', 'Dashboard | '. env('APP_NAME'))
    <x-slot name="labels">
        Sales / {{ $user->name }} / Activity
    </x-slot>
    <x-slot name="options">
        <x-button onclick="window.location.href='{{ url()->previous() }}'"> Go back to main
        </x-button>
    </x-slot>

    <div class="p-6 bg-white border-b border-gray-200">
        Name : <b> {{ $user->name }}</b>,
        Email : <b> {{ $user->email }}</b>,
        Phone: <b> {{
            $user->mobile_number }}</b>

    </div>

    <div class="mt-5">
        <div class="relative overflow-auto shadow-md sm:rounded-lg">

        </div>
    </div>

</x-index-layout> --}}