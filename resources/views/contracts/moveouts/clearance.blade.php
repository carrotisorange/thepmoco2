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

        p {
            margin-right: 80px;
            margin-left: 80px;
        }
    </style>
</head>

<body>
    <!-- Define header and footer blocks before your content -->
    <header>
        {{ Session::get('property_name') }} | Moveout Clearance Form
    </header>

    <footer>
        {{ Session::get('property_name') }} Copyright &copy;
        <?php echo date("Y");?>
    </footer>

    <!-- Wrap the content of your PDF inside a main tag -->
    <main>
        <p>
            Full Name: {{ $contract->tenant->tenant }}
        </p>
        <p>
            Unit: {{ $contract->unit->unit }}
        </p>
        <p>
            Moveout Date: {{ Carbon\Carbon::parse($contract->moveout_at)->format('M d, Y') }}
        </p>
        <p>
            Moveout Reason: {{ $contract->moveout_reason }}
        </p>

        <p>
            Assisted by: {{ auth()->user()->name }}
        </p>

    </main>
</body>

</html>