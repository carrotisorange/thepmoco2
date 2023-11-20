<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Remittance extends Model
{
    use HasFactory;

    public function unit()
    {
        return $this->belongsTo(Unit::class)->withDefault();
    }

    public function particular()
    {
        return $this->belongsTo(Particular::class)->withDefault();
    }

    public function owner()
    {
        return $this->belongsTo(Owner::class)->withDefault();
    }

    public function tenant()
    {
        return $this->belongsTo(Tenant::class)->withDefault();
    }

    public function guest(){
        return $this->belongsTo(Guest::class)->withDefault();
    }

    public function remittance(){
        return $this->belongsTo(Remittance::class)->withDefault();
    }
}
