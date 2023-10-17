<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voter extends Model
{
    use HasFactory;

    protected $attributes = [
        'position_id' => 1,
        'is_voter' => true,
    ];

    public function houseOwner()
    {
        return $this->belongsTo(HouseOwner::class, 'house_owner_id');
    }

    public function house()
    {
        return $this->belongsTo(House::class, 'house_id');
    }


}
