<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Spouse extends Model
{
    use HasFactory;

    public function owner()
    {
        return $this->belongsTo(Owner::class, 'owner_uuid')->withDefault();
    }
}
