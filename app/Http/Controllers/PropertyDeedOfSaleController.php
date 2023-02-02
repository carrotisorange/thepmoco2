<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDO;
use App\Models\DeedOfSale;

class PropertyDeedOfSaleController extends Controller
{
    public function destroy($unit_uuid){
        DeedOfSale::where('unit_uuid', $unit_uuid)->delete();
    }
}
