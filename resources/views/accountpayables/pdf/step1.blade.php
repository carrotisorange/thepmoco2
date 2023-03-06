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
        {{ Session::get('property_name') }} | Account Payable
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
            Reference #: {{ $accountpayable->batch_no }}
        </p>
        <p>
            Date requested: {{ Carbon\Carbon::parse($accountpayable->created_at)->format('M d, Y') }}

        <p>
            Request for : {{ $accountpayable->request_for }}
        </p>

        <p>
            Requested by: {{ $accountpayable->requester->name}}
        </p>

        <p>Status: {{ $accountpayable->status }}</p>
        
        <p>
            Particulars
        </p>

        <table class="">

            <thead class="bg-gray-50">
                <tr>
                <tr>
                    <x-th>#</x-th>
                    <x-th>ITEM </x-th>
                    <x-th>QUANTITY</x-th>
                    @if($accountpayable->request_for === 'payment')
                    <x-th>Price</x-th>
                    @endif

                </tr>
                </tr>
            </thead>
            @foreach ($particulars as $index => $particular)
            <tbody class="bg-white divide-y divide-gray-200">
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
                        {{ $particular->price }}
                    </x-td>
                    @endif

                </tr>
            </tbody>
            @endforeach
        </table>

    </main>
</body>

</html>