<x-index-layout>
    @section('title', 'Dashboard')
    <x-slot name="labels">
        Sales / {{ $user->name }} / Property
    </x-slot>
    <x-slot name="options">
        <x-button onclick="window.location.href='{{ url()->previous() }}'"> Go back to main
        </x-button>
    </x-slot>

    <div class="">
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="bg-gray-50">
                    <tr>
                        <x-th>#</x-th>
                        <x-th>Property</x-th>
                        <x-th>Description</x-th>
                        <x-th>Activity</x-th>
                        <x-th>Created</x-th>
                    </tr>
                </thead>
                @foreach ($activities as $activity)
                <tbody class="bg-white divide-y divide-gray-200">
                    <tr>
                        <x-td>{{ $activity->id }}</x-td>
                        <x-td>{{ $activity->property->property }}</x-td>
                        <x-td>{{ $activity->description }}</x-td>
                        <x-td>{{ $activity->activity_type->activity_type }}</x-td>
                        <x-td>{{Carbon\Carbon::parse($activity->created_at)->diffForHumans()}}</x-td>

                    </tr>
                </tbody>
                @endforeach
            </table>
        </div>
    </div>

</x-index-layout>