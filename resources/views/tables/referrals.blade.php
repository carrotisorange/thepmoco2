<table class="min-w-full divide-y divide-gray-200">
    <thead class="bg-gray-50">
        <tr>
            <x-th>Name</x-th>
            <x-th>Contract</x-th>
            <x-th>Admin</x-th>
            <x-th>Earned</x-th>
        </tr>
    </thead>
    @forelse ($referrals as $referral)
    <tbody class="bg-white divide-y divide-gray-200">
        <tr>
            <x-td>{{ $referral->referral }}</x-td>
            <x-td>{{$referral->contract->tenant->tenant.' in
                '.$referral->contract->unit->unit }}</x-td>
            <x-td>{{ $referral->contract->user->name }}</x-td>
            <x-td>
                <{{ Carbon\Carbon::parse($referral->
                    created_at)->timezone('Asia/Manila')->format('M
                    d, Y @ H:i') }}
            </x-td>
            @empty
            <x-td>No data found.</x-td>
        </tr>
        @endforelse
    </tbody>
</table>