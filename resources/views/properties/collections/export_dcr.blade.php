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
            line-height: 30px;
        }

        p,
            {
            margin-right: 5px;
            margin-left: 5px;
        }

        table,
        th,
        td {
            margin-right: 30px;
            margin-left: 50px;
            border: 1px black;
        }

        th,
        td {
            padding: 6px";

        }
    </style>
</head>

<body>
    <!-- Define header and footer blocks before your content -->
    <header>
        {{ Session::get('property_name') }} | Daily Collection Report
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
            Date: {{ Carbon\Carbon::parse($date)->format('M d, Y') }}
        </p>

     
        <table class="">

            <tr>
                <th>#</th>
                <th>AR #</th>
                <th>Bill #</th>
                <th>Unit</th>
                {{-- <th>Date</th> --}}
                <th>Name</th>
                <th>Particulars</th>
                <th>Period Covered</th>
                <th>Amount</th>
            </tr>

            @foreach($collections as $index => $item)

            <tr>
                <td>{{ $index+1 }}</td>
                <td>{{ $item->ar_no }}</td>
                <td>{{ $item->bill->bill_no }}</td>
                {{-- <td>{{ Carbon\Carbon::parse($item->bill->created_at)->format('M d, Y') }}</td> --}}
                <td>{{ $item->unit->unit }}</td>
                @if($item->tenant_uuid)
                <td>{{ substr_replace($item->tenant->tenant, "", 10) }}</td>
                @elseif($item->owner_uuid)
                <td>{{ substr_replace($item->owner->owner, "", 10) }}</td>
                @else
                <td>NA</td>
                @endif
                <td>{{ substr_replace($item->bill->particular->particular, "", 13) }}</td>
                <td>{{ Carbon\Carbon::parse($item->bill->start)->format('M d,
                    Y').'-'.Carbon\Carbon::parse($item->bill->end)->format('M d, Y') }} </td>
                <td>{{ number_format($item->collection,2) }}</td>

            </tr>

            @endforeach
        </table>
 

        <p>
            Prepared by: {{ auth()->user()->name }},<br> {{ auth()->user()->role->role }}
        </p>

    </main>
</body>

</html>