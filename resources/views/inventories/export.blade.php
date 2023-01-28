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
        {{ Session::get('property_name') }} | Unit Inventory
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
            Unit #: {{ $unit->unit }}
        </p>

        <p>
            Date: {{ Carbon\Carbon::now()->format('M d, Y') }}

        <p>
        <table class="">

            <thead class="bg-gray-50">
                <tr>
                    <x-th>#</x-th>
                    <x-th>Item</x-th>

                    <x-th>Quantity</x-th>
                    <x-th>Remarks</x-th>
                    <x-th>Added on</x-th>
                    <x-th>Last Updated on</x-th>
                </tr>
            </thead>
            @foreach ($inventories as $index => $item)
            <tbody class="bg-white divide-y divide-gray-200">
                <tr>
                    <x-td>{{ $index+1 }}</x-td>
                    <x-td>{{ $item->item }}</x-td>
                    <x-td>{{ $item->quantity }}</x-td>
                    <x-td>{{ $item->remarks }}</x-td>
                    <x-td>{{Carbon\Carbon::parse($item->created_at)->format('M d, Y')}}</x-td>
                    <x-td>{{Carbon\Carbon::parse($item->updated_at)->format('M d, Y')}}</x-td>
                </tr>
            </tbody>
            @endforeach
        </table>
        </p>
       
        <p>
            Recorded by: {{ auth()->user()->name }},<br> {{ auth()->user()->role->role }}
        </p>



    </main>
</body>

</html>