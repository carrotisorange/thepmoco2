<x-table-component>
  <x-table-head-component>
        <tr>

            <x-th>Booking ID</x-th>
            <x-th>Date</x-th>
        </tr>
    </x-table-head-component>
    <x-table-body-component>
        @foreach ($referrals as $referral)
        <tr>
            <x-td>{{ $referral->uuid }}</x-td>
            <x-td>{{ Carbon\Carbon::parse($referral->created_at)->timezone('Asia/Manila')->format('M d, Y @ H:i') }}
            </x-td>
        </tr>
        @endforeach
    </x-table-body-component>
</x-table-component>
