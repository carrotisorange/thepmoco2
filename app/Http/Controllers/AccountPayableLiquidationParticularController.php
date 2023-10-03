<?php

namespace App\Http\Controllers;

use App\Models\AccountPayableLiquidationParticular;
use Illuminate\Http\Request;

class AccountPayableLiquidationParticularController extends Controller
{
    public function store($item, $price, $quantity, $batch_no, $total, $unit_uuid, $vendor_id){
        AccountPayableLiquidationParticular::updateOrCreate(
            [
                'item' => $item,
                'price' => $price,
                'quantity' => $quantity,
                'batch_no' => $batch_no,
                'unit_uuid' => $unit_uuid,
                'vendor_id' => $vendor_id,
            ],
            [
                'item' => $item,
                'price' => $price,
                'quantity' => $quantity,
                'batch_no' => $batch_no,
                'total' => $total,
                'unit_uuid' => $unit_uuid,
                'vendor_id' => $vendor_id
        ]);
    }
}
