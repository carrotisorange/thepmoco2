<table class="min-w-full divide-y divide-gray-300">
    <thead class="bg-gray-50">
        <tr>
            <x-td>
                <b>Property</b>
            </x-td>
            @foreach ($properties->where('status', 'active') as $property)
            <?php $propertyTypeLandingPage = App\Models\Feature::find(App\Models\Type::find( $property->type_id)->landing_page_feature_id)->alias;
                    ?>
            <x-th>
                <a class="text-purple-500 text-decoration-line: underline" href="/property/{{ $property->property_uuid }}/{{ $propertyTypeLandingPage }}">{{Str::limit($property->property) }}</a>
            </x-th>
            @endforeach
        </tr>
    </thead>

    <tbody class="divide-y divide-gray-200 bg-white">
        <tr>
            <x-td>
            &nbsp; &nbsp; Type
            </x-td>
            @foreach ($properties->where('status', 'active') as $property)
            <x-th>
             {{
            Str::limit($property->type) }}
            </x-th>
            @endforeach
        </tr>
    </tbody>


    <tbody class="divide-y divide-gray-200 bg-white">
        <tr>
            <x-td>
                <b>Personnel</b></x-td>
            @foreach ($properties->where('status', 'active') as $property)
            <x-th>
                {{ App\Models\Property::find($property->uuid)->property_users()->count() }}
            </x-th>
            @endforeach
        </tr>
    </tbody>


    <tbody class="divide-y divide-gray-200 bg-white">
        <tr>
            <x-td>
                <b>Unit</b></x-td>
            @foreach ($properties as $property)
            <x-th>
                {{ App\Models\Property::find($property->uuid)->units()->count() }}
            </x-th>
            @endforeach

        </tr>
    <tbody>

        <tbody class="divide-y divide-gray-200 bg-white">
            <tr>
                <x-td>
                    &nbsp; &nbsp; <b>Rent Duration</b></x-td>


            </tr>
        <tbody>

    <tbody class="divide-y divide-gray-200 bg-white">
        <tr>
            <x-td>
                &nbsp; &nbsp;&nbsp; &nbsp;Transient </x-td>
            @foreach ($properties as $property)
            <x-th>
                {{ App\Models\Property::find($property->uuid)->units->where('rent_duration', 'daily')->count() }}
            </x-th>
            @endforeach

        </tr>
    <tbody>

         <tbody class="divide-y divide-gray-200 bg-white">
        <tr>
            <x-td>
                &nbsp; &nbsp;&nbsp; &nbsp;Long Term </x-td>
            @foreach ($properties as $property)
            <x-th>
                {{ App\Models\Property::find($property->uuid)->units->where('rent_duration', 'long_term')->count() }}
            </x-th>
            @endforeach

        </tr>
    <tbody>

    <tbody class="divide-y divide-gray-200 bg-white">
        <tr>
            <x-td>
                &nbsp; &nbsp; &nbsp;&nbsp;Short Term </x-td>
            @foreach ($properties as $property)
            <x-th>
                {{ App\Models\Property::find($property->uuid)->units->where('rent_duration', 'short_term')->count() }}
            </x-th>
            @endforeach

        </tr>
    <tbody>

        <tbody class="divide-y divide-gray-200 bg-white">
            <tr>
                <x-td>
                    &nbsp; &nbsp; <b>Status</b></x-td>


            </tr>
        <tbody>

    <tbody class="divide-y divide-gray-200 bg-white">
        <tr>
            <x-td>
                &nbsp; &nbsp; &nbsp; &nbsp;Occupied </x-td>
            @foreach ($properties as $property)
            <x-th>
                {{ App\Models\Property::find($property->uuid)->units->where('status_id', 2)->count() }}
            </x-th>
            @endforeach

        </tr>
    <tbody>


    <tbody class="divide-y divide-gray-200 bg-white">
        <tr>
            <x-td>
               &nbsp; &nbsp; &nbsp; &nbsp; Vacant </x-td>
            @foreach ($properties as $property)
            <x-th>
                {{ App\Models\Property::find($property->uuid)->units->where('status_id', 1)->count() }}
            </x-th>
            @endforeach

        </tr>
    </tbody>


    <tbody class="divide-y divide-gray-200 bg-white">
        <tr>
            <x-td>
                &nbsp; &nbsp; &nbsp; &nbsp; Reserved </x-td>
            @foreach ($properties as $property)
            <x-th>
                {{ App\Models\Property::find($property->uuid)->units->where('status_id', 4)->count() }}
            </x-th>
            @endforeach

        </tr>
    </tbody>


    <tbody class="divide-y divide-gray-200 bg-white">
        <tr>
            <x-td>
               &nbsp; &nbsp; &nbsp; &nbsp; Dirty
            </x-td>
            @foreach ($properties as $property)
            <x-th>
                {{ App\Models\Property::find($property->uuid)->units->where('status_id', 3)->count() }}
            </x-th>
            @endforeach

        </tr>
    </tbody>


    <tbody class="divide-y divide-gray-200 bg-white">
        <tr>
            <x-td>
               &nbsp; &nbsp; &nbsp; &nbsp; Pending
            </x-td>
            @foreach ($properties as $property)
            <x-th>
                {{ App\Models\Property::find($property->uuid)->units->where('status_id', 6)->count() }}
            </x-th>
            @endforeach

        </tr>
    </tbody>


    <tbody class="divide-y divide-gray-200 bg-white">
        <tr>
            <x-td>
               &nbsp; &nbsp; &nbsp; &nbsp; Under Maintenance </x-td>
            @foreach ($properties as $property)
            <x-th>
                {{ App\Models\Property::find($property->uuid)->units->where('status_id', 5)->count() }}
            </x-th>
            @endforeach

        </tr>
    </tbody>

    <tbody class="divide-y divide-gray-200 bg-white">
        <tr>
            <x-td>
                <b>Tenant</b>
            </x-td>
            @foreach ($properties as $property)
            <x-th>
                {{ App\Models\Property::find($property->uuid)->tenants->count() }}
            </x-th>
            @endforeach
        </tr>
    </tbody>

    <tbody class="divide-y divide-gray-200 bg-white">
            <tr>
                <x-td>
                    &nbsp; &nbsp; Active</x-td>
                    @foreach ($properties as $property)
          <x-th>
                {{ App\Models\Property::find($property->uuid)->tenants->where('status', 'active')->count() }}
            </x-th>
            @endforeach

            </tr>
        <tbody>

            <tbody class="divide-y divide-gray-200 bg-white">
                <tr>
                    <x-td>
                        &nbsp; &nbsp; Inactive</x-td>
                        @foreach ($properties as $property)
               <x-th>
                        {{ App\Models\Property::find($property->uuid)->tenants->where('status', 'inactive')->count() }}
                    </x-th>
                    @endforeach

                </tr>
            <tbody>

            <tbody>

            <tbody class="divide-y divide-gray-200 bg-white">
                <tr>
                    <x-td>
                        &nbsp; &nbsp; Forced Moveout</x-td>
                        @foreach ($properties as $property)
               <x-th>
                        {{ App\Models\Property::find($property->uuid)->tenants->where('status', 'forcedmoveout')->count() }}
                    </x-th>
                    @endforeach

                </tr>
            <tbody>

    <tbody class="divide-y divide-gray-200 bg-white">
        <tr>
            <x-td>
                Occupancy Rate
            </x-td>
            @foreach ($properties as $property)
            @if(App\Models\Property::find($property->uuid)->units->count())
            <?php $occupancy_rate = App\Models\Property::find($property->uuid)->units->where('status_id', 2)->count()/App\Models\Property::find($property->uuid)->units->count() * 100; ?>
            @else
            <?php $occupancy_rate = 0;?>
            @endif
            <x-th>
                {{ number_format($occupancy_rate, 2) }} %
            </x-th>
            @endforeach
        </tr>
    </tbody>

     <tbody class="divide-y divide-gray-200 bg-white">
        <tr>
            <x-td>
              Posted Bills
            </x-td>
            @foreach ($properties as $property)
            <x-th>
               {{ number_format(App\Models\Bill::where('property_uuid',$property->uuid)->posted()->sum('bill'), 2) }}
            </x-th>
            @endforeach
        </tr>
    </tbody>

    <tbody class="divide-y divide-gray-200 bg-white">
        <tr>
            <x-td>
              &nbsp; &nbsp;  Collected Bills
            </x-td>
            @foreach ($properties as $property)
            <x-th>
                {{ number_format(App\Models\Collection::where('property_uuid',$property->uuid)->posted()->sum('collection'), 2) }}
            </x-th>
            @endforeach
        </tr>
    </tbody>

    <tbody class="divide-y divide-gray-200 bg-white">
        <tr>
            <x-td>
               &nbsp; &nbsp; Uncollected Bills
            </x-td>
            @foreach ($properties as $property)
            <x-th>
                {{ number_format(App\Models\Bill::where('property_uuid',$property->uuid)->posted()->sum('bill')-App\Models\Collection::where('property_uuid',$property->uuid)->posted()->sum('collection'), 2) }}
            </x-th>
            @endforeach
        </tr>
    </tbody>

    <tbody class="divide-y divide-gray-200 bg-white">
        <tr>
            <x-td>
                Collection Efficiency
            </x-td>
            @foreach ($properties as $property)
            @if(App\Models\Bill::where('property_uuid',$property->uuid)->posted()->sum('bill') > 1)
            <?php $collection_efficiency =
                App\Models\Collection::where('property_uuid',$property->uuid)->posted()->sum('collection') / App\Models\Bill::where('property_uuid',$property->uuid)->posted()->sum('bill'); ?>
            @else
            <?php $collection_efficiency = 0;?>
            @endif
            <x-th>
                {{ number_format($collection_efficiency * 100, 2) }} %
            </x-th>
            @endforeach
        </tr>
    </tbody>

    <tbody class="divide-y divide-gray-200 bg-white">
        <tr>
            <x-td>
                Past Due Accounts
            </x-td>
            @foreach ($properties as $property)
            <x-th>
                {{ App\Models\Property::find($property->uuid)->bills->whereIn('status', ['unpaid',
                'partially_paid'])->count() -
                App\Models\Property::find($property->uuid)->bills->whereIn('status', ['unpaid',
                'partially_paid'])->count() }}
            </x-th>
            @endforeach
        </tr>
    </tbody>


            <tbody class="divide-y divide-gray-200 bg-white">
        <tr>
            <x-td>
                <b>Contract</b></x-td>
            @foreach ($properties as $property)
            <x-th>
                {{ App\Models\Property::find($property->uuid)->contracts->count() }}
            </x-th>
            @endforeach
        </tr>
    </tbody>

    <tbody class="divide-y divide-gray-200 bg-white">
        <tr>
            <x-td>
                &nbsp; &nbsp; Active </x-td>
            @foreach ($properties as $property)
            <x-th>
                {{ App\Models\Property::find($property->uuid)->contracts->where('status','active')->count() }}
            </x-th>
            @endforeach
        </tr>
    </tbody>

    <tbody class="divide-y divide-gray-200 bg-white">
        <tr>
            <x-td>
                &nbsp; &nbsp;  Expired </x-td>
            @foreach ($properties as $property)
            <x-th>
                {{ App\Models\Property::find($property->uuid)->contracts->where('status','inactive')->count() }}
            </x-th>
            @endforeach
        </tr>
    </tbody>

    <tbody class="divide-y divide-gray-200 bg-white">
        <tr>
            <x-td>
             <b>Concern</b>
            </x-td>
            @foreach ($properties as $property)
       <x-th>
                {{ App\Models\Property::find($property->uuid)->concerns->count() }}
            </x-th>
            @endforeach
        </tr>
    </tbody>
 <tbody class="divide-y divide-gray-200 bg-white">
        <tr>
            <x-td>
               &nbsp; &nbsp; Active
            </x-td>
            @foreach ($properties as $property)
            <x-th>
                {{ App\Models\Property::find($property->uuid)->concerns->where('status','active')->count() }}
            </x-th>
            @endforeach
        </tr>
    </tbody>

    <tbody class="divide-y divide-gray-200 bg-white">
        <tr>
            <x-td>
               &nbsp; &nbsp; Pending
            </x-td>
            @foreach ($properties as $property)
            <x-th>
                {{ App\Models\Property::find($property->uuid)->concerns->where('status','pending')->count() }}
            </x-th>
            @endforeach
        </tr>
    </tbody>
    <tbody class="divide-y divide-gray-200 bg-white">
        <tr>
            <x-td>
              &nbsp; &nbsp;  Closed
            </x-td>
            @foreach ($properties as $property)
            <x-th>
                {{ App\Models\Property::find($property->uuid)->concerns->where('status','closed')->count() }}
            </x-th>
            @endforeach
        </tr>
    </tbody>
</table>
