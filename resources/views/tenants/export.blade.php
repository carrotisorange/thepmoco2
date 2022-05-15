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
       {{ Session::get('property_name') }} | Tenant Information Sheet
    </header>

    <footer>
        {{ Session::get('property_name') }} Copyright &copy;
        <?php echo date("Y");?>
    </footer>

    <!-- Wrap the content of your PDF inside a main tag -->
    <main>
        <p>
            Full Name: ______________________________________________________
        </p>
        <p>
            Email: _______________________ &nbsp; Mobile: ________________________
        </p>
        <p>
            Status: <input type="checkbox" /> studying <input type="checkbox" /> working &nbsp;&nbsp; Gender: <input
                type="checkbox" /> male <input type="checkbox" /> female
        </p>
        <p>
            Civil Status: <input type="checkbox" /> married <input type="checkbox" /> single <input type="checkbox" />
            divorced <input type="checkbox" /> widowed
        </p>
        <p>
            Birthdate: _______________________________________________________
        </p>
        <p>
            Country: _____________ &nbsp; Region: ______________ &nbsp; City: ______________
        </p>
        <p>
            Address: _______________________________________________________
        </p>
        <p>
            <label for=""><b>For students</b></label><br>
            Course: ______________________ &nbsp; Year Level: ______________________

        </p>
        <p>
            School: _______________________ &nbsp; Address: ________________________
        </p>
        <p>
            <label for=""><b>For non-students</b></label><br>
           Occupation: ________________________________________________________

        </p>
        <p>
            Employer: _____________________ &nbsp; Address: _______________________
        </p>

        <p>
            <label for=""><b>Guardians</b></label><br>
           1. Name: _____________________ &nbsp; Relationship: ______________________
        </p>
        <p>
  
            Email: ______________________ &nbsp; Mobile: __________________________
        </p>

        <p>
          
            2. Name: _____________________ &nbsp; Relationship: ______________________
        </p>
        <p>
        
            Email: ______________________ &nbsp; Mobile: __________________________
        </p>

        <p>
            <label for=""><b>References</b></label><br>
            1. Name: _____________________ &nbsp; Relationship: ______________________
        </p>
        <p>
        
            Email: ______________________ &nbsp; Mobile: __________________________
        </p>
        
        <p>
        
            2. Name: _____________________ &nbsp; Relationship: ______________________
        </p>
        <p>
        
            Email: ______________________ &nbsp; Mobile: __________________________
        </p>
        <br>
        <br>
        <p>
            Signature: ______________________ &nbsp; Date: __________________________
        </p>

        <p>
            Assisted by: ______________________ 
        </p>

        {{-- <p style="page-break-after: always;">
            Content Page 1
        </p>
        <p style="page-break-after: never;">
            Content Page 2
        </p> --}}
    </main>
</body>

</html>