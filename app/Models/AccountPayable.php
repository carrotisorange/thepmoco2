<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Session;

class AccountPayable extends Model
{
    use HasFactory, SoftDeletes;

    protected $attributes = [
        'is_approved'=> false,
    ];

    public function property()
    {
        return $this->belongsTo(Property::class, 'property_uuid');
    }

    public function particular()
    {
        return $this->belongsTo(Particular::class, 'particular_id');
    }

    public function requester()
    {
        return $this->belongsTo(User::class, 'requester_id');
    }

    public function approver_1()
    {
        return $this->belongsTo(User::class, 'approver_id');
    }

    public function approver_2()
    {
        return $this->belongsTo(User::class, 'approver2_id');
    }

    public function biller()
    {
        return $this->belongsTo(PropertyBiller::class, 'biller_id');
    }

    public function particulars(){
        return $this->hasMany(AccountPayableParticular::class, 'batch_no');
    }


    public function scopeSelectedRequested($query)
    {
        return $query->where('requester_id', auth()->user()->id);
    }
}

