<html>

<head>
    <style>
        /** Define the margins of your page **/
        @page {
            margin: 100px 25px;
        }

        header,
        h5 {
            position: fixed;
            top: -60px;
            left: 0px;
            right: 0px;
            height: 50px;

            /** Extra personal styles **/
            background-color: ;
            color: black;
            text-align: center;
            line-height: 35px;
        }

        footer {
            position: fixed;
            bottom: -60px;
            left: 0px;
            right: 0px;
            height: 50px;

            /** Extra personal styles **/
            background-color: #;
            color: black;
            text-align: center;
            line-height: 35px;
        }

        p,
        {
        margin-right: 50px;
        margin-left: 50px;
        }

        table,
        th,
        td {
            margin-right: 80px;
            margin-left: 50px;
            border: 1px black;
        }

        th,
        td {
            padding: 10px";

        }
    </style>
</head>

<body>
    <!-- Define header and footer blocks before your content -->
    <header>
        {{ Session::get('property_name') }} | Guest Information
        <br>
        <h5>{{ App\Models\Property::find(Session::get('property'))->country->country }},
            {{ App\Models\Property::find(Session::get('property'))->province->province }},
            {{ App\Models\Property::find(Session::get('property'))->city->city }},
            {{ App\Models\Property::find(Session::get('property'))->barangay }}
            <hr>
            <br>
        </h5>

    </header>

    <footer>
        <h5>
            For inquiries reach us at: {{ App\Models\Property::find(Session::get('property'))->email }} /
            {{ App\Models\Property::find(Session::get('property'))->mobile }}
        </h5>
        {{ Session::get('property_name') }} Copyright &copy;
        <?php echo date("Y");?>
    </footer>

    <!-- Wrap the content of your PDF inside a main tag -->
    <main>

        {{-- <p>
            Reference #: {{ $reference_no }}
        </p> --}}

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
            Length of stay: {{ $days }} day/s
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
            No of Person with Disability: {{ $guest->no_of_person_with_disability }}
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
                <th>#</th>
                <th>Name</th>
            </tr>

            @foreach($additional_guests as $index => $additional_guest)
            <tr>
                <td>{{ $index+1 }}</td>
                <td>{{ $additional_guest->additional_guest }}</td>
            </tr>
            @endforeach
        </table>
        @else
        <p>None</p>
        @endif

        <p>
            Prepared by: {{ auth()->user()->name }},<br> {{ auth()->user()->role->role }}
        </p>



    </main>
</body>

</html>