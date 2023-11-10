<x-table-component>
  <x-table-head-component>
        <tr>
            <x-th>#</x-th>
            <x-th>SUBSCRIBED ON </x-th>
            <x-th>FEATURE </x-th>
            <x-th>PRICE </x-th>
            <x-th> STATUS </x-th>
            <x-th>Description</x-th>
            <x-th>Expires on</x-th>
        </tr>
    </x-table-head-component>
    <x-table-body-component>
        @foreach($subscriptions as $index => $subscription )
        <tr>
          <x-td>
            {{ $index+1 }}
          </x-td>
            <x-td>
                {{ Carbon\Carbon::parse($subscription->created_at)->format('M d, Y') }}
            </x-td>

           <x-td>
            {{ App\Models\Plan::find($subscription->plan_id)->plan }}
           </x-td>
         <x-td>
            {{ number_format($subscription->price, 2) }}
         </x-td>
         <x-td>
            {{ $subscription->status }}
         </x-td>
         <x-td>{{ $subscription->description }}</x-td>
         <x-td>
            {{ Carbon\Carbon::parse($subscription->created_at)->addDays($subscription->plan_expires_after)->format('M d, Y') }}
         </x-td>
        </tr>
        @endforeach
    </x-table-body-component>
</x-table-component>
