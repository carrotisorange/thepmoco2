<?php


namespace App\Http\Controllers\Utilities;

use App\Http\Controllers\Controller;

use Session;
use App\Models\PaymentRequest;

class PaymentRequestController extends Controller
{
    public function get($status=null, $groupBy=null)
    {
        return PaymentRequest::join('tenants', 'payment_requests.tenant_uuid',
        'tenants.uuid')->getAll(Session::get('property_uuid'), $status, $groupBy);
    }
}
