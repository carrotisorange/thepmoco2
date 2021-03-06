<x-index-layout>
    @section('title', '| Management Agreements')
    <x-slot name="labels">
        <li class="text-gray-500">
            {{ $owner->owner }}
        </li>
        <li><span class="text-gray-500 mx-2">/</span></li>
        <li class="text-gray-500">
            {{ Str::plural('Management Agreements', $enrollees->count())}} ({{ $enrollees->count() }})
        </li>
    </x-slot>

    <x-slot name="options">
        <x-button onclick="window.location.href='{{ url()->previous() }}'">Go back</x-button>
    </x-slot>

    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <?php $ctr =1; ?>
        <thead class="bg-gray-50">
            <tr>
                <x-th>#</x-th>
                <x-th>Unit</x-th>
                <x-th>Duration</x-th>
                <x-th>Contact</x-th>
                <x-th>Management fee</x-th>
                <x-th>Status</x-th>
            </tr>
        </thead>
        @foreach ($enrollees as $item)
        <tbody class="bg-white divide-y divide-gray-200">
            <tr>
                <x-td>{{ $ctr++ }}</x-td>
                <x-td>
                    <div class="text-sm text-gray-900">{{ $item->unit->unit }}
                    </div>
                    <div class="text-sm text-gray-500">{{ $item->unit->building->building }}
                    </div>
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

            </tr>

            <!-- More people... -->
        </tbody>
        @endforeach
    </table>

</x-index-layout>