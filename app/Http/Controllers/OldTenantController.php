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
        $pdf = PDF::loadView('tenants.tenant_sheet');
        $pdf->setOptions([
          'header-right' => '[date]',
          'header-left' => 'Tenant Sheet | [page]',
          'footer-right' => Session::get('property_name')
          ]);
        return $pdf->download('tenant_sheet.pdf');

        // $pdf = \PDF::loadView('tenants.tenant_sheet');
        // $pdf->setOptions([
        //     'header-right' => '[date]',
        //     'header-left' => 'Tenant Sheet | [page]',
        //     'footer-right' =>  Session::get('property_name')
        // ]);
        // return $pdf->download('tenant_sheet.pdf');
         //return view('tenants.tenant_sheet');

        // $pdf = PDF::loadView('tenants.tenant_sheet')
        //     ->setPaper('a5', 'portrait');

        //           //$pdf->setPaper('L');
        //     $pdf->output();
        //     $canvas = $pdf->getDomPDF()->getCanvas();
        //     $height = $canvas->get_height();
        //     $width = $canvas->get_width();
        //     $canvas->set_opacity(.1,"Multiply");
        //     $canvas->page_text($width, $height, Session::get('property_name'), null,
        //     28, array(0,0,0),2,2,0);

        //     return $pdf->download('Tenant_Sheet.pdf');
    }
}
