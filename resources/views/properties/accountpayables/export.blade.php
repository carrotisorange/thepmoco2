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
        {{ Session::get('property_name') }} | Accounts Payable
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

        <p>
            Date: {{ Carbon\Carbon::now()->format('M d, Y') }}

        <p>
        <table>
            <thead>
                <tr>
                    <x-th>#</x-th>
                    <x-th>REQUESTED ON</x-th>
                    <x-th>REQUESTED BY</x-th>
                    <x-th>REQUEST FOR</x-th>
                    <x-th>PARTICULARS</x-th>

                    {{-- <x-th>BILLER</x-th> --}}

                    {{-- <x-th>APPROVED ON</x-th> --}}
                    <x-th>STATUS</x-th>
                    <x-th>AMOUNT</x-th>
                    <x-th></x-th>
                </tr>
            </thead>
            <tbody class="">
                @foreach($accountpayables as $index => $accountpayable)
                <tr>
                    <x-td>{{ $index+1 }}</x-td>
                    <x-td>{{ Carbon\Carbon::parse($accountpayable->created_at)->format('M d, Y') }}</x-td>
                    <x-td>{{ $accountpayable->requester->name }}</x-td>
                    <x-td>{{ $accountpayable->request_for }}</x-td>
                    <x-td>
                        <?php  $particulars  = App\Models\AccountPayableParticular::where('batch_no', $accountpayable->batch_no)->get() ;?>
                        @foreach ($particulars as $particular)
                        {{ $particular->item }},
                        @endforeach
                    </x-td>



                    <x-td>{{$accountpayable->status}}</x-td>
                    <x-td>{{ number_format($accountpayable->amount, 2) }}</x-td>
                    <x-td>
                        {{-- <a
                            href="/property/{{ $accountpayable->property_uuid }}/accountpayable/{{ $accountpayable->id }}"
                            class="text-blue-500 text-decoration-line: underline">View</a> --}}
                    </x-td>

                </tr>
                @endforeach
                <tr>
                    <x-td>Total</x-td>
                    <x-th></x-th>
                    <x-th></x-th>
                    <x-th></x-th>
                    <x-th></x-th>
                    <x-th></x-th>
                    <x-td>{{ number_format($accountpayables->sum('amount'), 2) }}</x-td>
                </tr>
            </tbody>
        </table>
        </p>

        <p>
            Recorded by: {{ auth()->user()->name }},<br> {{ auth()->user()->role->role }}
        </p>



    </main>
</body>

</html>