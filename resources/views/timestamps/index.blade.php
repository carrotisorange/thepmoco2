<x-index-layout>
    @section('title', '| Timestamp')
    <x-slot name="labels">
        Timestamp
    </x-slot>

    <x-slot name="options">

    </x-slot>

    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <?php $ctr =1; ?>
        <thead class="bg-gray-50">
            <tr>
                <x-th>#</x-th>
                <x-th>Date</x-th>
                <x-th>Name</x-th>
                <x-th>Role</x-th>
                <x-th>Time in</x-th>
                <x-th>Time out</x-th>
                <x-th>Work hours</x-th>
            </tr>
        </thead>
        @forelse ($timestamps as $timestamp)
        <tbody class="bg-white divide-y divide-gray-200">
            <tr>
                <x-td>{{ $ctr++ }}</x-td>
                <x-td>{{ Carbon\Carbon::parse($timestamp->created_at)->timezone('Asia/Manila')->format('M d, Y')}}
                </x-td>
                <x-td>{{ $timestamp->user->name }}</x-td>
                <x-td>{{ $timestamp->user->role->role }}</x-td>
                <x-td>{{
                    Carbon\Carbon::parse($timestamp->created_at)->timezone('Asia/Manila')->format('g:i A')}}
                </x-td>
                <x-td>{{
                    Carbon\Carbon::parse($timestamp->updated_at)->timezone('Asia/Manila')->format('g:i A')}}
                </x-td>
                <x-td>
                    {{
                    Carbon\Carbon::createFromDate($timestamp->updated_at)->diffInDays(Carbon\Carbon::createFromDate($timestamp->created_at))
                    }} hrs
                </x-td>
                @empty
                <x-td>No data found.</x-td>
            </tr>
        </tbody>
        @endforelse
    </table>

</x-index-layout>