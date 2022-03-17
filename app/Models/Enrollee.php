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
         'status' => 'pending',
     ];

    public function unit()
    {
        return $this->belongsTo(Unit::class, 'unit_uuid');
    }
}
