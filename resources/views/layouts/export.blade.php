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

        .watermark{
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
            Printed by: {{ auth()->user()->name }},<br> {{ auth()->user()->role->role }}
        </p>
    </main>

    <div class="watermark">
{{-- <img src="https://scontent.fmnl17-2.fna.fbcdn.net/v/t39.30808-6/240803611_1243262802782845_2256620312332033835_n.jpg?_nc_cat=107&ccb=1-7&_nc_sid=09cbfe&_nc_ohc=p3MumaNIVewAX_4yCfX&_nc_ht=scontent.fmnl17-2.fna&oh=00_AfCmU3j8-tp1lT3N-DmAtLdmKftAzut2N6zqlKZSfRmPAw&oe=647D0234" alt="martha logo" width="500" height="500"> --}}
</div>
<pre>

































</pre>
</body>

</html>