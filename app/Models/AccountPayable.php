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
        return $this->belongsTo(Property::class, 'property_uuid')->withDefault();
    }

    public function particular()
    {
        return $this->belongsTo(Particular::class, 'particular_id')->withDefault();
    }

    public function requester()
    {
        return $this->belongsTo(User::class, 'requester_id')->withDefault();
    }

    public function approver_1()
    {
        return $this->belongsTo(User::class, 'approver_id')->withDefault();
    }

    public function approver_2()
    {
        return $this->belongsTo(User::class, 'approver2_id')->withDefault();
    }

    public function biller()
    {
        return $this->belongsTo(PropertyBiller::class, 'biller_id')->withDefault();
    }

    public function particulars(){
        return $this->hasMany(AccountPayableParticular::class, 'batch_no');
    }


    public function scopeSelectedRequested($query)
    {
        return $query->where('requester_id', auth()->user()->id);
    }

     public function scopeGetAll($query, $propertyUuid, $status, $groupBy){
       $results = $query->when($propertyUuid, function($query, $propertyUuid){
                $query->where('property_uuid', $propertyUuid);
            })
            ->when($status, function($query, $status){
                $query->where('status', $status);
            })
            ->when($groupBy, function($query, $groupBy){
                $query->groupBy($groupBy);
            })->get();

        return $results;
    }
}

