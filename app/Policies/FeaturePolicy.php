<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\{UserRestriction};
use Session;

class FeaturePolicy
{
    use HandlesAuthorization;

   public function view($featureId, $restrictionId){
        return true;
   }
}
