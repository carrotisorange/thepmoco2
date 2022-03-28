<?php

namespace App\Http\Controllers;
use Session;
use Barryvdh\DomPDF\Facade\Pdf;

use App\Models\Contract;

class ExportContractController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Contract $contract)
    {

        $data = [
            'tenant' => $contract->tenant->tenant ,
            'unit' => $contract->unit->building->building.' '.$contract->unit->unit,
            'start' => $contract->start,
            'end' => $contract->end,
            'rent' => $contract->rent,
            'discount' => $contract->discount,
            'status' => $contract->status,
            'interaction' => $contract->interaction,
            'moveout_reason' => $contract->moveout_reason,
            'user' => $contract->user->name
        ];

        //return view('contracts.export', $data);

        //  $pdf = PDF::loadView('contracts.export', $data);
        //  return $pdf->download($contract->tenant->tenant.'.pdf');

          $pdf = PDF::loadView('contracts.export', $data)
          ->setPaper('a5', 'portrait');

          // $pdf->setPaper('L');
          $pdf->output();
          $canvas = $pdf->getDomPDF()->getCanvas();
          $height = $canvas->get_height();
          $width = $canvas->get_width();
          $canvas->set_opacity(.1,"Multiply");
          $canvas->page_text($width/5, $height/2, Session::get('property_name'), null,
          28, array(0,0,0),2,2,0);
        return $pdf->download($contract->tenant->tenant.'.pdf');

    }



}
