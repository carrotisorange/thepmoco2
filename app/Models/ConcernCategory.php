<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConcernCategory extends Model
{
    use HasFactory;

    public function concern()
    {
        return $this->hasMany(Concern::class);
    }

    public function subcategory(){
        return $this->belongsTo(ConcernSubcategory::class, 'category_id')->withDefault();
    }
}
