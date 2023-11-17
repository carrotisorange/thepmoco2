<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Collection extends Model
{
    use HasFactory, SoftDeletes;

    public function property()
    {
        return $this->belongsTo(Property::class, 'property_uuid');
    }

    public function unit(){
        return $this->belongsTo(Unit::class, 'unit_uuid');
    }

    public function bill(){
        return $this->belongsTo(Bill::class, 'bill_id');
    }

    public function tenant()
    {
        return $this->belongsTo(Tenant::class, 'tenant_uuid');
    }

    public function owner()
    {
        return $this->belongsTo(Owner::class, 'owner_uuid');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function guest(){
        return $this->belongsTo(Guest::class, 'guest_uuid');
    }

    public function scopePosted($query)
    {
        return $query->where('is_posted', true);
    }

    public function scopeDeposit($query)
    {
        return $query->where('is_deposit', true);
    }

    public static function search($search)
        {
        return empty($search)? static::query()
        : static::where('ar_no','like', '%'.$search.'%');
    }

    public function scopePaidByBill($query, $billId){
        return $query->where('bill_id', $billId)->posted()->sum('collection');
    }

    public function scopePostedCollections($query, $type, $uuid){
        return $query->where($type, $uuid)->posted()->sum('collection');
    }


    public function collection()
    {
        return User::find(1);
    }

    public function scopeGetAll($query, $propertyUuid, $status, $groupBy){
       $results = $query->when($propertyUuid, function($query, $propertyUuid){
                $query->where('property_uuid', $propertyUuid);
            })
            ->when($status, function($query, $status){
                $query->where('is_posted', $status);
            })
            ->when($groupBy, function($query, $groupBy){
                $query->groupBy($groupBy);
            })->get();

        return $results;
    }

}
