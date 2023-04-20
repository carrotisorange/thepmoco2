<table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
    <?php $ctr =1; ?>
    <thead class="">
        <tr>
            <x-th>#</x-th>
            <x-th>Date</x-th>
            <x-th>Name</x-th>
            <x-th>Role</x-th>
            <x-th>Time in</x-th>
            <x-th>Time out</x-th>
            {{-- <x-th>Work hours</x-th> --}}
        </tr>
    </thead>
    @forelse ($sessions as $session)
    <tbody class="bg-white divide-y divide-gray-200">
        <tr>
            <x-td>{{ $ctr++ }}</x-td>
            <x-td>{{
                Carbon\Carbon::parse($session->created_at)->timezone('Asia/Manila')->format('M
                d, Y')}}
            </x-td>
            <x-td>{{ $session->user->name }}</x-td>
            <x-td>{{ $session->user->role->role }}</x-td>
            <x-td>
                {{Carbon\Carbon::parse($session->created_at)->timezone('Asia/Manila')->format('g:i
                A')}}
            </x-td>
            <x-td>
                @if($session->updated_at != '')
                {{Carbon\Carbon::parse($session->updated_at)->timezone('Asia/Manila')->format('g:i
                A')}}
                @else
                NA
                @endif
            </x-td>
            {{-- <x-td>
                @if($session->updated_at != '')
                {{
                Carbon\Carbon::createFromDate($session->updated_at)->diffInDays(Carbon\Carbon::createFromDate($session->created_at))
                }} hrs
                @else
                NA
                @endif

            </x-td> --}}
            @empty
            <x-td>No data found.</x-td>
        </tr>
    </tbody>
    @endforelse
</table>