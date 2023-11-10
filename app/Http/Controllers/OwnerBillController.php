<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use DB;
use Session;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendBillToOwner;
use App\Models\{Owner,Property,Collection,Bill,User};


class OwnerBillController extends Controller
{
    public function get_bill_balance($bill_id)
    {
        return Bill::where('id',$bill_id)->sum('bill') - Bill::where('id',$bill_id)->sum('initial_payment');
    }

    public function get_owner_balance($owner_uuid)
    {
        return Bill::where('owner_uuid', $owner_uuid)->where('status', 'unpaid')->orderBy('bill_no','desc')->get();
    }

    public function store(Request $request, Property $property, Owner $owner)
    {
          $attributes = request()->validate([
            'bill' => 'required|numeric|min:1',
            'particular_id' => ['required', Rule::exists('particulars', 'id')],
            'unit_uuid' => ['required', Rule::exists('units', 'uuid')],
            'start' => 'required|date',
            'end' => 'nullable|date|after:start',
        ]);

        try {
             DB::transaction(function () use ($property, $request, $owner, $attributes){

            $bill_no = app('App\Http\Controllers\Features\BillController')->getLatestBillNo($property->uuid);

            $attributes['bill_no']= $bill_no;

            if($request->particular_id == 8)
            {
                $attributes['bill'] = -($request->bill);
            }else{
                $attributes['bill'] = $request->bill;
            }

            $attributes['reference_no']= $owner->bill_reference_no;

            $attributes['due_date'] = Carbon::parse($request->start)->addDays(7);

            $attributes['user_id'] = auth()->user()->id;

            $attributes['property_uuid'] = $property->uuid;

            $attributes['owner_uuid'] = $owner->uuid;

            $attributes['is_posted'] = true;

            Bill::create($attributes);

            app('App\Http\Controllers\PointController')->store(Session::get('property_uuid'), auth()->user()->id, 1, 3);

        });

            return redirect(url()->previous())->with('success', 'Changes Saved!');
        }
        catch(\Exception $e)
        {
            return back()->with('error',$e);
        }
    }

    public function export(Request $request, Property $property, Owner $owner)
    {
       app('App\Http\Controllers\Features\PropertyController')->update_property_note_to_bill($property->uuid, $request->note_to_bill);

       $data = $this->get_bill_data($owner, $request->due_date, $request->penalty, $request->note_to_bill);

       $folder_path = 'features.owners.bills.export';

       $pdf = app('App\Http\Controllers\ExportController')->generatePDF($folder_path, $data);

       return $pdf->stream(Carbon::now()->format('M d, Y').'-'.$owner->owner.'-soa.pdf');
    }

    public function send(Request $request, Property $property, Owner $owner)
    {
        app('App\Http\Controllers\Features\PropertyController')->update_property_note_to_bill($property->uuid, $request->note_to_bill);

        $data = $this->get_bill_data($owner, $request->due_date, $request->penalty, $request->note_to_bill);

        Mail::to($request->email)->send(new SendBillToOwner($data));

       return redirect(url()->previous())->with('success', 'Changes Saved!');
    }

    public function get_bill_data($owner, $due_date, $penalty, $note)
    {
        $unpaid_bills = Bill::where('owner_uuid', $owner->uuid)->posted()->sum('bill');
        $paid_bills = Collection::where('owner_uuid', $owner->uuid)->posted()->sum('collection');

        if($unpaid_bills<=0){
            $balance=0;
        }else{
            $balance=$unpaid_bills - $paid_bills;
        }

        return $data = [
            'owner' => $owner->owner,
            'reference_no' => $owner->bill_reference_no,
            'due_date' => $due_date,
            'user' => User::find(auth()->user()->id)->name,
            'role' => User::find(auth()->user()->id)->role->role,
            'balance' => $balance,
            'bills' => Bill::where('owner_uuid', $owner->uuid)->where('status', 'unpaid')->get(),
            'balance_after_due_date' => $balance + $penalty,
            'note_to_bill' => $note,
        ];
    }

}
