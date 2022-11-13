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
        {{ Session::get('property_name') }} | Statements of Account
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

        <p>
            Reference #: {{ $reference_no }}
        </p>

        <p>
            Date: {{ Carbon\Carbon::now()->format('M d, Y') }}
        </p>
        <p>
            <b>Due Date: {{ Carbon\Carbon::parse($due_date)->format('M d, Y') }}</b>
        </p>
        <p>
            Owner: {{ $owner }}
        </p>
        <p>
            Bills to be Paid: {{ number_format($bills->sum('bill'), 2) }}
        </p>
        <p>
            <b>Bills to be Paid After Due Date: {{ number_format(($bills->sum('bill') +$penalty), 2) }}</b>
        </p>
        <br>
        <p>
            <b>Bills Breakdown</b>
        </p>
        <p>
        <table class="">

            <tr>
                <th>Bill #</th>
                <th>Bill Posted</th>
                <th>Unit</th>
                <th>Particular</th>
                <th>Period Covered</th>
                <th>Amount Due</th>
            </tr>

            @foreach($bills as $item)

            <tr>
                @if ($item->bill-$item->initial_payment > 0)
                <td>{{ $item->bill_no }}</td>
                <td>{{ Carbon\Carbon::parse($item->created_at)->format('M d, Y') }}</td>
                <td>{{ $item->unit->unit }}</td>
                <td>{{ $item->particular->particular }}</td>
                <td>{{ Carbon\Carbon::parse($item->start)->format('M d,
                    Y').'-'.Carbon\Carbon::parse($item->end)->format('M d, Y') }} </td>
                <td>{{ number_format(($item->bill-$item->initial_payment),2) }}</td>
                @endif
            </tr>
            @endforeach
        </table>
        </p>
        @if($note_to_bill)
        <p class="text-center">
            <b>"{{ $note_to_bill }}"</b>
        </p>
        @endif
        <p>
            Prepared by: {{ $user }},<br> {{ $role }}
        </p>



    </main>
</body>

</html>