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
            Requested on: {{
            Carbon\Carbon::parse($accountpayable->created_at)->format('M d, Y') }}
        </p>
        <p>
            Due date: {{
            Carbon\Carbon::parse($accountpayable->due_date)->format('M d, Y') }}
        </p>
        <p>
            Requested by: {{ $accountpayable->requester->name }}
        </p>
        <p>
            Request for: {{ $accountpayable->request_for }}< </p>
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

                <br>
                <p>Particulars</p>
                <table>
                    <thead>
                        <tr>
                            <x-th>#</x-th>
                            <x-th>ITEM </x-th>
                            <x-th>QUANTITY</x-th>
                            @if($accountpayable->request_for === 'payment')
                            <x-th>PRICE</x-th>
                            <x-th>TOTAL</x-th>
                            @endif

                        </tr>
                    </thead>
                    <tbody class="">
                        @foreach($particulars as $index => $particular)
                        <tr>
                            <x-td>{{ $index+1 }}</x-td>
                            <x-td>
                                {{ $particular->item }}
                            </x-td>
                            <x-td>
                                {{ $particular->quantity }}
                            </x-td>
                            @if($accountpayable->request_for === 'payment')
                            <x-td>
                                {{ number_format($particular->price, 2) }}
                            </x-td>
                            <x-td>
                                {{ number_format($particular->price * $particular->quantity, 2) }}
                            </x-td>
                            @endif
                        </tr>
                        @endforeach

                    </tbody>
                </table>

    </main>
</body>

</html>