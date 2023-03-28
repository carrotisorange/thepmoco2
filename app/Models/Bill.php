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
        return $this->belongsTo(Property::class, 'property_uuid');
    }

    public function unit(){
        return $this->belongsTo(Unit::class, 'unit_uuid');
    }

     public function collection(){
        return $this->belongsTo(Collection::class, 'bill_id');
     }


    public function tenant()
    {
        return $this->belongsTo(Tenant::class, 'tenant_uuid');
    }

    public function owner()
    {
        return $this->belongsTo(Owner::class, 'owner_uuid');
    }
    

    public function particular()
    {
        return $this->belongsTo(Particular::class, 'particular_id');
    }

    public static function search($search)
    {
    //   $tenant = Tenant::where('tenant','like', '%'.$search.'%')->pluck('bill_reference_no');
    //     if(!$tenant){
    //         return empty($search)? static::query()
    //         : static::where('reference_no','like', '%'.$tenant[0].'%');
    //     }else{
         return empty($search)? static::query()
         : static::where('reference_no','like', '%'.$search.'%');
        // }
    }
 }
