<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HouseOwnership extends Model
{
    use HasFactory;

    public function house()
    {
        return $this->belongsTo(House::class, 'house_id');
    }

    public function houseowner()
    {
        return $this->belongsTo(HouseOwner::class, 'house_owner_id');
    }
}
