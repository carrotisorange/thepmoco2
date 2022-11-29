<table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
    <thead class="bg-gray-50">
        <tr>
            <x-th>#</x-th>
            <x-th>NAME</x-th>
            <x-th>STATUS</x-th>
            <x-th>UNIT</x-th>
            <x-th>TYPE</x-th>
            <x-th>CONTACT </x-th>
            <x-th>ADDRESS</x-th>
        </tr>
    </thead>
    <tbody class="bg-white divide-y divide-gray-200">
        @foreach($tenants as $index => $tenant )
        <tr>
            <x-td>{{ $index+1 }}</x-td>
            <x-td>
                <div class="flex items-center">
                    <div class="h-10 w-10 flex-shrink-0">

                        <img onerror="this.onerror=null;this.src='{{ asset('/brands/avatar.png') }}';"
                            class="h-10 w-10 rounded-full" src="{{ asset('/storage/'.$tenant->photo_id) }}" alt="">

                    </div>
                    <div class="ml-4">
                        <div class="text-gray-900">
                            <a class="text-blue-500 text-decoration-line: underline"
                                href="/property/{{ $tenant->property_uuid }}/tenant/{{ $tenant->uuid }}">
                                {{ $tenant->tenant }}
                            </a>

                        </div>
                        <div class="text-gray-500">{{
                            $tenant->email }}</div>
                    </div>
                </div>
            </x-td>
            <x-td>{{ $tenant->status }}</x-td>
            <x-td>
                <?php $contracts = App\Models\Contract::where('tenant_uuid', $tenant->uuid)->get(); ?>
                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                    @if($contracts->count())
                    @foreach ($contracts->take(1) as $item)
                    <a class="text-blue-500 text-decoration-line: underline"
                        href="/property/{{ $item->property_uuid }}/unit/{{ $item->unit->uuid }}">
                        {{ $item->unit->unit }}</a>
                
                    @endforeach
                    @else
                    NA
                    @endif
            </x-td>
            <x-td>
                @if($tenant->type)
                {{ $tenant->type }}
                @else
                NA
                @endif
            </x-td>
            <x-td>
                @if($tenant->mobile_number)
                {{ $tenant->mobile_number}}
                @else
                NA
                @endif
            </x-td>
            <x-td>{{
            $tenant->country->country.', '.$tenant->province->province.',
            '.$tenant->city->city.',
            '.$tenant->barangay }}</x-td>
        </tr>
        @endforeach
    </tbody>

</table>