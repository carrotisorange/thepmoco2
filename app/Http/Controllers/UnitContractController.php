<?php

namespace App\Http\Controllers;

use App\Models\{Unit,Property};

class UnitContractController extends Controller
{
    public function index(Property $property, Unit $unit)
    {
        return view('features.units.contracts.index',[
            'unit' => Unit::find($unit->uuid),
            'contracts' => Unit::find($unit->uuid)->contracts,
        ]);
    }

    public function create(Property $property, Unit $unit){

        return view('features.tenants.create', [
            'unit' => $unit
        ]);
    }

    public function export(Property $property, Unit $unit)
    {
        $folder_path = 'features.tenants.export';

        $data = null;

        $perspective = 'portrait';

        $pdf = app('App\Http\Controllers\Utilities\ExportController')->generatePDF($folder_path, $data, $perspective);

          $pdf_name = 'tenant_information_sheet.pdf';

          return $pdf->stream($pdf_name);
    }
}
