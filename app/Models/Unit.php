<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Unit extends Model
{
    use HasFactory, SoftDeletes;

    public $incrementing = false;

    public $primaryKey = 'uuid';

    public function getRouteKeyName()
    {
        return 'uuid';
    }

    protected $attributes = [
        'rent'=>0.00,
        'size' => 0.00,
        'discount' => 0.00,
        'building_id' => null,
        'status_id' => 1,
        'category_id' => 1,
        'thumbnail' => 'thumbnails/thumbnail.png',
        'occupancy' => 1,
        'is_enrolled' => 0,
        'is_the_unit_for_rent_to_tenant' => 1,
        'floor_id' => 1,
        'rent_type' => 'rent_per_unit',
        'rent_duration' => 'long_term'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id')->withDefault();
    }

    public function building()
    {
        return $this->belongsTo(Building::class, 'building_id')->withDefault();
    }

    public function floor()
    {
        return $this->belongsTo(Floor::class, 'floor_id')->withDefault();
    }

    public function property()
    {
        return $this->belongsTo(Property::class, 'property_uuid')->withDefault();
    }

    public function paymentrequests()
    {
     return $this->hasMany(PaymentRequest::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id')->withDefault();
    }


    public function status()
    {
        return $this->belongsTo(Status::class, 'status_id')->withDefault();
    }

    public function contracts()
    {
        return $this->hasMany(Contract::class);
    }

    public function concerns(){
        return $this->hasMany(Concern::class);
    }

    public function guests(){
        return $this->hasMany(Guest::class);
    }

    public function utilities(){
        return $this->hasMany(Utility::class);
    }

    public function enrollees()
    {
        return $this->hasMany(Enrollee::class);
    }

     public function bills()
     {
     return $this->hasMany(Bill::class);
     }

    public function collections()
    {
        return $this->hasMany(Collection::class);
    }

    public function remittances(){
        return $this->hasMany(Remittance::class);
    }

    public function acknowledgementreceipts()
    {
        return $this->hasMany(AcknowledgementReceipt::class);
    }

    public function deed_of_sales()
    {
        return $this->hasMany(DeedOfSale::class, 'unit_uuid');
    }

    public static function search($search)
    {
        return empty($search)? static::query()
        : static::where('unit','like', '%'.$search.'%');
    }

    public function scopeOccupied($query){
        return $query->where('status_id', 2);
    }

    public function account_payable_particulars(){
        return $this->hasMany(AccountPayableParticular::class);
    }

public function scopeGetAll($query, $propertyUuid, $status, $groupBy){
    $results = $query->when($propertyUuid, function($query, $propertyUuid){
            $query->where('property_uuid', $propertyUuid);
        })
        ->when($status, function($query, $status){
            $query->where('status_id', $status);
        })
        ->when($groupBy, function($query, $groupBy){
            $query->groupBy($groupBy);
        })->get();

    return $results;
}
}
