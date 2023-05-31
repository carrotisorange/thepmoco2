@extends('layouts.export')
@section('title', 'Guest Information')
@section('content')
    <p>
        Date: {{ Carbon\Carbon::now()->format('M d, Y') }}
    </p>
    
    
    <p>
        Confirmation No: {{ $guest->uuid }}
    </p>
    
    <p>
        Guest: {{ $guest->guest }}
    </p>
    
    <p>
        Mobile: {{ $guest->mobile_number }}
    </p>
    
    <p>
        Email: {{ $guest->email }}
    </p>
    
    <p>
        Room: {{ $guest->unit->unit }}
    </p>
    
    <p>
        Expected Arrival Date and Time: {{ Carbon\Carbon::parse($guest->movein_at)->format('M d, Y') }} @ {{
        $guest->arrival_time }}
    </p>
    
    <p>
        Expected Departure Date and Time: {{ Carbon\Carbon::parse($guest->moveout_at)->format('M d, Y') }} @ {{
        $guest->departure_time }}
    </p>
    
    <?php 
                $start = strtotime($guest->movein_at); // convert to timestamps
                $end = strtotime($guest->moveout_at); // convert to timestamps
                $days = (int)(($end - $start)/86400);
            ;?>
    
    <p>
        Lengx-th of stay: {{ $days }} day/s
    </p>
    
    <p>
        Total Bill Amount: {{ number_format($guest->bills->sum('bill'), 2) }}
    </p>
    
    <p>
        Vehicle Details: {{ $guest->vehicle_details }}
    </p>
    
    <p>
        Plate Number: {{ $guest->plate_number }}
    </p>
    
    <p>
        Special Request: {{ $guest->special_request }}
    </p>
    
    <p>
        Flight Itinerary: {{ $guest->flight_itinerary }}
    </p>
    
    <p>
        No of Senior Citizens: {{ $guest->no_of_senior_citizens }}
    </p>
    
    <p>
        No of Person wix-th Disability: {{ $guest->no_of_person_wix-th_disability }}
    </p>
    
    <p>
        No of Children: {{ $guest->no_of_children }}
    </p>
    
    <p>
        <b>Additional Guests</b>
    </p>
    
    @if($additional_guests->count()>0)
    <table class="">
    
        <tr>
            <x-th>#</x-th>
            <x-th>Name</x-th>
        </tr>
    
        @foreach($additional_guests as $index => $additional_guest)
        <tr>
            <x-td>{{ $index+1 }}</x-td>
            <x-td>{{ $additional_guest->additional_guest }}</x-td>
        </tr>
        @endforeach
    </table>
    @else
    <p>None</p>
    @endif
 
@endsection