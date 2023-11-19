<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;

    public function properties()
    {
        return $this->hasMany(Property::class);
    }

    public function landing_page_feature_id(){
        return $this->belongsTo(Type::class)->withDefault();
    }
}
