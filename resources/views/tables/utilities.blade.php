<table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
    <thead class="bg-gray-50">
        <tr>
            {{-- <x-th>#</x-th> --}}
            <x-th>REFERENCE #</x-th>
            <x-th>UTILITY</x-th>
            <x-th>UNIT </x-th>
            <x-th>PERIOD COVERED</x-th>
            {{-- <x-th>END DATE </x-th> --}}
            <x-th>PREVIOUS READING</x-th>
            <x-th>CURRENT READING</x-th>
            <x-th>CONSUMPTION</x-th>
            <x-th>RATE</x-th>
            <x-th>MIN CHARGE</x-th>
            <x-th>AMOUNT DUE</x-th>
            <x-th>STATUS</x-th>
            <x-th></x-th>

        </tr>
    </thead>
    <tbody class="bg-white divide-y divide-gray-200">
        @foreach ($utilities as $index => $item)
        <tr>
            {{-- <x-th>{{ $index+1 }}</x-th> --}}
            <x-th>
                {{ $item->unit.'-'.$item->id }}
            </x-th>
            <x-td>{{ $item->type }}</x-td>
            <x-td>
                <a class="text-blue-500 text-decoration-line: underline" target="_blank"
                    href="/property/{{ $item->property_uuid }}/unit/{{ $item->unit_uuid }}">{{ $item->unit_name }}</a>
            </x-td>
            <x-td>
                {{ Carbon\Carbon::parse($item->start_date)->format('M d, y') }}-{{
                Carbon\Carbon::parse($item->end_date)->format('M d, y') }}
            </x-td>
            {{-- <x-td>

            </x-td> --}}
            <x-td>
                {{ number_format($item->previous_reading, 2) }}
            </x-td>
            <x-td>
                {{ number_format($item->current_reading, 2) }}
            </x-td>
            <x-td>
                {{ number_format($item->current_consumption, 2) }}
            </x-td>
            <x-td>
                {{ number_format($item->kwh, 2) }}
            </x-td>
            <x-td>
                {{ number_format($item->min_charge, 2) }}
            </x-td>
            <x-td>
                {{ number_format(($item->total_amount_due), 2) }}
            </x-td>
            <x-td>
                {{ $item->status }}
                @if($item->status === 'unbilled')

                <span title="unbilled"
                    class="px-2 text-sm leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                    <i class="fa-solid fa-circle-xmark"></i>
                </span>

                @else
                <span title="billed"
                    class="px-2 text-sm leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                    <i class="fa-solid fa-circle-check"></i>
                </span>
                @endif

            </x-td>
            <x-td>

                @if($item->status === 'unbilled')
                <div class="group inline-block" wire:loading.remove>
                    <span>
                        <button
                            class="inline-flex items-center justify-center rounded-md border border-transparent bg-purple-500 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 sm:w-auto">
                            Bill
                            To</span>
                    <span>

                        <svg class="fill-current h-4 w-4 transform group-hover:-rotate-180
                                                                        transition duration-150 ease-in-out"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                        </svg>
                    </span>
                    </button>




                    </span>

                    <ul class="text-left z-99999 bg-white border rounded-sm transform scale-0 group-hover:scale-100 absolute 
                                                      transition duration-150 ease-in-out origin-top min-w-32">

                        <li class="rounded-sm px-3 py-1 hover:bg-gray-100"><a target="_blank"
                                href="/property/{{ $item->property_uuid }}/unit/{{ $item->unit_uuid }}/tenant/utility/{{ $item->id }}">Tenant</a>
                        </li>
                        <li class="rounded-sm px-3 py-1 hover:bg-gray-100"><a target="_blank"
                                href="/property/{{ $item->property_uuid }}/unit/{{ $item->unit_uuid }}/owner/utility/{{ $item->id }}">Owner</a>
                        </li>

                    </ul>

                </div>
                @endif
            </x-td>

        </tr>
        @endforeach
    </tbody>
</table>