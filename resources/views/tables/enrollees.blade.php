<table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
    <thead class="bg-gray-50">
        <tr>
            <x-th>Unit</x-th>
            <x-th>Duration</x-th>
            <x-th>Contact</x-th>
            <x-th>Management fee</x-th>
            <x-th>Status</x-th>
        </tr>
    </thead>
    @forelse ($enrollees as $item)
    <tbody class="bg-white divide-y divide-gray-200">
        <tr>
            <x-td>
                {{ $item->unit->unit }}
            </x-td>
            <x-td>
                <div class="text-sm text-gray-900">{{
                    Carbon\Carbon::parse($item->start)->format('M d, Y').' -
                    '.Carbon\Carbon::parse($item->end)->format('M d, Y') }}
                </div>
                <div class="text-sm text-gray-500">{{
                    Carbon\Carbon::parse($item->end)->diffForHumans($item->start)
                    }}
                </div>
            </x-td>
            <x-td>
                <div class="text-sm text-gray-900">{{ $item->owner->email }}
                </div>
                <div class="text-sm text-gray-500">{{ $item->owner->mobile_number }}
                </div>
            </x-td>
            <x-td>
                {{number_format($item->price, 2)}}
            </x-td>
            <x-td>
                @if($item->status === 'active')
                <span class="px-2 text-sm leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                    <i class="fa-solid fa-circle-check"></i> {{ $item->status }}
                </span>
                @else
                <span class="px-2 text-sm leading-5 font-semibold rounded-full bg-orange-100 text-orange-800">
                    <i class="fa-solid fa-circle-xmark"></i> {{
                    $item->status }}
                </span>
                @endif
                @if($item->end <= Carbon\Carbon::now()->addMonth())
                    <span class="px-2 text-sm leading-5 font-semibold rounded-full bg-orange-100 text-orange-800">
                        <i class="fa-solid fa-circle-xmark"></i> expiring
                    </span>
                    @endif
            </x-td>
            @empty
            <x-td>No data found.</x-td>
        </tr>
        @endforelse
    </tbody>
</table>