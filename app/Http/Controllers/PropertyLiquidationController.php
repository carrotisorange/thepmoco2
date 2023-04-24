<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\AccountPayableParticular;
use App\Models\AccountPayable;
use App\Models\AccountPayableLiquidationParticular;

class PropertyLiquidationController extends Controller
{
    public function step1(Property $property, AccountPayable $accountPayable){

        if(auth()->user()->role_id !== 9){
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
                        'total' => $particular->quantity * $particular->price
                    ]
                    );
                }
            }

            return view('properties.liquidations.step1',[
                'property' => $property,
                'accountpayable' => $accountPayable,
            ]);
        }else{
            return redirect('/property/'.$property->uuid.'/accountpayable/'.$accountPayable->id.'/liquidation/step-2');
        }


    }

    public function step2(Property $property, AccountPayable $accountPayable){
        
        return view('properties.liquidations.step2',[
            'property' => $property,
            'accountpayable' => $accountPayable
        ]);
    }
}
