<x-table-component>
  <x-table-head-component>
        <tr>
            <x-th>Name</x-th>
            <x-th>Contract</x-th>
            <x-th>Admin</x-th>
            <x-th>Earned</x-th>
        </tr>
    </x-table-head-component>
    @forelse ($referrals as $referral)
    <x-table-body-component>
        <tr>
            <x-td>{{ $referral->referral }}</x-td>
            <x-td>{{$referral->contract->tenant->tenant.' in'.$referral->contract->unit->unit }}</x-td>
            <x-td>{{ $referral->contract->user->name }}</x-td>
            <x-td>{{ Carbon\Carbon::parse($referral->created_at)->timezone('Asia/Manila')->format('M d, Y @ H:i') }}
            </x-td>
            @empty
            <x-td>No data found.</x-td>
        </tr>
        @endforelse
    </x-table-body-component>
</x-table-component>
