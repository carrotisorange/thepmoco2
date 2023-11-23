<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Violation extends Model
{
    use HasFactory;

    protected $table = 'violations';

    public function type(){
        return $this->belongsTo(Violation::class)->withDefault();
    }

    public function property(){
        return $this->belongsTo(Property::class)->withDefault();
    }

    public function tenant(){
        return $this->belongsTo(Tenant::class)->withDefault();
    }

    public function unit(){
        return $this->belongsTo(Unit::class)->withDefault();
    }

    public function owner(){
        return $this->belongsTo(Owner::class)->withDefault();
    }
}
