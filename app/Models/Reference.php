<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reference extends Model
{
    use HasFactory;

    public function tenant()
    {
        return $this->belongsTo(Tenant::class,'tenant_uuid');
    }

     public function relationship()
     {
        return $this->belongsTo(Relationship::class);
     }
}
