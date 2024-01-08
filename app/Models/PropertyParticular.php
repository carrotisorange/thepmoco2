<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyParticular extends Model
{
    use HasFactory;

      public function property()
      {
        return $this->belongsTo(Property::class, 'property_uuid')->withDefault();
      }

      public function particular(){
        return $this->belongsTo(Particular::class, 'particular_id')->withDefault();
      }
}
