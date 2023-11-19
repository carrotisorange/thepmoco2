<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bill extends Model
{
    use HasFactory, SoftDeletes;

    protected $attributes = [
        'status' => 'unpaid',
        'due_date' => null,
        'bill' => 0
    ];


    public function property()
    {
        return $this->belongsTo(Property::class, 'property_uuid')->withDefault();
    }

    public function unit(){
        return $this->belongsTo(Unit::class, 'unit_uuid')->withDefault();
    }

     public function collection(){
        return $this->belongsTo(Collection::class, 'bill_id')->withDefault();
     }


    public function tenant()
    {
        return $this->belongsTo(Tenant::class, 'tenant_uuid')->withDefault();
    }

    public function owner()
    {
        return $this->belongsTo(Owner::class, 'owner_uuid')->withDefault();
    }

    public function houseOwner(){
        return $this->belongsTo(HouseOwner::class,'house_owner_id')->withDefault();
    }

    public function guest(){
        return $this->belongsTo(Guest::class, 'guest_uuid')->withDefault();
    }


    public function particular()
    {
        return $this->belongsTo(Particular::class, 'particular_id')->withDefault();
    }

    public function scopePosted($query)
    {
        return $query->where('is_posted', true);
    }

    public function scopePostedBills($query, $type, $uuid){
        return $query->where($type, $uuid)->posted()->sum('bill');
    }

    public function scopePostedStatusBills($query, $type, $uuid, $status){
        return $query->where($type, $uuid)->posted()->where('status', $status)->sum('bill');
    }



    public static function search($search)
    {
         return empty($search)? static::query()
         : static::where('reference_no','like', '%'.$search.'%');
    }

    public function scopeGetAll($query, $propertyUuid, $isPosted, $status, $groupBy){
       $results =
            $query->when($propertyUuid, function($query, $propertyUuid){
                $query->where('property_uuid', $propertyUuid);
            })
            ->when($isPosted, function($query, $isPosted){
                $query->where('is_posted', $isPosted);
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
