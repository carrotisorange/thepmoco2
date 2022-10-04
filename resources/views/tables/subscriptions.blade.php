<table class="min-w-full table-fixed">
    <thead class="">
        <tr>
            <th scope="col" class="relative w-12 px-6 sm:w-16 sm:px-8">
                #
            </th>
            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                SUBSCRIBED ON
            </th>
            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                FEATURE
            </th>

            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                PRICE
            </th>
            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                STATUS
            </th>

            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                EXTERNAL ID</th>
                

        </tr>
    </thead>


    <tbody class=" divide-gray-50 border divide-y gap-y-6 bg-white">
        <!-- Selected: "bg-gray-50" -->
        @foreach($subscriptions as $index => $subscription )
        <tr>
            <!-- Selected: "text-indigo-600", Not Selected: "text-gray-900" -->
            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                {{ $index+1 }}
            </td>

            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                {{ Carbon\Carbon::parse($subscription->created_at)->format('M d, Y') }}
            </td>

            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                {{ App\Models\Feature::find($subscription->plan_id)->feature }}
            </td>
            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                {{ number_format($subscription->price, 2) }}
            </td>
            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                {{ $subscription->status }}
            </td>
            {{-- <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                {{ Carbon\Carbon::parse($subscription->trial_ends_at)->format('M d, Y') }}
            </td> --}}

            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                {{ $subscription->external_id }}
            </td>

        </tr>
        @endforeach
        <!-- More people... -->
    </tbody>

</table>