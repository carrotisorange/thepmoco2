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
        margin-right: 20px;
        margin-left: 20px;
        }

        table,
        th,
        td {
            margin-right: 10px;
            margin-left: 10px;
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
        {{ Session::get('property_name') }} | Purchase Order
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

    <main>
        <br>
        <p>
            <b>Batch No:</b> {{ $accountpayable->batch_no }}
        </p>
        <p>
            <b>Requested on:</b> {{
            Carbon\Carbon::parse($accountpayable->created_at)->format('M d, Y') }}
        </p>
        <p>
            <b>Due date:</b> {{
            Carbon\Carbon::parse($accountpayable->due_date)->format('M d, Y') }}
        </p>
        <p>
            <b>Requested by:</b> {{ $accountpayable->requester->name }}
        </p>
        <p>
            <b>Request for:</b> {{ $accountpayable->request_for }}< </p>
                <p>
                    Amount: {{ number_format($accountpayable->amount, 2) }}
                </p>

                <p>
                    Vendor: {{ $accountpayable->vendor }}
                </p>
                <p>
                    Delivery Date: {{
                    Carbon\Carbon::parse($accountpayable->delivery_att)->format('M d, Y') }}
                </p>

                <p>
                    Bank: {{ $accountpayable->bank }}
                </p>

                <p>
                    Bank Name: {{ $accountpayable->bank_name }}
                </p>

                <p>
                    Bank Account: {{ $accountpayable->bank_account }}
                </p>

                <br>
                <p><b>Particulars:</b></p>
                <table>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>UNIT</th>
                            <th>VENDOR</th>
                            <th>ITEM </th>
                            <th>QUANTITY</th>
                            <th>PRICE</th>
                            <th>TOTAL</th>
                        </tr>
                    </thead>
                    <tbody class="">
                        @foreach($particulars as $index => $particular)
                        <tr>
                            <td>{{ $index+1 }}</td>
                            <td>@if($particular->unit_uuid)
                                {{ App\Models\Unit::find($particular->unit_uuid)->unit }}
                                @else
                                NA
                                @endif
                            </td>
                            <td>
                                @if($particular->vendor_id)
                                {{ App\Models\PropertyBiller::find($particular->vendor_id)->biller }}
                                @else
                                NA
                                @endif
                            </td>
                            <td>
                                {{ substr_replace($particular->item, "...", 10) }}
                            </td>
                            <td>
                                {{ $particular->quantity }}
                            </td>

                            <td>
                                {{ number_format($particular->price, 2) }}
                            </td>
                            <td>
                                {{ number_format($particular->price * $particular->quantity, 2) }}
                            </td>

                        </tr>
                        @endforeach
                        <tr>
                            <td><b>Total</b></td>
                            <td></td>
                            <td> </td>

                            <td></td>
                            <td> </td>
                            <td></td>
                            <td>
                                <b>{{ number_format($particulars->sum('total'), 2) }}</b>
                            </td>
                        </tr>

                    </tbody>
                </table>

    </main>
</body>

</html>