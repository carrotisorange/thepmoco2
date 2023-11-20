<x-table-component>
  <x-table-head-component>
        <tr>
            <x-th>#</x-th>
            <x-th>UNIT </x-th>
            <x-th>PERIOD COVERED</x-th>
            <x-th>PREVIOUS/CURRENT/CONSUMPTION</x-th>
            <x-th>RATE</x-th>
            <x-th>MIN CHARGE</x-th>
            <x-th>AMOUNT DUE</x-th>
            <x-th>STATUS</x-th>
            <x-th></x-th>
        </tr>
    </x-table-head-component>
    <x-table-body-component>
        <tr>
            <x-td></x-td>
            <x-td></x-td>
            <x-td></x-td>
            <x-td>{{ $utilities->sum('previous_reading') }}/{{ $utilities->sum('current_reading') }}/{{ $utilities->sum('current_consumption') }}</x-td>
            <x-td></x-td>
            <x-td>{{ $utilities->sum('min_charge') }}</x-td>
            <x-td>{{ $utilities->sum('total_amount_due') }}</x-td>
            <x-td></x-td>
            <x-td></x-td>
        </tr>
    </x-table-body-component>
    <x-table-body-component>
        @foreach ($utilities as $index => $utility)
        <tr>
            <x-td>{{ $index+1 }}</x-td>
            <x-td>
                <x-link-component link="/property/{{ $utility->property_uuid }}/unit/{{ $utility->unit_uuid }}">
                   {{ $utility->unit_name }}
                </x-link-component>
            </x-td>
            <x-td>
                {{ Carbon\Carbon::parse($utility->start_date)->format('M d, y') }}-{{
                Carbon\Carbon::parse($utility->end_date)->format('M d, y') }}
            </x-td>
            <x-td>
                {{ number_format($utility->previous_reading, 2) }}/{{ number_format($utility->current_reading, 2) }}/{{ number_format($utility->current_consumption, 2) }}
            </x-td>
            <x-td>
                {{ number_format($utility->kwh, 2) }}
            </x-td>
            <x-td>
                {{ number_format($utility->min_charge, 2) }}
            </x-td>
            <x-td>
                {{ number_format(($utility->total_amount_due), 2) }}
                @if($utility->type === 'water')
                <span title="water" class="px-2 text-sm leading-5 font-semibold rounded-full bg-red-100 text-blue-800">
                    <i class="fa-solid fa-glass-water"></i>
                </span>
                @else
                <span title="electric"
                    class="px-2 text-sm leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                    <i class="fa-solid fa-bolt"></i>
                </span>
                @endif
            </x-td>
            <x-td>
                {{ $utility->status }}
                @if($utility->status === 'unbilled')

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
                <x-button data-modal-toggle="edit-utility-modal-{{$utility->id}}">
                    Edit
                </x-button>
            </x-td>
        </tr>
        @livewire('edit-utility-component', ['utility' => $utility], key($utility->id))
        @endforeach
    </x-table-body-component>
</x-table-component>
