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

         $pdf = PDF::loadView('contracts.export', $data);
         return $pdf->download($contract->tenant->tenant.'pdf');

    }



}
