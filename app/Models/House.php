<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class House extends Model
{
    use HasFactory;

    protected $table = 'houses';

    protected $attributes = [
        'status_id' => 1,
    ];

     public static function search($search)
    {
        return empty($search)? static::query()
        : static::where('house','like', '%'.$search.'%');
    }

}
