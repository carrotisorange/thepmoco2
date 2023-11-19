<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Relationship extends Model
{
    use HasFactory;

    public function guardian()
    {
        return $this->belongsTo(Guardian::class, 'relationship_id')->withDefault();
    }

        public function representative()
        {
        return $this->belongsTo(Representative::class, 'relationship_id')->withDefault();
        }
}
