<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    use HasFactory;

    public function tenants()
    {
        return $this->hasMany(Province::class);
    }

    public function owners()
    {
        return $this->hasMany(Province::class);
    }
}
