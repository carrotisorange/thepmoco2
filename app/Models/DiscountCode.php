<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiscountCode extends Model
{
    use HasFactory;

    protected $primaryKey = 'discount_code';

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
