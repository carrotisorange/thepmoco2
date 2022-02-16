<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tenant extends Model
{
    use HasFactory;

    protected $attributes = [
        'photo_id' => 'avatars/avatar.png',
    ];

    public function reference()
    {
        return $this->belongsTo(Reference::class, 'reference_id');
    }

    public function guardian()
    {
        return $this->belongsTo(Guardian::class, 'guardian_id');
    }
}
