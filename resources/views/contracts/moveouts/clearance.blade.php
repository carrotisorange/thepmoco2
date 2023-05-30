@extends('layouts.export')
@section('title', 'Moveout Clearance Form')
@section('content')
<p>
    Tenant: {{ $contract->tenant->tenant }}
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
@endsection