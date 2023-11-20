<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Point extends Model
{
    use HasFactory;

    public function action()
    {
        return $this->belongsTo(Action::class, 'action_id')->withDefault();
    }

    public function user()
    {
        return $this->belongsTo(User::class)->withDefault();
    }

      public function property()
      {
      return $this->belongsTo(Property::class)->withDefault();
      }
}
