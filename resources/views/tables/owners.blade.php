<table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
    <thead class="bg-gray-50">
        <tr>
            <x-th>#</x-th>
            <x-th>UNIT</x-th>
            <x-th>NAME</x-th>
           
            <x-th>CONTACT</x-th>
            <x-th>ADDRESS</x-th>
        </tr>
    </thead>

    <tbody class="bg-white divide-y divide-gray-200">
        <!-- Selected: "bg-gray-50" -->
        @foreach($owners as $index => $owner )
        <tr>
           <x-td>{{ $index+1 }}</x-td>
           <x-td>
            <?php $deed_of_sales = App\Models\DeedOfSale::where('owner_uuid', $owner->uuid)->get(); ?>
        
            @if($deed_of_sales->count())
            @foreach ($deed_of_sales->take(1) as $item)
            <a class="text-blue-500 text-decoration-line: underline"
                href="/property/{{ $item->unit->property_uuid }}/unit/{{ $item->unit->uuid }}">
                {{ $item->unit->unit }}</a>
            @endforeach
            @else
            NA
            @endif
        </x-td>
           <x-td>
            <div class="flex items-center">
                <div class="h-10 w-10 flex-shrink-0">
                    <img class="h-10 w-10 rounded-full" src="{{ asset('/storage/'.$owner->photo_id) }}" alt="">
                </div>
                <div class="ml-4">
                    <div class="text-gray-900">
                        <a class="text-blue-500 text-decoration-line: underline"
                            href="/property/{{ $owner->property_uuid }}/owner/{{ $owner->uuid }}">
                            {{ $owner->owner }}
                        </a>
            
                    </div>
                    <div class="text-gray-500">{{
                                           $owner->email }}</div>
                </div>
            </div>
           </x-td>
           
           <x-td>{{ $owner->mobile_number   }}</x-td>
           <x-td>
            {{
            $owner->country->country.', '.$owner->province->province.', '.$owner->city->city.',
            '.$owner->barangay }}
            </x-td>
        </tr>
        @endforeach
    </tbody>
</table>