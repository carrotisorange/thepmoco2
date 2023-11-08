<html>

<head>

    <style>
        @page {
            margin: 100px 25px;
            font-size: 13px;
        }

        header,
        h5 {
            position: fixed;
            top: -60px;
            left: 0px;
            right: 0px;
            height: 50px;


            color: black;
            text-align: center;
            line-height: 35px;
        }

        footer {
            position: fixed;
            bottom: -60px;
            left: 0px;
            right: 0px;
            /* height: 50px; */


            color: black;
            text-align: center;
            /* line-height: 35px; */
        }

        p,
        {
        margin-right: 5px;
        margin-left: 5px;
        }

        table,
        th,
        td {
            margin-right: 30px;
            /* margin-left: 30px; */
            border: 1px black;
        }

        th,
        td {
            padding: 5px";

        }

        ,
        .center {
            /* margin: auto; */
            width: 90%;

            padding: 5px;
        }

        /* .watermark{
        height:500px;
        width:500px;
        display:flex;
        align-items:center;
        justify-content:center;
        position: absolute;
        top: 0;
        bottom: 0;
        left: 80;
        right: 0;
        z-index: -1;
        opacity: 0.2;
        } */
    </style>

</head>

<body>
    @if(Session::get('property_uuid'))
    <header>
        {{ Session::get('property') }} | @yield('title')
        <br>
        <h5>{{ App\Models\Property::find(Session::get('property_uuid'))->country->country }},
            {{ App\Models\Property::find(Session::get('property_uuid'))->province->province }},
            {{ App\Models\Property::find(Session::get('property_uuid'))->city->city }},
            {{ App\Models\Property::find(Session::get('property_uuid'))->barangay }},
            TIN: {{ Session::get('property_registered_tin') }}
            <hr>
            <br>
        </h5>
    </header>
    <footer>

        <h5>
            For inquiries reach us at: {{ Session::get('property_email') }} /
            {{ Session::get('property_mobile') }}
        </h5>
        {{ Session::get('property') }} Copyright &copy;
        <?php echo date("Y");?>
    </footer>
    @else

    <header>
        <br>
        <h5>
            @yield('title')
            <hr>
            <br>
        </h5>
    </header>
    <footer>
        Copyright &copy;
        <?php echo date("Y");?>
    </footer>
    @endif
    <main class="center">
        @yield('content')
        <p>
            <b>Printed by:</b> {{ auth()->user()->name }},<br> {{ auth()->user()->role->role }}
        </p>
    </main>

</body>

</html>
