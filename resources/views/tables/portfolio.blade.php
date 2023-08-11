<table class="min-w-full divide-y divide-gray-300">
    <thead class="bg-gray-50">
        <tr>
            <td class="font-medium whitespace-nowrap py-2 pl-4 pr-3 text-sm text-gray-500 sm:pl-6">
                Property
            </td>
            @foreach ($portfolio->where('status', 'active') as $property)
            <th scope="col"
                class="whitespace-nowrap py-3.5 pl-4 pr-3 text-left text-sm font-light text-gray-900 sm:pl-6">
                      {{
                Str::limit($property->property,10) }} <a href="/property/{{ $property->property_uuid }}/edit"><i
                        class="fa-solid fa-pen-to-square"></i></a>
            </th>
            @endforeach
        </tr>
    </thead>

    <tbody class="divide-y divide-gray-200 bg-white">
        <tr>
            <td class="font-medium whitespace-nowrap py-2 pl-4 pr-3 text-sm text-gray-500 sm:pl-6">
                Type</td>
            @foreach ($portfolio->where('status', 'active') as $property)
            <th scope="col"
                class="whitespace-nowrap py-3.5 pl-4 pr-3 text-left text-sm font-light text-gray-900 sm:pl-6">
             {{
            Str::limit($property->type,10) }}
            </th>
            @endforeach
        </tr>
    </tbody>


    <tbody class="divide-y divide-gray-200 bg-white">
        <tr>
            <td class="font-medium whitespace-nowrap py-2 pl-4 pr-3 text-sm text-gray-500 sm:pl-6">
                Personnel</td>
            @foreach ($portfolio->where('status', 'active') as $property)
            <th scope="col"
                class="whitespace-nowrap py-3.5 pl-4 pr-3 text-left text-sm font-light text-gray-900 sm:pl-6">
                {{ App\Models\Property::find($property->uuid)->property_users()->count() }}
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
                {{ App\Models\Property::find($property->uuid)->units()->count() }}
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
                {{ App\Models\Property::find($property->uuid)->units->where('status_id', 2)->count() }}
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
                {{ App\Models\Property::find($property->uuid)->units->where('status_id', 1)->count() }}
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
                {{ App\Models\Property::find($property->uuid)->units->where('status_id', 4)->count() }}
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
                {{ App\Models\Property::find($property->uuid)->units->where('status_id', 3)->count() }}
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
                {{ App\Models\Property::find($property->uuid)->units->where('status_id', 6)->count() }}
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
                {{ App\Models\Property::find($property->uuid)->units->where('status_id', 5)->count() }}
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
                {{ App\Models\Property::find($property->uuid)->tenants->count() }}
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
            @if(App\Models\Property::find($property->uuid)->units->count())
            <?php $occupancy_rate = App\Models\Property::find($property->uuid)->units->where('status_id', 2)->count()/App\Models\Property::find($property->uuid)->units->count() * 100; ?>
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
                Posted Bills
            </td>
            @foreach ($properties as $property)
            <th scope="col"
                class="whitespace-nowrap py-3.5 pl-4 pr-3 text-left text-sm font-light text-gray-900 sm:pl-6">
                {{ number_format(App\Models\Bill::where('property_uuid',$property->uuid)->posted()->sum('bill'), 2) }}
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
                {{ number_format(App\Models\Collection::where('property_uuid',$property->uuid)->posted()->sum('collection'), 2) }}
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
                {{ number_format(App\Models\Bill::where('property_uuid',$property->uuid)->posted()->sum('bill')-App\Models\Collection::where('property_uuid',$property->uuid)->posted()->sum('collection'), 2) }}
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
            @if(App\Models\Bill::where('property_uuid',$property->uuid)->posted()->sum('bill') > 1)
            <?php $collection_efficiency = 
                App\Models\Collection::where('property_uuid',$property->uuid)->posted()->sum('collection') / App\Models\Bill::where('property_uuid',$property->uuid)->posted()->sum('bill'); ?>
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
                {{ App\Models\Property::find($property->uuid)->bills->whereIn('status', ['unpaid',
                'partially_paid'])->count() -
                App\Models\Property::find($property->uuid)->bills->whereIn('status', ['unpaid',
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
                {{ App\Models\Property::find($property->uuid)->contracts->count() }}
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
                {{ App\Models\Property::find($property->uuid)->contracts->where('status','active')->count() }}
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
                {{ App\Models\Property::find($property->uuid)->contracts->where('end','<=',Carbon\Carbon::now()->
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
                {{ App\Models\Property::find($property->uuid)->contracts->where('status','inactive')->count() }}
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
                {{ App\Models\Property::find($property->uuid)->concerns->count() }}
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
                {{ App\Models\Property::find($property->uuid)->concerns->where('status','pending')->count() }}
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
                {{ App\Models\Property::find($property->uuid)->concerns->where('status','closed')->count() }}
            </th>
            @endforeach
        </tr>
    </tbody> 
</table>