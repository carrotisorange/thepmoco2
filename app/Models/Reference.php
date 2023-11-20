<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reference extends Model
{
    use HasFactory, SoftDeletes;

    public function tenant()
    {
        return $this->belongsTo(Tenant::class,'tenant_uuid')->withDefault();
    }

     public function relationship()
     {
        return $this->belongsTo(Relationship::class)->withDefault();
     }
}
