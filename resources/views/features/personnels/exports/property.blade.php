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
        {{ $data->property }}
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
      &copy; 2020 {{ env('APP_NAME') }}. All rights reserved.
        <?php echo date("Y");?>
    </footer>

    <!-- Wrap the content of your PDF inside a main tag -->
    <main>
        <table class="">
            <tr>
                <th>
                    Name
                    </td>
                <td>{{ $data->property }}</td>
            </tr>
            <tr>
                <th>
                    Type
                </th>
                <td>{{ $data->type->type }}</td>
            </tr>
            <tr>
                <th>
                    Personnels</td>
                <td> {{
                    App\Http\Controllers\Utilities\UserPropertyController::getPersonnels($data->uuid,auth()->user()->id)->count()}}
                </td>
            </tr>
            <tr>
                <th>
                    Units
                </th>
                <td>{{ $data->units()->count() }}</td>
            </tr>
            <tr>
                <th>
                    Occupied Units</th>

                <td>
                    {{ $data->units->where('status_id', 2)->count() }}
                </td>

            </tr>
            <tr>
                <th>
                    Vacant Units</th>

                <td>
                    {{ $data->units->where('status_id', 1)->count() }}
                </td>

            </tr>
            <tr>
                <th>
                    Reserved Units</th>

                <td>
                    {{ $data->units->where('status_id', 4)->count() }}
                </td>

            </tr>
            <tr>
                <th>
                    Dirty Units</th>

                <td>
                    {{ $data->units->where('status_id', 3)->count() }}
                </td>

            </tr>

            <tr>
                <th>
                    Occupied Units</th>

                <td>
                    {{ $data->units->where('status_id', 2)->count() }}
                </td>

            </tr>
            <tr>
                <th>
                    Bills For Collection
                </th>

                <td>
                    {{ number_format($data->bills->sum('bill'), 2) }}
                </td>

            </tr>
            <tr>
                <th>
                    Collected Bills
                </th>

                <td>
                    {{ number_format($data->collections->sum('collection'), 2) }}
                </td>

            </tr>
            <tr>
                <th>
                    Uncollected Bills
                </th>

                <td>
                    {{ number_format($data->bills->where('status','unpaid')->sum('bill') -
                    $data->bills->where('status', 'unpaid')->sum('initial_payment'), 2) }}
                </td>

            </tr>
            <tr>
                <th>
                    Collection Efficiency
                </th>

                @if($data->bills->count())
                <?php $collection_efficiency =
                    $data->collections->sum('collection') / $data->bills->sum('bill'); ?>
                @else
                <?php $collection_efficiency = 0;?>
                @endif
                <td>
                    {{ number_format($collection_efficiency * 100, 2) }} %
                </td>

            </tr>

            <tr>
                <th>
                    Past Due Accounts
                </th>

                <td>
                    {{ $data->bills->where('status', 'unpaid')->count() -
                    $data->bills->where('status', 'unpaid')->count() }}
                </td>

            </tr>
            <tr>
                <th>
                    Contracts
                </th>

                <td>
                    {{ $data->contracts->count() }}
                </td>

            </tr>
            <tr>
                <th>
                    Active Contracts
                </th>

                <td>
                    {{ $data->contracts->where('status','active')->count() }}
                </td>

            </tr>

            <tr>
                <th>
                    Expiring Contracts
                </th>

                <td>
                    {{ $data->contracts->where('status','inactive')->count() }}
                </td>

            </tr>
            <tr>
                <th>
                    Expired Contracts
                </th>

                <td>
                    {{ $data->contracts->where('status','inactive')->count() }} </td>

            </tr>
            <tr>
                <th>
                    Received Concerns
                </th>

                <td>
                    {{ $data->concerns->count() }}
                </td>

            </tr>
            <tr>
                <th>
                    Pending Concerns
                </th>

                <td>
                    {{ $data->concerns->where('status','pending')->count() }} </td>

            </tr>
            <tr>
                <th>
                    Closed Concerns
                </th>

                <td>
                    {{ $data->concerns->where('status','closed')->count() }} </td>

            </tr>
        </table>


    </main>
</body>

</html>
