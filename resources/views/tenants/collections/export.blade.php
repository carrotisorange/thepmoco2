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
        {{ Session::get('property_name') }} | Acknowledgment Receipt
    </header>

    <footer>
        {{ Session::get('property_name') }} Copyright &copy;
        <?php echo date("Y");?>
    </footer>

    <!-- Wrap the content of your PDF inside a main tag -->
    <main>
        <p>
            AR #: {{ $ar_no }}
        </p>
        <p>
            Date: {{ Carbon\Carbon::now() }}
        </p>
        <p>
            Amount: {{ number_format($amount, 2) }}
        </p>
        <p>
            Tenant: {{ $tenant }}
        </p>

        <p>
            Mode of Payment: {{ $mode_of_payment }}
        </p>

        @if($mode_of_payment === 'cheque')
        <p>
            Cheque #: {{ $cheque_no }}
        </p>
        @endif

        @if($mode_of_payment === 'bank')
        <p>
            Bank #: {{ $bank }}
        </p>

        <p>
            Date Deposited #: {{ Carbon\Carbon::parse($date_deposited)->format('M d, Y') }}
        </p>
        @endif

        <p>
            Received by: {{ $user }}
        </p>

    </main>
</body>

</html>