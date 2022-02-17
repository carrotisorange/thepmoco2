<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    public function tenants()
    {
        return $this->hasMany(Tenant::class);
    }

    public function owners()
    {
        return $this->hasMany(Owner::class);
    }
}
