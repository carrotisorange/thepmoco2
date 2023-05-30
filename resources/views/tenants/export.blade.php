@extends('layouts.export')
@section('title', 'Tenant Information Sheet')
@section('content')
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
@endsection