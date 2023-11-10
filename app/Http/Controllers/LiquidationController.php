<?php

namespace App\Http\Controllers;

use App\Models\{Property,AccountPayableParticular,AccountPayable,AccountPayableLiquidation,AccountPayableLiquidationParticular};

class LiquidationController extends Controller
{
    public function step1(Property $property, AccountPayable $accountPayable){

        // if(auth()->user()->role_id !== 9){
            $particulars = AccountPayableParticular::where('batch_no', $accountPayable->batch_no)->get();

            if(!AccountPayableLiquidationParticular::where('batch_no', $accountPayable->batch_no)->count()){

            foreach($particulars as $particular) {
                AccountPayableLiquidationParticular::create(
                    [
                        'batch_no' => $particular->batch_no,
                        'created_at' => $particular->created_at,
                        'unit_uuid' => $particular->unit_uuid,
                        'vendor_id' => $particular->vendor_id,
                        'item' => $particular->item,
                        'quantity' => $particular->quantity,
                        'price' => $particular->price,
                        'total' => $particular->quantity * $particular->price,
                    ]
                    );
                }
            }

            return view('properties.liquidations.step1',[
                'property' => $property,
                'accountpayable' => $accountPayable,
            ]);

    }

    public function step2(Property $property, AccountPayable $accountPayable){

        return view('properties.liquidations.step2',[
            'property' => $property,
            'accountpayable' => $accountPayable
        ]);
    }

    public function export(Property $property, AccountPayable $accountPayable, AccountPayableLiquidation $accountPayableLiquidation){

        $data = [
           'property' => $property,
           'accountPayableLiquidation' => AccountPayableLiquidation::where('batch_no', $accountPayable->batch_no)->first(),
           'particulars' => AccountPayableLiquidationParticular::where('batch_no', $accountPayable->batch_no)->get()
        ];

        $pdf = \PDF::loadView('properties.liquidations.export', $data);

        $pdf->output();

        $canvas = $pdf->getDomPDF()->getCanvas();

        $height = $canvas->get_height();
        $width = $canvas->get_width();

        $canvas->set_opacity(.2,"Multiply");

        $canvas->set_opacity(.2);

        $canvas->page_text($width/5, $height/2,"", null, 55,array(0,0,0),2,2,-30);

        return $pdf->stream($property->property.'-'.$accountPayable->batch_no.'liquidation.pdf');
    }

    public function export_complete(Property $property, AccountPayable $accountPayable, AccountPayableLiquidation $accountPayableLiquidation){

        $data = [
           'property' => $property,
           'accountPayableLiquidation' => AccountPayableLiquidation::where('batch_no', $accountPayable->batch_no)->first(),
            'total_liquidation' => AccountPayableLiquidationParticular::where('batch_no', $accountPayable->batch_no)->sum('total'),
            'cash_advance' => AccountPayableLiquidation::where('batch_no', $accountPayable->batch_no)->pluck('cash_advance')->first(),
           'particulars' => AccountPayableLiquidationParticular::where('batch_no', $accountPayable->batch_no)->get(),
           'accountpayable' => $accountPayable
        ];



        $pdf = \PDF::loadView('properties.liquidations.export_complete', $data);

        $pdf->output();

        $canvas = $pdf->getDomPDF()->getCanvas();

        $height = $canvas->get_height();
        $width = $canvas->get_width();

        $canvas->set_opacity(.2,"Multiply");

        $canvas->set_opacity(.2);

        $canvas->page_text($width/5, $height/2,"", null, 55,array(0,0,0),2,2,-30);

        return $pdf->stream($property->property.'-'.$accountPayable->batch_no.'-liquidation.pdf');
    }
}
