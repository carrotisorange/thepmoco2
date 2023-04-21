<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccountPayableLiquidationParticular extends Model
{
    use HasFactory;

    protected $attributes = [
        'or_number' => '0000'
    ];
}
