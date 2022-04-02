<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enrollee extends Model
{
    use HasFactory;

     public $incrementing = false;

     protected $primaryKey = 'uuid';

     protected $attributes =[
         'unenrollment_reason' => 'NA',
         'status' => 'active',
     ];

    public function unit()
    {
        return $this->belongsTo(Unit::class, 'unit_uuid');
    }

    public function owner()
    {
    return $this->belongsTo(Owner::class, 'owner_uuid');
    }
}
