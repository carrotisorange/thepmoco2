<x-index-layout>
    @section('title', '| Timestamps')
    <x-slot name="labels">
        Timestamps
    </x-slot>

    <x-slot name="options">

    </x-slot>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="min-w-full divide-y divide-gray-200">
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
                    <x-td>No data found!</x-td>
                </tr>
            </tbody>
            @endforelse
        </table>
    </div>

</x-index-layout>