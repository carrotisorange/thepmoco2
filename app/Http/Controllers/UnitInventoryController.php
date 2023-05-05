<?php

namespace App\Http\Controllers;

use App\Models\UnitInventory;
use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\Unit;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Models\Tenant;
use App\Models\Contract;

class UnitInventoryController extends Controller
{
    public function create(Property $property, Unit $unit){

        $batch_no = Str::random(8);

        $current_inventory = UnitInventory::where('unit_uuid', $unit->uuid)->count();

        if(!$current_inventory){
        UnitInventory::create(
            [
                'unit_uuid' => $unit->uuid,
                'user_id' => auth()->user()->id,
                'batch_no' => $batch_no
            ]
        );
        }

        return view('inventories.create',[
            'unit' => $unit,
            'batch_no' => $batch_no,
            'ismovein' => false
        ]);
    }

    public function movein_create(Property $property, Unit $unit, Tenant $tenant, Contract $contract){

        return view('inventories.movein-create', [
            'property' => $property,
            'unit' => $unit,
            'tenant' => $tenant, 
            'contract' => $contract,
            'ismovein' => true
        ]);
    }

    public function export(Property $property, Unit $unit){
        
        $data = [
            'unit' => $unit,
            'inventories' => UnitInventory::where('unit_uuid', $unit->uuid)->where('contract_uuid', '')
            ->get()
        ];

        $pdf = \PDF::loadView('inventories.export', $data)->setPaper('a4', 'landscape');

         $pdf->output();

         $canvas = $pdf->getDomPDF()->getCanvas();

         $height = $canvas->get_height();
         $width = $canvas->get_width();

         $canvas->set_opacity(.2,"Multiply");

         $canvas->set_opacity(.2);

         $canvas->page_text($width/5, $height/2, $property->property, null,
         55, array(0,0,0),2,2,-30);

        return $pdf->stream($unit->unit.'-'.Carbon::now()->format('M d, Y').'-unit-inventory.pdf');
    }

     public function export_movein(Property $property, Unit $unit, Contract $contract){
        
        $data = [
            'unit' => $unit,
            'inventories' => UnitInventory::where('unit_uuid', $unit->uuid)->where('contract_uuid', $contract->uuid)
            ->get()
        ];

        $pdf = \PDF::loadView('inventories.export', $data);

         $pdf->output();

         $canvas = $pdf->getDomPDF()->getCanvas();

         $height = $canvas->get_height();
         $width = $canvas->get_width();

         $canvas->set_opacity(.2,"Multiply");

         $canvas->set_opacity(.2);

         $canvas->page_text($width/5, $height/2, $property->property, null,
         55, array(0,0,0),2,2,-30);

        return $pdf->stream($unit->unit.'-'.Carbon::now()->format('M d, Y').'-unit-inventory.pdf');
    }

    public function upload_image(Property $property, Unit $unit, UnitInventory $unit_inventory){
        return view('inventories.upload-image',[
            'unit' => $unit,
            'unit_inventory' => $unit_inventory
        ]);
    }
}
