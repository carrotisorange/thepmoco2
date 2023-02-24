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
        <br>

        <table>
            <thead>
                <tr>
                    <x-td>#</x-td>
                    <x-td>REQUESTED ON</x-td>
                    <x-td>REQUESTED BY</x-td>
                    <x-td>REQUEST FOR</x-td>
                    <x-td>PARTICULARS</x-td>

                    {{-- <x-th>BILLER</x-th> --}}

                    {{-- <x-th>APPROVED ON</x-th> --}}
                    <x-td>STATUS</x-td>
                    <x-td>AMOUNT</x-td>
                    <x-td></x-td>
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
                    <x-th>Total</x-th>
                    <x-th></x-th>
                    <x-th></x-th>
                    <x-th></x-th>
                    <x-th></x-th>
                    <x-th></x-th>
                    <x-th>{{ number_format($accountpayables->sum('amount'), 2) }}</x-th>
                </tr>
            </tbody>
        </table>


        <p>
            Exported by: {{ auth()->user()->name }},<br> {{ auth()->user()->role->role }}
        </p>



    </main>
</body>

</html>