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
        {{ Session::get('property_name') }} | Financial Reports
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
        </p>

        <p>
        <table class="">

            <thead class="bg-gray-50">
                <tr>
                    <x-th>#</x-th>
                    <x-th>DATE</x-th>
                    <x-th>DESCRIPTION</x-th>
                    <x-th>CASHIN</x-th>
                    <x-th>CASHOUT</x-th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($accountpayables->union($collections) as $index => $cashflow)
                <tr>
                    <x-td>{{ $index+1 }}</x-td>
                    <x-td>{{ $cashflow->date }}</x-td>
                    <x-td>{{ $cashflow->label }}</x-td>
                    <x-td>
                        @if($cashflow->label == 'INCOME')
                        {{ number_format($cashflow->amount, 2) }}
                        @endif
                    </x-td>
                    <x-td>
                        @if($cashflow->label == 'EXPENSE')
                        {{ number_format($cashflow->amount, 2) }}
                        @endif
                    </x-td>
                </tr>
                @endforeach
                <tr>
                    <x-td>Total</x-td>
                    <x-td></x-td>
                    <x-td></x-td>
                    <x-td>{{ number_format($cashflows->where('label', 'INCOME')->sum('amount'), 2) }}</x-td>
                    <x-td>{{ number_format($cashflows->where('label', 'EXPENSE')->sum('amount'), 2) }}</x-td>
                </tr>
            </tbody>
        </table>

        </p>

        <p>
            Prepared by: {{ auth()->user()->name }},<br> {{ auth()->user()->role->role }}
        </p>

    </main>
</body>

</html>