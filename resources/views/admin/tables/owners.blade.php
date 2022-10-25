<table class="min-w-full table-fixed">
    <thead class="">
        <tr>
            <th scope="col" class="relative w-12 px-6 sm:w-16 sm:px-8">

            </th>
            <th scope="col" class="min-w-[12rem] py-3.5 pr-3 text-left text-sm font-semibold text-gray-900">
                #</th>
            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                NAME</th>
            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                UNIT</th>
            {{-- <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                RENT</th> --}}

            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                CONTACT #</th>
            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                ADDRESS</th>


        </tr>
    </thead>


    <tbody class=" divide-gray-50 border divide-y gap-y-6 bg-white">
        <!-- Selected: "bg-gray-50" -->
        @foreach($owners as $index => $owner )
        <tr>
            <td class="relative w-12 px-6 sm:w-16 sm:px-8">
                <!-- Selected row marker, only show when row is selected. -->

                {{-- <input type="checkbox"
                    class="absolute left-4 top-1/2 -mt-2 h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500 sm:left-6">
                --}}
            </td>
            <!-- Selected: "text-indigo-600", Not Selected: "text-gray-900" -->
            <td class="whitespace-nowrap py-4 pr-3 text-sm font-medium text-gray-900">{{ $index+1 }}
            </td>
            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
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
                {{-- <a class="text-blue-500 text-decoration-line: underline"
                    href="/property/{{ $tenant->property_uuid }}/tenant/{{ $tenant->uuid }}">{{
                    $tenant->tenant }}</a>--}}
            </td>
            <?php $deed_of_sales = App\Models\DeedOfSale::where('owner_uuid', $owner->uuid)->get(); ?>
            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                @if($deed_of_sales->count())
                @foreach ($deed_of_sales->take(1) as $item)
                <a class="text-blue-500 text-decoration-line: underline"
                    href="/property/{{ $item->unit->property_uuid }}/unit/{{ $item->unit->uuid }}">
                    {{ $item->unit->unit }}</a>
                @endforeach
                @else
                NA
                @endif
            </td>
            {{-- <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">16,000.00
            </td> --}}
            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $owner->mobile_number
                }} </td>
            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{
                $owner->country->country.', '.$owner->province->province.', '.$owner->city->city.',
                '.$owner->barangay }}
            </td>


        </tr>
        @endforeach
        <!-- More people... -->
    </tbody>
</table>