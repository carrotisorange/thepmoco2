<table class="min-w-full divide-y divide-gray-300">
    <thead class="bg-gray-50">
        <tr>
            <td class="font-medium whitespace-nowrap py-2 pl-4 pr-3 text-sm text-gray-500 sm:pl-6">
                Property
            </td>
            @foreach ($properties as $property)
            <th scope="col"
                class="whitespace-nowrap py-3.5 pl-4 pr-3 text-left text-sm font-light text-gray-900 sm:pl-6">
                {{ $property->property->property }} <a href="/property/{{ $property->property->uuid }}/edit"><i
                        class="fa-solid fa-pen-to-square"></i></a>
            </th>
            @endforeach
        </tr>
    </thead>
    <tbody class="divide-y divide-gray-200 bg-white">
        <tr>
            <td class="font-medium whitespace-nowrap py-2 pl-4 pr-3 text-sm text-gray-500 sm:pl-6">
                Type</td>
            @foreach ($properties as $property)
            <th scope="col"
                class="whitespace-nowrap py-3.5 pl-4 pr-3 text-left text-sm font-light text-gray-900 sm:pl-6">
                {{ $property->property->type->type }}
            </th>
            @endforeach
        </tr>
    </tbody>

    <tbody class="divide-y divide-gray-200 bg-white">
        <tr>
            <td class="font-medium whitespace-nowrap py-2 pl-4 pr-3 text-sm text-gray-500 sm:pl-6">
                Personnel</td>
            @foreach ($properties as $property)
            <th scope="col"
                class="whitespace-nowrap py-3.5 pl-4 pr-3 text-left text-sm font-light text-gray-900 sm:pl-6">
                {{ $property->property->property_users()->count() }}
            </th>
            @endforeach
        </tr>
    </tbody>
    <tbody class="divide-y divide-gray-200 bg-white">
        <tr>
            <td class="font-medium whitespace-nowrap py-2 pl-4 pr-3 text-sm text-gray-500 sm:pl-6">
                Units</td>
            @foreach ($properties as $property)
            <th scope="col"
                class="whitespace-nowrap py-3.5 pl-4 pr-3 text-left text-sm font-light text-gray-900 sm:pl-6">
                {{ $property->property->units->count() }}
            </th>
            @endforeach

        </tr>
    <tbody>
    <tbody class="divide-y divide-gray-200 bg-white">
        <tr>
            <td class="font-medium whitespace-nowrap py-2 pl-4 pr-3 text-sm text-gray-500 sm:pl-6">
                Occupied Units</td>
            @foreach ($properties as $property)
            <th scope="col"
                class="whitespace-nowrap py-3.5 pl-4 pr-3 text-left text-sm font-light text-gray-900 sm:pl-6">
                {{ $property->property->units->where('status_id', 2)->count() }}
            </th>
            @endforeach

        </tr>
    <tbody>
    <tbody class="divide-y divide-gray-200 bg-white">
        <tr>
            <td class="font-medium whitespace-nowrap py-2 pl-4 pr-3 text-sm text-gray-500 sm:pl-6">
                Vacant Units</td>
            @foreach ($properties as $property)
            <th scope="col"
                class="whitespace-nowrap py-3.5 pl-4 pr-3 text-left text-sm font-light text-gray-900 sm:pl-6">
                {{ $property->property->units->where('status_id', 1)->count() }}
            </th>
            @endforeach

        </tr>
    </tbody>
    <tbody class="divide-y divide-gray-200 bg-white">
        <tr>
            <td class="font-medium whitespace-nowrap py-2 pl-4 pr-3 text-sm text-gray-500 sm:pl-6">
                Reserved Units</td>
            @foreach ($properties as $property)
            <th scope="col"
                class="whitespace-nowrap py-3.5 pl-4 pr-3 text-left text-sm font-light text-gray-900 sm:pl-6">
                {{ $property->property->units->where('status_id', 4)->count() }}
            </th>
            @endforeach

        </tr>
    </tbody>
    <tbody class="divide-y divide-gray-200 bg-white">
        <tr>
            <td class="font-medium whitespace-nowrap py-2 pl-4 pr-3 text-sm text-gray-500 sm:pl-6">
                Dirty Units
            </td>
            @foreach ($properties as $property)
            <th scope="col"
                class="whitespace-nowrap py-3.5 pl-4 pr-3 text-left text-sm font-light text-gray-900 sm:pl-6">
                {{ $property->property->units->where('status_id', 3)->count() }}
            </th>
            @endforeach

        </tr>
    </tbody>
    <tbody class="divide-y divide-gray-200 bg-white">
        <tr>
            <td class="font-medium whitespace-nowrap py-2 pl-4 pr-3 text-sm text-gray-500 sm:pl-6">
                Pending Units
            </td>
            @foreach ($properties as $property)
            <th scope="col"
                class="whitespace-nowrap py-3.5 pl-4 pr-3 text-left text-sm font-light text-gray-900 sm:pl-6">
                {{ $property->property->units->where('status_id', 6)->count() }}
            </th>
            @endforeach

        </tr>
    </tbody>
    <tbody class="divide-y divide-gray-200 bg-white">
        <tr>
            <td class="font-medium whitespace-nowrap py-2 pl-4 pr-3 text-sm text-gray-500 sm:pl-6">
                Under Maintenance Units</td>
            @foreach ($properties as $property)
            <th scope="col"
                class="whitespace-nowrap py-3.5 pl-4 pr-3 text-left text-sm font-light text-gray-900 sm:pl-6">
                {{ $property->property->units->where('status_id', 5)->count() }}
            </th>
            @endforeach

        </tr>
    </tbody>
    <tbody class="divide-y divide-gray-200 bg-white">
        <tr>
            <td class="font-medium whitespace-nowrap py-2 pl-4 pr-3 text-sm text-gray-500 sm:pl-6">
                Tenants
            </td>
            @foreach ($properties as $property)
            <th scope="col"
                class="whitespace-nowrap py-3.5 pl-4 pr-3 text-left text-sm font-light text-gray-900 sm:pl-6">
                {{ $property->property->tenants->count() }}
            </th>
            @endforeach
        </tr>
    </tbody>

    <tbody class="divide-y divide-gray-200 bg-white">
        <tr>
            <td class="font-medium whitespace-nowrap py-2 pl-4 pr-3 text-sm text-gray-500 sm:pl-6">
                Occupancy Rate
            </td>
            @foreach ($properties as $property)
            @if($property->property->units->count())
            <?php $occupancy_rate = $property->property->units->where('status_id', 2)->count()/$property->property->units->count() * 100; ?>
            @else
            <?php $occupancy_rate = 0;?>
            @endif
            <th scope="col"
                class="whitespace-nowrap py-3.5 pl-4 pr-3 text-left text-sm font-light text-gray-900 sm:pl-6">
                {{ number_format($occupancy_rate, 2) }} %
            </th>
            @endforeach
        </tr>
    </tbody>
    <tbody class="divide-y divide-gray-200 bg-white">
        <tr>
            <td class="font-medium whitespace-nowrap py-2 pl-4 pr-3 text-sm text-gray-500 sm:pl-6">
                Bills For Collection
            </td>
            @foreach ($properties as $property)
            <th scope="col"
                class="whitespace-nowrap py-3.5 pl-4 pr-3 text-left text-sm font-light text-gray-900 sm:pl-6">
                {{ number_format($property->property->bills->sum('bill'), 2) }}
            </th>
            @endforeach
        </tr>
    </tbody>
    <tbody class="divide-y divide-gray-200 bg-white">
        <tr>
            <td class="font-medium whitespace-nowrap py-2 pl-4 pr-3 text-sm text-gray-500 sm:pl-6">
                Collected Bills
            </td>
            @foreach ($properties as $property)
            <th scope="col"
                class="whitespace-nowrap py-3.5 pl-4 pr-3 text-left text-sm font-light text-gray-900 sm:pl-6">
                {{ number_format($property->property->collections->sum('collection'), 2) }}
            </th>
            @endforeach
        </tr>
    </tbody>
    <tbody class="divide-y divide-gray-200 bg-white">
        <tr>
            <td class="font-medium whitespace-nowrap py-2 pl-4 pr-3 text-sm text-gray-500 sm:pl-6">
                Uncollected Bills
            </td>
            @foreach ($properties as $property)
            <th scope="col"
                class="whitespace-nowrap py-3.5 pl-4 pr-3 text-left text-sm font-light text-gray-900 sm:pl-6">
                {{ number_format($property->property->bills->whereIn('status', ['unpaid',
                'partially_paid'])->sum('bill') -
                $property->property->bills->whereIn('status', ['unpaid',
                'partially_paid'])->sum('initial_payment'), 2) }}
            </th>
            @endforeach
        </tr>
    </tbody>
    <tbody class="divide-y divide-gray-200 bg-white">
        <tr>
            <td class="font-medium whitespace-nowrap py-2 pl-4 pr-3 text-sm text-gray-500 sm:pl-6">
                Collection Efficiency
            </td>
            @foreach ($properties as $property)
            @if($property->property->bills->count())
            <?php $collection_efficiency = 
                                            $property->property->collections->sum('collection') / $property->property->bills->sum('bill'); ?>
            @else
            <?php $collection_efficiency = 0;?>
            @endif
            <th scope="col"
                class="whitespace-nowrap py-3.5 pl-4 pr-3 text-left text-sm font-light text-gray-900 sm:pl-6">
                {{ number_format($collection_efficiency * 100, 2) }} %
            </th>
            @endforeach
        </tr>
    </tbody>

    <tbody class="divide-y divide-gray-200 bg-white">
        <tr>
            <td class="font-medium whitespace-nowrap py-2 pl-4 pr-3 text-sm text-gray-500 sm:pl-6">
                Past Due Accounts
            </td>
            @foreach ($properties as $property)
            <th scope="col"
                class="whitespace-nowrap py-3.5 pl-4 pr-3 text-left text-sm font-light text-gray-900 sm:pl-6">
                {{ $property->property->bills->whereIn('status', ['unpaid',
                'partially_paid'])->count() -
                $property->property->bills->whereIn('status', ['unpaid',
                'partially_paid'])->count() }}
            </th>
            @endforeach
        </tr>
    </tbody>
    <tbody class="divide-y divide-gray-200 bg-white">
        <tr>
            <td class="font-medium whitespace-nowrap py-2 pl-4 pr-3 text-sm text-gray-500 sm:pl-6">
                Contracts</td>
            @foreach ($properties as $property)
            <th scope="col"
                class="whitespace-nowrap py-3.5 pl-4 pr-3 text-left text-sm font-light text-gray-900 sm:pl-6">
                {{ $property->property->contracts->count() }}
            </th>
            @endforeach
        </tr>
    </tbody>
    <tbody class="divide-y divide-gray-200 bg-white">
        <tr>
            <td class="font-medium whitespace-nowrap py-2 pl-4 pr-3 text-sm text-gray-500 sm:pl-6">
                Active Contracts</td>
            @foreach ($properties as $property)
            <th scope="col"
                class="whitespace-nowrap py-3.5 pl-4 pr-3 text-left text-sm font-light text-gray-900 sm:pl-6">
                {{ $property->property->contracts->where('status','active')->count() }}
            </th>
            @endforeach
        </tr>
    </tbody>
    <tbody class="divide-y divide-gray-200 bg-white">
        <tr>
            <td class="font-medium whitespace-nowrap py-2 pl-4 pr-3 text-sm text-gray-500 sm:pl-6">
                Expiring Contracts</td>
            @foreach ($properties as $property)
            <th scope="col"
                class="whitespace-nowrap py-3.5 pl-4 pr-3 text-left text-sm font-light text-gray-900 sm:pl-6">
                {{ $property->property->contracts->where('end','<=',Carbon\Carbon::now()->
                    addMonth())->count() }}
            </th>
            @endforeach
        </tr>
    </tbody>
    <tbody class="divide-y divide-gray-200 bg-white">
        <tr>
            <td class="font-medium whitespace-nowrap py-2 pl-4 pr-3 text-sm text-gray-500 sm:pl-6">
                Expired Contracts</td>
            @foreach ($properties as $property)
            <th scope="col"
                class="whitespace-nowrap py-3.5 pl-4 pr-3 text-left text-sm font-light text-gray-900 sm:pl-6">
                {{ $property->property->contracts->where('status','inactive')->count() }}
            </th>
            @endforeach
        </tr>
    </tbody>
    <tbody class="divide-y divide-gray-200 bg-white">
        <tr>
            <td class="font-medium whitespace-nowrap py-2 pl-4 pr-3 text-sm text-gray-500 sm:pl-6">
                Received Concerns
            </td>
            @foreach ($properties as $property)
            <th scope="col"
                class="whitespace-nowrap py-3.5 pl-4 pr-3 text-left text-sm font-light text-gray-900 sm:pl-6">
                {{ $property->property->concerns->count() }}
            </th>
            @endforeach
        </tr>
    </tbody>
    <tbody class="divide-y divide-gray-200 bg-white">
        <tr>
            <td class="font-medium whitespace-nowrap py-2 pl-4 pr-3 text-sm text-gray-500 sm:pl-6">
                Pending Concerns
            </td>
            @foreach ($properties as $property)
            <th scope="col"
                class="whitespace-nowrap py-3.5 pl-4 pr-3 text-left text-sm font-light text-gray-900 sm:pl-6">
                {{ $property->property->concerns->where('status','pending')->count() }}
            </th>
            @endforeach
        </tr>
    </tbody>
    <tbody class="divide-y divide-gray-200 bg-white">
        <tr>
            <td class="font-medium whitespace-nowrap py-2 pl-4 pr-3 text-sm text-gray-500 sm:pl-6">
                Closed Concerns
            </td>
            @foreach ($properties as $property)
            <th scope="col"
                class="whitespace-nowrap py-3.5 pl-4 pr-3 text-left text-sm font-light text-gray-900 sm:pl-6">
                {{ $property->property->concerns->where('status','closed')->count() }}
            </th>
            @endforeach
        </tr>
    </tbody>
</table>