<html>

<head>
    <style>
        /** Define the margins of your page **/
        @page {
            margin: 100px 25px;
        }

        header {
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
        table {
            margin-right: 80px;
            margin-left: 80px;
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
    </header>

    <footer>
        {{ Session::get('property_name') }} Copyright &copy;
        <?php echo date("Y");?>
    </footer>

    <!-- Wrap the content of your PDF inside a main tag -->
    <main>
        <p>
            Date #: {{ Carbon\Carbon::now() }}
        </p>

        <p>
            Tenant: {{ $tenant }}
        </p>
        <p>
            Total Bills: {{ number_format($bills->sum('bill'), 2) }}
        </p>
        <p>
            <b>Bills Breakdown</b>
        </p>
        <p>
        <table class="">

            <tr>
                <th>Bill #</th>
                <th>Date Posted</th>
                <th>Unit</th>
                <th>Particular</th>
                <th>Period Covered</th>
                <th>Amount</th>
            </tr>

            @foreach($bills as $item)

            <tr>
                <td>{{ $item->bill_no }}</td>

                <td>{{ Carbon\Carbon::parse($item->created_at)->format('M d, Y') }}</td>
                <td>{{ $item->unit->unit }}</td>
                <td>{{ $item->particular->particular }}</td>
                <td>{{ Carbon\Carbon::parse($item->start)->format('M d,
                    Y').'-'.Carbon\Carbon::parse($item->end)->format('M d, Y') }} </td>
                <td>{{ number_format($item->bill,2) }}</td>
            </tr>
            @endforeach
        </table>
        </p>
        <br>
        <p>
            Prepared by: {{ $user }}, {{ $role }}
        </p>

    </main>
</body>

</html>