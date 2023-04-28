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
           <b>Batch No:</b> {{ $accountpayable->batch_no }}
        </p>
        <p>
            <b>Request for:</b> {{ $accountpayable->request_for }}
        </p>
        <p>
            <b>Requested Amount:</b> {{ number_format($accountpayable->amount, 2) }}
        </p>
        <p>
           <b>Requested on:</b> {{ Carbon\Carbon::parse($accountpayable->created_at)->format('M d, Y') }}
        </p>
        <p>
            <b>Due Date on:</b> {{ Carbon\Carbon::parse($accountpayable->due_date)->format('M d, Y') }}
        </p>
       
        <p>
           <b>Requested by:</b> {{ $accountpayable->requester->name}}
        </p>
        <p>
            <b>Status:</b> {{ $accountpayable->status }}
        </p>

        <p><b>Vendor:</b> {{ $accountpayable->vendor }}</p>

        <p>
            <b>Delivery Date on:</b> {{ Carbon\Carbon::parse($accountpayable->delivery_at)->format('M d, Y') }}
        </p>
        
        <p><b>Bank:</b> {{ $accountpayable->bank }}</p>

        <p><b>Bank Name:</b> {{ $accountpayable->bank_name }}</p>

        <p><b>Bank Account:</b> {{ $accountpayable->bank_account }}</p>

        <p>
            <b>Particulars</b>
        </p>

        <table class="text-center">
            <thead class="bg-gray-50">
                <tr>
                    <x-th>#</x-th>
                    <x-th>UNIT</x-th>
                    <x-th>VENDOR </x-th>
                    <x-th>ITEM </x-th>
                    <x-th>QUANTITY</x-th>
                    {{-- @if($accountpayable->request_for === 'payment') --}}
                    <x-th>PRICE</x-th>
                    {{-- @endif --}}
                    <x-th>TOTAL</x-th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($particulars as $index => $particular)
                <tr>
                    <x-td>{{ $index+1 }}</x-td>
                    <x-td>
                        @if($particular->unit_uuid)
                        {{ App\Models\Unit::find($particular->unit_uuid)->unit }}
                        @else
                        NA
                        @endif
                    </x-td>
                    <x-td>@if($particular->vendor_id)
                        {{ App\Models\PropertyBiller::find($particular->vendor_id)->biller }}
                        @else
                        NA
                        @endif
                    </x-td>
                    <x-td>
                        {{$particular->item }}
                    </x-td>
                    <x-td>
                        {{ number_format($particular->quantity, 2) }}
                    </x-td>
                    {{-- @if($accountpayable->request_for === 'payment') --}}
                    <x-td>
                        {{ number_format($particular->price, 2) }}
                    </x-td>
                    {{-- @endif --}}
                    <x-td>{{ number_format($particular->quantity * $particular->price, 2) }}</x-td>
                </tr>

                @endforeach
                <tr>
                    <x-td>Total</x-td>
                    <x-td></x-td>
                    <x-td>

                    </x-td>
                    <x-td>

                    </x-td>

                    <x-td>

                    </x-td>
                    <x-td> </x-td>
                    <x-td>
                        {{ number_format($particulars->sum('total'), 2) }}
                    </x-td>
                </tr>
            </tbody>
        </table>

    </main>
</body>

</html>