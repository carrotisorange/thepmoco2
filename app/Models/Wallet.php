<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    use HasFactory;
    
    public function tenant()
    {
        return $this->belongsTo(Tenant::class, 'tenant_uuid')->withDefault();
    }

    public function contract()
    {
        return $this->belongsTo(Contract::class, 'contract_uuid')->withDefault();
    }
}
