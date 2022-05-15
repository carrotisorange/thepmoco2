<?php

namespace App\Http\Controllers;
use App\Models\Unit;
use Barryvdh\DomPDF\PDF as DomPDFPDF;
use Illuminate\Http\Request;
use Session;
use \PDF;

class OldTenantController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Unit $unit)
    {
        $this->authorize('managerandadmin');

         return view('tenants.old.create', [
            'unit' => $unit
         ]);
    }

    public function export()
    {
        $pdf = PDF::loadView('tenants.export');
        return $pdf->download('tenant_information_sheet.pdf');

    }
}
