<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HouseOwner extends Model
{
    use HasFactory;

    protected $attributes = [
        'photo_id' => 'avatars/avatar.png',
        'city_id' => 48315,
    ];

    public static function search($search)
    {
        return empty($search)? static::query()
      : static::where('house-owner','like', '%'.$search.'%');
    }
}
