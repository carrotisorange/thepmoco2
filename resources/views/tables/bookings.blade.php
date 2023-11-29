<x-table-component>
    <x-table-head-component>
        <tr>
            <x-th>#</x-th>
            <x-th>Unit</x-th>
            <x-th>Guest</x-th>
            <x-th>Rent/night</x-th>
            <x-th>Check-in</x-th>
            <x-th>Check-out</x-th>
            <x-th>Status</x-th>
            <x-th>Agent</x-th>
            <x-th></x-th>

        </tr>
    </x-table-head-component>
    <x-table-body-component>
        @foreach ($bookings as $index => $booking)
        <tr>
            <x-td>{{ $index+1 }}</x-td>
            <x-td>
                <x-link-component link="/property/{{ $booking->property_uuid }}/unit/{{ $booking->unit->uuid }}">
                    {{ $booking->unit->unit }}
                </x-link-component>
            </x-td>
            <x-td>
                <x-link-component link="/property/{{ $booking->property_uuid }}/guest/{{ $booking->guest->uuid }}">
                    {{ $booking->guest->guest }}
                </x-link-component>
            </x-td>

            <x-td>{{ number_format($booking->price,2) }}</x-td>
            <x-td>{{Carbon\Carbon::parse($booking->movein_at)->format('M d, Y')}}</x-td>
            <x-td>{{Carbon\Carbon::parse($booking->moveout_at)->format('M d, Y')}}</x-td>
            <x-td>{{ $booking->status }}</x-td>
            <x-td> {{ $booking->agent->agent }} </x-td>
            <x-td>
                <x-button data-modal-toggle="edit-booking-modal-{{$booking->uuid}}">
                    Edit
                </x-button>
                {{-- <x-button data-modal-toggle="checkout-booking-modal-{{$booking->uuid}}">
                    Checkout
                </x-button> --}}
            </x-td>

        </tr>

        @livewire('edit-booking-component',['property' => App\Models\Property::find(Session::get('property_uuid')), 'booking'=> $booking], key(Carbon\Carbon::now()->timestamp.''.$booking->id))
        @endforeach
    </x-table-body-component>
</x-table-component>
