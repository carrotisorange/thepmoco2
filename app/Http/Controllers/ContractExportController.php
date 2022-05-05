<?php

namespace App\Http\Controllers;
use Session;
use App\Models\Bill;

use App\Models\Contract;

class ContractExportController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Contract $contract)
    {
         $reference_no = Bill::join('tenants', 'bills.tenant_uuid', 'tenants.uuid')
        ->select('*', 'bills.status as bill_status', 'bills.id as bill_id')
        ->join('particulars', 'bills.particular_id', 'particulars.id')
        ->where('tenants.uuid', $contract->tenant->uuid)
        ->orderBy('bills.bill_no')
        ->limit(1)
        ->get('reference_no');

        $bills = Bill::join('tenants', 'bills.tenant_uuid', 'tenants.uuid')
        ->select('*', 'bills.status as bill_status', 'bills.id as bill_id')
        ->join('particulars', 'bills.particular_id', 'particulars.id')
        ->where('tenants.uuid', $contract->tenant->uuid)
        ->orderBy('bills.bill_no')
        ->get();

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
            'user' => $contract->user->name,
            'bills' => $bills,
            'reference_no' => $reference_no
        ];

          $pdf = \PDF::loadView('contracts.export', $data);
          $pdf->setOptions([
          'header-right' => '[date]',
          'header-left' => 'Contract | [page]',
          'footer-right' => Session::get('property_name')
          ]);

         try
         {
             return $pdf->stream($contract->tenant->tenant.'.pdf');
         }catch(\Exception $e)
         {
            ddd($e);
         }

        //   $pdf = \PDF::loadView('contracts.export', $data)
        //   ->setPaper('a5', 'portrait');

        //   //$pdf->setPaper('L');
        //   $pdf->output();
        //   $canvas = $pdf->getDomPDF()->getCanvas();
        //   $height = $canvas->get_height();
        //   $width = $canvas->get_width();
        //   $canvas->set_opacity(.1,"Multiply");
        //   $canvas->page_text($width, $height, Session::get('property_name'), null,
        //   28, array(0,0,0),2,2,0);
        
        //   return $pdf->download($contract->tenant->tenant.'.pdf');

    }



}
