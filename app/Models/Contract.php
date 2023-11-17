<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Referral;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contract extends Model
{
    use HasFactory, SoftDeletes;

    public $incrementing = false;

    protected $primaryKey = 'uuid';

    protected $attributes = [
        'status' => 'pendingmovein',
        'moveout_reason' => 'NA'
    ];

    public function tenant()
    {
        return $this->belongsTo(Tenant::class, 'tenant_uuid');
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class, 'unit_uuid');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function property()
    {
        return $this->belongsTo(Property::class, 'property_uuid');
    }

     public function referral()
     {
     return $this->belongsTo(Referral::class, 'contract_uuid');
     }

    public function interaction()
    {
         return $this->belongsTo(Interaction::class, 'interaction_id');
    }

    public function wallets()
    {
        return $this->hasMany(Wallet::class);
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
