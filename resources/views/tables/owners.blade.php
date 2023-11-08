<x-table-component>
    <x-table-head-component>
        <tr>
            <x-th>#</x-th>
            <x-th>NAME</x-th>
            <x-th>UNIT</x-th>
            <x-th>CONTACT</x-th>
            <x-th>ADDRESS</x-th>
        </tr>
    </x-table-head-component>
    <x-table-body-component>
        @foreach($owners as $index => $owner )
        <tr>
           <x-td>{{ $index+1 }}</x-td>
            <x-td>
            <div class="flex items-center">
                <div class="h-10 w-10 flex-shrink-0">
                    <img class="h-10 w-10 rounded-full" src="{{ asset('/storage/'.$owner->photo_id) }}" alt="">
                </div>
                <div class="ml-4">
                    <div class="text-gray-900">
                        <x-link-component link="/property/{{ $owner->property_uuid }}/owner/{{ $owner->uuid }}">
                           {{ $owner->owner }}
                        </x-link-component>
                    </div>
                    <div class="text-gray-500">{{ $owner->email }}</div>
                </div>
            </div>
           </x-td>
           <x-td>
            <?php $deed_of_sales = App\Models\DeedOfSale::where('owner_uuid', $owner->uuid)->get(); ?>
            @if($deed_of_sales->count())
                @foreach ($deed_of_sales->take(1) as $item)
                <?php $unit = App\Models\Unit::where('uuid', $item->unit_uuid) ;?>
                <x-link-component link="/property/{{ Session::get('property_uuid') }}/unit/{{ $unit->pluck('uuid')->first() }}">
                    {{$unit->pluck('unit')->first() }}
                </x-link-component>
                @endforeach
            @else
                NA
            @endif
        </x-td>

           <x-td>{{ $owner->mobile_number   }}</x-td>
           <x-td>
            {{ $owner->country->country.', '.$owner->province->province.', '.$owner->city->city.','.$owner->barangay }}
            </x-td>
        </tr>
        @endforeach
    </x-table-body-component>
</x-table-component>
