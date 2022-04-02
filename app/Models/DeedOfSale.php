<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeedOfSale extends Model
{
    use HasFactory;

    public $incrementing = false;

    public $primaryKey = 'uuid';

    public function getRouteKeyName()
    {
        return 'uuid';
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class, 'unit_uuid');
    }

    public function owner()
    {
        return $this->belongsTo(Owner::class, 'owner_uuid');
    }
}
