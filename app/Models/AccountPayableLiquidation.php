<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccountPayableLiquidation extends Model
{
    use HasFactory;

    protected $attributes = [
        'total' => 0,
    ];


}
