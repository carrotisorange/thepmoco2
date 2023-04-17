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
        <table class="min-w-full divide-y divide-gray-300">
            <thead class="bg-gray-50">
                <tr>
                    <th scope="col"
                        class="whitespace-nowrap py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">
                        Description</th>
                    <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">
                        Value</th>

                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 bg-white">
                <tr>
                    <td class="whitespace-nowrap py-2 pl-4 pr-3 text-sm text-gray-500 sm:pl-6">
                        Potential Gross Rent (total rent amount of rent per unit)
                    </td>
                    <td class="whitespace-nowrap px-2 py-2 text-sm font-medium text-gray-900">{{
                        number_format($potential_gross_rent, 2) }}</td>

                </tr>

                <tr>
                    <td class="whitespace-nowrap py-2 pl-4 pr-3 text-sm text-gray-500 sm:pl-6">
                        Less Vacancy (total rent amount of vacant units)
                    </td>
                    <td class="whitespace-nowrap px-2 py-2 text-sm font-medium text-gray-900">{{
                        number_format($less_vacancy, 2)
                        }}</td>

                </tr>

                <tr>
                    <td class="whitespace-nowrap py-2 pl-4 pr-3 text-sm text-gray-500 sm:pl-6">
                        Effective Gross Rent (total rent amount of occupied units)
                    </td>
                    <td class="whitespace-nowrap px-2 py-2 text-sm font-medium text-gray-900">{{
                        number_format($effective_gross_rent, 2) }}</td>

                </tr>

                <tr>
                    <td class="whitespace-nowrap py-2 pl-4 pr-3 text-sm text-gray-500 sm:pl-6">
                        Billed Rent (all posted rent)
                    </td>
                    <td class="whitespace-nowrap px-2 py-2 text-sm font-medium text-gray-900">{{
                        number_format($billed_rent,
                        2) }}</td>

                </tr>
                <tr>
                    <td class="whitespace-nowrap py-2 pl-4 pr-3 text-sm text-gray-500 sm:pl-6">
                        Collected Rent (all paid rent)
                    </td>
                    <td class="whitespace-nowrap px-2 py-2 text-sm font-medium text-gray-900">{{
                        number_format($collected_rent,
                        2) }}</td>

                </tr>

                <tr>
                    <td class="whitespace-nowrap py-2 pl-4 pr-3 text-sm text-gray-500 sm:pl-6">
                        Actual Revenue Collected (all payments collected)
                    </td>
                    <td class="whitespace-nowrap px-2 py-2 text-sm font-medium text-gray-900">{{
                        number_format($actual_revenue_collected,
                        2) }}</td>

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