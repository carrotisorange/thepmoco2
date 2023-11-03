<table class="min-w-full">
  <tdead class="">
        <tr>
            <x-td>
                <b>Property</b>
            </x-td>
            @foreach ($properties->where('status', 'active') as $property)
            <?php $propertyTypeLandingPage = App\Models\Feature::find(App\Models\Type::find( $property->type_id)->landing_page_feature_id)->alias;
                    ?>
            <x-td>
                <a class="text-purple-500 text-decoration-line: underline" href="/property/{{ $property->property_uuid }}/{{ $propertyTypeLandingPage }}">{{Str::limit($property->property) }}</a>
            </x-td>
            @endforeach
        </tr>
    </tdead>

    <tbody class="">
        <tr>
            <x-td>
              Type
            </x-td>
            @foreach ($properties->where('status', 'active') as $property)
            <x-td>
             {{
            Str::limit($property->type) }}
            </x-td>
            @endforeach
        </tr>
    </tbody>


    <tbody class="">
        <tr>
            <x-td>
                <b>Personnel</b></x-td>
            @foreach ($properties->where('status', 'active') as $property)
            <x-td>
                {{ App\Models\Property::find($property->uuid)->property_users()->count() }}
            </x-td>
            @endforeach
        </tr>
    </tbody>


    <tbody class="">
        <tr>
            <x-td>
                <b>Unit</b></x-td>
            @foreach ($properties as $property)
            <x-td>
                {{ App\Models\Property::find($property->uuid)->units()->count() }}
            </x-td>
            @endforeach

        </tr>
    <tbody>

        <tbody class="">
            <tr>
                <x-td>
                      <b>Rent Duration</b></x-td>


            </tr>
        <tbody>

    <tbody class="">
        <tr>
            <x-td>
                  Transient </x-td>
            @foreach ($properties as $property)
            <x-td>
                {{ App\Models\Property::find($property->uuid)->units->where('rent_duration', 'daily')->count() }}
            </x-td>
            @endforeach

        </tr>
    <tbody>

         <tbody class="">
        <tr>
            <x-td>
                  Long Term </x-td>
            @foreach ($properties as $property)
            <x-td>
                {{ App\Models\Property::find($property->uuid)->units->where('rent_duration', 'long_term')->count() }}
            </x-td>
            @endforeach

        </tr>
    <tbody>

    <tbody class="">
        <tr>
            <x-td>
                  Short Term </x-td>
            @foreach ($properties as $property)
            <x-td>
                {{ App\Models\Property::find($property->uuid)->units->where('rent_duration', 'short_term')->count() }}
            </x-td>
            @endforeach

        </tr>
    <tbody>

        <tbody class="">
            <tr>
                <x-td>
                      <b>Status</b></x-td>


            </tr>
        <tbody>

    <tbody class="">
        <tr>
            <x-td>
                   Occupied </x-td>
            @foreach ($properties as $property)
            <x-td>
                {{ App\Models\Property::find($property->uuid)->units->where('status_id', 2)->count() }}
            </x-td>
            @endforeach

        </tr>
    <tbody>


    <tbody class="">
        <tr>
            <x-td>
                   Vacant </x-td>
            @foreach ($properties as $property)
            <x-td>
                {{ App\Models\Property::find($property->uuid)->units->where('status_id', 1)->count() }}
            </x-td>
            @endforeach

        </tr>
    </tbody>


    <tbody class="">
        <tr>
            <x-td>
                    Reserved </x-td>
            @foreach ($properties as $property)
            <x-td>
                {{ App\Models\Property::find($property->uuid)->units->where('status_id', 4)->count() }}
            </x-td>
            @endforeach

        </tr>
    </tbody>


    <tbody class="">
        <tr>
            <x-td>
                   Dirty
            </x-td>
            @foreach ($properties as $property)
            <x-td>
                {{ App\Models\Property::find($property->uuid)->units->where('status_id', 3)->count() }}
            </x-td>
            @endforeach

        </tr>
    </tbody>


    <tbody class="">
        <tr>
            <x-td>
                   Pending
            </x-td>
            @foreach ($properties as $property)
            <x-td>
                {{ App\Models\Property::find($property->uuid)->units->where('status_id', 6)->count() }}
            </x-td>
            @endforeach

        </tr>
    </tbody>


    <tbody class="">
        <tr>
            <x-td>
                   Under Maintenance </x-td>
            @foreach ($properties as $property)
            <x-td>
                {{ App\Models\Property::find($property->uuid)->units->where('status_id', 5)->count() }}
            </x-td>
            @endforeach

        </tr>
    </tbody>

    <tbody class="">
        <tr>
            <x-td>
                <b>Tenant</b>
            </x-td>
            @foreach ($properties as $property)
            <x-td>
                {{ App\Models\Property::find($property->uuid)->tenants->count() }}
            </x-td>
            @endforeach
        </tr>
    </tbody>

    <tbody class="">
            <tr>
                <x-td>
                      Active</x-td>
                    @foreach ($properties as $property)
          <x-td>
                {{ App\Models\Property::find($property->uuid)->tenants->where('status', 'active')->count() }}
            </x-td>
            @endforeach

            </tr>
        <tbody>

            <tbody class="">
                <tr>
                    <x-td>
                          Inactive</x-td>
                        @foreach ($properties as $property)
               <x-td>
                        {{ App\Models\Property::find($property->uuid)->tenants->where('status', 'inactive')->count() }}
                    </x-td>
                    @endforeach

                </tr>
            <tbody>

            <tbody>

            <tbody class="">
                <tr>
                    <x-td>
                          Forced Moveout</x-td>
                        @foreach ($properties as $property)
               <x-td>
                        {{ App\Models\Property::find($property->uuid)->tenants->where('status', 'forcedmoveout')->count() }}
                    </x-td>
                    @endforeach

                </tr>
            <tbody>

    <tbody class="">
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
            <x-td>
                {{ number_format($occupancy_rate, 2) }} %
            </x-td>
            @endforeach
        </tr>
    </tbody>

     <tbody class="">
        <tr>
            <x-td>
              Posted Bills
            </x-td>
            @foreach ($properties as $property)
            <x-td>
               {{ number_format(App\Models\Bill::where('property_uuid',$property->uuid)->posted()->sum('bill'), 2) }}
            </x-td>
            @endforeach
        </tr>
    </tbody>

    <tbody class="">
        <tr>
            <x-td>
                 Collected Bills
            </x-td>
            @foreach ($properties as $property)
            <x-td>
                {{ number_format(App\Models\Collection::where('property_uuid',$property->uuid)->posted()->sum('collection'), 2) }}
            </x-td>
            @endforeach
        </tr>
    </tbody>

    <tbody class="">
        <tr>
            <x-td>
                 Uncollected Bills
            </x-td>
            @foreach ($properties as $property)
            <x-td>
                {{ number_format(App\Models\Bill::where('property_uuid',$property->uuid)->posted()->sum('bill')-App\Models\Collection::where('property_uuid',$property->uuid)->posted()->sum('collection'), 2) }}
            </x-td>
            @endforeach
        </tr>
    </tbody>

    <tbody class="">
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
            <x-td>
                {{ number_format($collection_efficiency * 100, 2) }} %
            </x-td>
            @endforeach
        </tr>
    </tbody>

    <tbody class="">
        <tr>
            <x-td>
                Past Due Accounts
            </x-td>
            @foreach ($properties as $property)
            <x-td>
                {{ App\Models\Property::find($property->uuid)->bills->where('status', 'unpaid')->count() -
                App\Models\Property::find($property->uuid)->bills->where('status', 'unpaid')->count() }}
            </x-td>
            @endforeach
        </tr>
    </tbody>


            <tbody class="">
        <tr>
            <x-td>
                <b>Contract</b></x-td>
            @foreach ($properties as $property)
            <x-td>
                {{ App\Models\Property::find($property->uuid)->contracts->count() }}
            </x-td>
            @endforeach
        </tr>
    </tbody>

    <tbody class="">
        <tr>
            <x-td>
                  Active </x-td>
            @foreach ($properties as $property)
            <x-td>
                {{ App\Models\Property::find($property->uuid)->contracts->where('status','active')->count() }}
            </x-td>
            @endforeach
        </tr>
    </tbody>

    <tbody class="">
        <tr>
            <x-td>
                   Expired </x-td>
            @foreach ($properties as $property)
            <x-td>
                {{ App\Models\Property::find($property->uuid)->contracts->where('status','inactive')->count() }}
            </x-td>
            @endforeach
        </tr>
    </tbody>

    <tbody class="">
        <tr>
            <x-td>
             <b>Concern</b>
            </x-td>
            @foreach ($properties as $property)
       <x-td>
                {{ App\Models\Property::find($property->uuid)->concerns->count() }}
            </x-td>
            @endforeach
        </tr>
    </tbody>
 <tbody class="">
        <tr>
            <x-td>
                 Active
            </x-td>
            @foreach ($properties as $property)
            <x-td>
                {{ App\Models\Property::find($property->uuid)->concerns->where('status','active')->count() }}
            </x-td>
            @endforeach
        </tr>
    </tbody>

    <tbody class="">
        <tr>
            <x-td>
                 Pending
            </x-td>
            @foreach ($properties as $property)
            <x-td>
                {{ App\Models\Property::find($property->uuid)->concerns->where('status','pending')->count() }}
            </x-td>
            @endforeach
        </tr>
    </tbody>
    <tbody class="">
        <tr>
            <x-td>
                 Closed
            </x-td>
            @foreach ($properties as $property)
            <x-td>
                {{ App\Models\Property::find($property->uuid)->concerns->where('status','closed')->count() }}
            </x-td>
            @endforeach
        </tr>
    </tbody>
</table>
