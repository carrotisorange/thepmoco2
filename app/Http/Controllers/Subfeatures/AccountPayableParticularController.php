<?php

namespace App\Http\Controllers\Subfeatures;

use App\Http\Controllers\Controller;
use App\Models\{AccountPayableParticular, Unit};

class AccountPayableParticularController extends Controller
{
  public function store($batch_no){
    AccountPayableParticular::create([
        'batch_no' => $batch_no
    ]);
  }

  public function unit(){
    return $this->belongsTo(Unit::class, 'unit_uuid')->withDefault();
  }
}
