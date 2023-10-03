<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Unit;
use App\Models\Property;
use \PDF;

class UnitContractController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Property $property, Unit $unit)
    {
        return view('units.contracts.index',[
            'unit' => Unit::find($unit->uuid),
            'contracts' => Unit::find($unit->uuid)->contracts,
        ]);
    }

    public function create(Property $property, Unit $unit){
        
        return view('tenants.create', [
            'unit' => $unit
        ]);
    }

    public function export(Property $property, Unit $unit)
    {
          $folder_path = 'tenants.export';

          $pdf = app('App\Http\Controllers\ExportController')->generatePDF($folder_path, null);

          $pdf_name = 'tenant_information_sheet.pdf';

          return $pdf->stream($pdf_name);
    }
}
