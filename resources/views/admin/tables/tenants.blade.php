<table class="min-w-full table-fixed">
    <thead class="">
        <tr>
            <th scope="col" class="relative w-12 px-6 sm:w-16 sm:px-8">

            </th>
            <th scope="col" class="min-w-[12rem] py-3.5 pr-3 text-left text-sm font-semibold text-gray-900">
                #</th>
            {{-- <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                REFERENCE #
            </th> --}}
            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                NAME</th>
            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                UNIT
            </th>
            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                STATUS</th>


            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                CONTACT #</th>
            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                ADDRESS</th>

            {{-- <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
            </th> --}}

        </tr>
    </thead>

    @foreach($tenants as $index => $tenant )
    <tbody class=" divide-gray-50 border divide-y gap-y-6 bg-white">
        <!-- Selected: "bg-gray-50" -->

        <tr>
            <td class="relative w-12 px-6 sm:w-16 sm:px-8">
                <!-- Selected row marker, only show when row is selected. -->

                {{-- <input type="checkbox"
                    class="absolute left-4 top-1/2 -mt-2 h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500 sm:left-6">
                --}}
            </td>

            <!-- Selected: "text-indigo-600", Not Selected: "text-gray-900" -->
            <td class="whitespace-nowrap py-4 pr-3 text-sm font-medium text-gray-900">
                {{ $index+1 }}
            </td>
            {{-- <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{
                $tenant->bill_reference_no
                }} </td> --}}
            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                <div class="flex items-center">
                    <div class="h-10 w-10 flex-shrink-0">
                        <img class="h-10 w-10 rounded-full" src="{{ asset('/storage/'.$tenant->photo_id) }}" alt="">
                    </div>
                    <div class="ml-4">
                        <div class="text-gray-900">
                           <a class="text-blue-500 text-decoration-line: underline" href="/property/{{ $tenant->property_uuid }}/tenant/{{ $tenant->uuid }}">
                           {{ $tenant->tenant }}
                        </a>
                           
                        </div>
                        <div class="text-gray-500">{{
                            $tenant->email }}</div>
                    </div>
                </div>
                {{-- <a class="text-blue-500 text-decoration-line: underline"
                    href="/property/{{ $tenant->property_uuid }}/tenant/{{ $tenant->uuid }}">{{
                    $tenant->tenant }}</a>--}}
            </td>
            <?php $contracts = App\Models\Contract::where('tenant_uuid', $tenant->uuid)->get(); ?>
            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                @if($contracts->count())
                @foreach ($contracts->take(1) as $item)
                <div class="text-gray-900"><a class="text-blue-500 text-decoration-line: underline"
                        href="/property/{{ $item->property_uuid }}/unit/{{ $item->unit->uuid }}">
                        {{ $item->unit->unit }}</a></div>
                <div class="text-gray-500">{{ $item->unit->building->building }}</div>
                @endforeach
                @else
                NA
                @endif
            </td>
            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                @if($tenant->type)
                {{ $tenant->type }}
                @else
                NA
                @endif
            </td>

            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                @if($tenant->mobile_number)
                {{ $tenant->mobile_number}}
                @else
                NA
                @endif
            </td>
            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{
                $tenant->country->country.', '.$tenant->province->province.',
                '.$tenant->city->city.',
                '.$tenant->barangay }}
            </td>
            {{-- <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                <a href="{{ asset('/storage/'.$tenant->photo_id) }}" target="_blank"
                    class="text-indigo-600 hover:text-indigo-900">View Attachment</a>
            </td> --}}



        </tr>

    </tbody>
    @endforeach
</table>