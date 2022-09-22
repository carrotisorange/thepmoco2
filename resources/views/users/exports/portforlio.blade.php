<html>

<head>
    <style>
        /** Define the margins of your page **/
        @page {
            margin: 60px 25px;

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
            margin-right: 1;
            margin-left: 1;
            border: 1px black;
        }

        th,
        td {
            padding: 10px"
        }
    </style>
</head>

<body>
    <!-- Define header and footer blocks before your content -->
    <header>
        Portforlio
        <h5>
            As of {{ Carbon\Carbon::now()->timezone('Asia/Manila')->format('M d, Y, g:i A')}}
            <hr>
            <br>
        </h5>

    </header>

    <footer>
        {{-- <h5>
            For inquiries reach us at: {{ $property->email }} /
            {{ $property->mobile }}
        </h5>--}}
        The PMO Co. Copyright &copy;
        <?php echo date("Y");?>
    </footer>

    <!-- Wrap the content of your PDF inside a main tag -->
    <main>

        <table class="">
            <tr>
                <td>
                    Property
                </td>
                @foreach ($data as $property)
                <td>
                    {{ $property->property->property }}
                </td>
                @endforeach
            </tr>
            <tr>
                <td>
                    Type
                </td>
                @foreach ($data as $property)
                <td>
                    {{ $property->property->type->type }}
                </td>
                @endforeach
            </tr>

            <tr>
                <td>
                    Employee</td>
                @foreach ($data as $property)
                <td>
                    {{ $property->property->property_users()->count() }}
                </td>
                @endforeach
            </tr>

            <tr>
                <td>
                    Units</td>
                @foreach ($data as $property)
                <td>
                    {{ $property->property->units()->count() }}
                </td>
                @endforeach
            </tr>
            <tr>
                <td>
                    Occupied Units</td>
                @foreach ($data as $property)
                <td>
                    {{ $property->property->units->where('status_id', 2)->count() }}
                </td>
                @endforeach
            </tr>

            <tr>
                <td>
                    Vacant Units </td>
                @foreach ($data as $property)
                <td>
                    {{ $property->property->units->where('status_id', 1)->count() }}
                </td>
                @endforeach
            </tr>

            <tr>
                <td>
                    Reserved Units </td>
                @foreach ($data as $property)
                <td>
                    {{ $property->property->units->where('status_id', 4)->count() }}
                </td>
                @endforeach
            </tr>

            <tr>
                <td>
                    Dirty Units
                </td>
                @foreach ($data as $property)
                <td>
                    {{ $property->property->units->where('status_id', 3)->count() }}
                </td>
                @endforeach
            </tr>

            <tr>
                <td>
                    Under Maintenance Units
                </td>
                @foreach ($data as $property)
                <td>
                    {{ $property->property->units->where('status_id', 5)->count() }}
                </td>
                @endforeach
            </tr>

            <tr>
                <td>
                    Occupancy Rate
                </td>
                @foreach ($data as $property)
                @if($property->property->units->count())
                <?php $occupancy_rate = $property->property->units->where('status_id', 2)->count()/$property->property->units->count() * 100; ?>
                @else
                <?php $occupancy_rate = 0;?>
                @endif
                <td>
                    {{ number_format($occupancy_rate, 2) }} %
                </td>
                @endforeach
            </tr>
            <tr>
                <td>
                    Bills For Collection
                </td>
                @foreach ($data as $property)
                <td>
                    {{ number_format($property->property->bills->sum('bill'), 2) }}
                </td>
                @endforeach
            </tr>
            <tr>
                <td>
                    Collected Bills 
                </td>
                @foreach ($data as $property)
                <td>
                    {{ number_format($property->property->collections->sum('collection'), 2) }}
                </td>
                @endforeach
            </tr>
            <tr>
                <td>
                    Uncollected Bills
                </td>
                @foreach ($data as $property)
                <td>
                   {{ number_format($property->property->bills->whereIn('status', ['unpaid',
                'partially_paid'])->sum('bill') -
                $property->property->bills->whereIn('status', ['unpaid',
                'partially_paid'])->sum('initial_payment'), 2) }}
                </td>
                @endforeach
            </tr>
            <tr>
                <td>
                    Collection Efficiency
                </td>
                @foreach ($data as $property)
                @if($property->property->bills->count())
                <?php $collection_efficiency = 
                                                            $property->property->collections->sum('collection') / $property->property->bills->sum('bill'); ?>
                @else
                <?php $collection_efficiency = 0;?>
                @endif
                <td>
                    {{ number_format($collection_efficiency * 100, 2) }} %
                </td>
                @endforeach
            </tr>
            <tr>
                <td>
                    Past Due Accounts
                </td>
                @foreach ($data as $property)
                <td>
                    {{ $property->property->bills->whereIn('status', ['unpaid',
                    'partially_paid'])->count() -
                    $property->property->bills->whereIn('status', ['unpaid',
                    'partially_paid'])->count() }}
                </td>
                @endforeach
            </tr>
            <tr>
                <td>
                    Contracts
                </td>
                @foreach ($data as $property)
                <td>
                    {{ $property->property->contracts->count() }}
                </td>
                @endforeach
            </tr>
            <tr>
                <td>
                    Active Contracts
                </td>
                @foreach ($data as $property)
                <td>
                    {{ $property->property->contracts->where('status','active')->count() }}
                </td>
                @endforeach
            </tr>

            <tr>
                <td>
                    Expiring Contracts
                </td>
                @foreach ($data as $property)
                <td>
                    {{ $property->property->contracts->where('status','inactive')->count() }}
                </td>
                @endforeach
            </tr>
            <tr>
                <td>
                    Expired Contracts
                </td>
                @foreach ($data as $property)
                <td>
                    {{ $property->property->contracts->where('status','inactive')->count() }} </td>
                @endforeach
            </tr>
            <tr>
                <td>
                    Received Concerns
                </td>
                @foreach ($data as $property)
                <td>
                    {{ $property->property->concerns->count() }}
                </td>
                @endforeach
            </tr>
            <tr>
                <td>
                    Pending Concerns
                </td>
                @foreach ($data as $property)
                <td>
                    {{ $property->property->concerns->where('status','pending')->count() }} </td>
                @endforeach
            </tr>
            <tr>
                <td>
                    Closed Concerns
                </td>
                @foreach ($data as $property)
                <td>
                    {{ $property->property->concerns->where('status','closed')->count() }} </td>
                @endforeach
            </tr>
        </table>

    </main>
</body>

</html>