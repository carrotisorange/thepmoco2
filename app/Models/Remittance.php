<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Remittance extends Model
{
    use HasFactory;

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }

    public function particular()
    {
        return $this->belongsTo(Particular::class);
    }

    public function owner()
    {
        return $this->belongsTo(Owner::class);
    }

    public function payee()
    {
        return $this->belongsTo(Tenant::class);
    }
}
