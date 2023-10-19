<table class="min-w-full table-fixed">
  <thead class="">
        <tr>
            <x-th>#</x-th>
            <x-th>
                SUBSCRIBED ON
            </x-th>
          <x-th>
            FEATURE
          </x-th>

         <x-th>
            PRICE
         </x-th>
          <x-th>
            STATUS
          </x-th>



         <x-th>Description</x-th>
         <x-th>Expires on</x-th>


        </tr>
    </thead>


    <tbody class=" divide-gray-50 border divide-y gap-y-6 bg-white">
        <!-- Selected: "bg-gray-50" -->
        @foreach($subscriptions as $index => $subscription )
        <tr>
            <!-- Selected: "text-indigo-600", Not Selected: "text-gray-900" -->
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

            {{-- <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                {{ Carbon\Carbon::parse($subscription->trial_ends_at)->format('M d, Y') }}
            </td> --}}



            {{-- <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                @if($subscription->plan_id == '1')
                <a class="text-blue-500 text-decoration-line: underline"
                    href="/property/{{ Session::get('property_uuid') }}">Try this feature</a>
                @elseif($subscription->plan_id == '2')
                <a class="text-blue-500 text-decoration-line: underline"
                    href="/property/{{ Session::get('property_uuid') }}">Try this feature</a>
                @elseif($subscription->plan_id == '3')
                <a class="text-blue-500 text-decoration-line: underline"
                    href="/property/{{ Session::get('property_uuid') }}">Try this feature</a>
                @elseif($subscription->plan_id == '4')
                <a class="text-blue-500 text-decoration-line: underline"
                    href="/property/{{ Session::get('property_uuid') }}">Try this feature</a>
                @elseif($subscription->plan_id == '5')
                <a class="text-blue-500 text-decoration-line: underline"
                    href="/property/{{ Session::get('property_uuid') }}">Try this feature</a>
                @elseif($subscription->plan_id == '6')
                <a class="text-blue-500 text-decoration-line: underline"
                    href="/property/{{ Session::get('property_uuid') }}">Try this feature</a>
                @elseif($subscription->plan_id == '7')
                <a class="text-blue-500 text-decoration-line: underline"
                    href="/property/{{ Session::get('property_uuid') }}">Try this feature</a>
                @endif
            </td> --}}

        </tr>
        @endforeach
        <!-- More people... -->
    </tbody>

</table>
