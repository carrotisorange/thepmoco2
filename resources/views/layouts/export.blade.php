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
    </style>
</head>

<body>
    <!-- Define header and footer blocks before your content -->
    @if(Session::get('property'))
    <header>
        {{ Session::get('property_name') }} | @yield('title')
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
    @else

<header>

    <br>
    <h5>
        @yield('title')
        {{-- {{ App\Models\Property::find(Session::get('property'))->country->country }},
        {{ App\Models\Property::find(Session::get('property'))->province->province }},
        {{ App\Models\Property::find(Session::get('property'))->city->city }},
        {{ App\Models\Property::find(Session::get('property'))->barangay }} --}}
        <hr>
        <br>
    </h5>
</header>
<footer>
{{-- 
    <h5>
        For inquiries reach us at: {{ App\Models\Property::find(Session::get('property'))->email }} /
        {{ App\Models\Property::find(Session::get('property'))->mobile }}
    </h5> --}}
    {{-- {{ Session::get('property_name') }} --}}
     Copyright &copy;
    <?php echo date("Y");?>
</footer>
    @endif
    <main class="center">
        @yield('content')
        <p>
            Prepared by: {{ auth()->user()->name }},<br> {{ auth()->user()->role->role }}
        </p>
    </main>
</body>

</html>