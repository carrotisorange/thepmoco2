<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Owner;
use App\Models\Property;
use Illuminate\Validation\Rule;
use App\Models\Bill;
use DB;
use Session;
use \PDF;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendBillToOwner;

class OwnerBillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Property $property, Owner $owner)
    {
        $bills = Owner::find($owner->uuid)
            ->bills()
            ->orderBy('bill_no','desc')
            ->get();

        return view('owners.bills.index',[
            'owner' => $owner,
            'total_unpaid_bills' => $bills->whereIn('status', ['unpaid', 'partially_paid']),
            'unpaid_bills' => $this->get_owner_balance($owner->uuid),
            'particulars' => app('App\Http\Controllers\PropertyParticularController')->index($property->uuid),
            'units' => app('App\Http\Controllers\OwnerDeedOfSalesController')->show_deed_of_sales($owner->uuid),
            'note_to_bill' => $property->note_to_bill,
        ]);
    }

    
    public function get_bill_balance($bill_id)
    {
        return Bill::where('id',$bill_id)->sum('bill') - Bill::where('id',$bill_id)->sum('initial_payment');
    }

    public function get_owner_balance($owner_uuid)
    {
        return Bill::where('owner_uuid', $owner_uuid)->whereIn('status', ['unpaid', 'partially_paid'])->orderBy('bill_no','desc')->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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
            
            $bill_no = app('App\Http\Controllers\BillController')->get_latest_bill_no($property->uuid);
            
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

            app('App\Http\Controllers\PointController')->store(Session::get('property'), auth()->user()->id, 1, 3);

        });

            return back()->with('success','Bill is successfully posted.');
        }
        catch(\Exception $e)
        {   
            ddd($e);
            return back()->with('error','Cannot perform the action. Please try again.');
        }
    }

    public function export(Request $request, Property $property, Owner $owner)
    {
       app('App\Http\Controllers\PropertyController')->update_property_note_to_bill($property->uuid, $request->note_to_bill);

       $data = $this->get_bill_data($owner, $request->due_date, $request->penalty, $request->note_to_bill);
    
       $pdf = $this->generate_pdf($data, $property);

       return $pdf->download(Carbon::now()->format('M d, Y').'-'.$owner->owner.'-soa.pdf');
    }

    public function send(Request $request, Property $property, Owner $owner)
    {    
        app('App\Http\Controllers\PropertyController')->update_property_note_to_bill($property->uuid, $request->note_to_bill);

        $data = $this->get_bill_data($owner, $request->due_date, $request->penalty, $request->note_to_bill);

        Mail::to($request->email)->send(new SendBillToOwner($data));

        return back()->with('success', 'Success!');
    }

    public function generate_pdf($data, $property)
    {
        $pdf = PDF::loadView('owners.bills.export', $data);

        $pdf->output();

        $canvas = $pdf->getDomPDF()->getCanvas();

        $height = $canvas->get_height();

        $width = $canvas->get_width();

        $canvas->set_opacity(.2,"Multiply");

        $canvas->set_opacity(.2);

        $canvas->page_text($width/5, $height/2, substr_replace($property->property, "", 18), null, 50, array(0,0,0),1,1,-30);

        return $pdf;
    }

    public function get_bill_data($owner, $due_date, $penalty, $note)
    {
        return $data = [
            'owner' => $owner->owner,
            'reference_no' => $owner->bill_reference_no,
            'due_date' => $due_date,
            'penalty' => $penalty,
            'user' => User::find(auth()->user()->id)->name,
            'role' => User::find(auth()->user()->id)->role->role,
            'bills' => $this->get_owner_balance($owner->uuid),
            'note_to_bill' => $note,
        ];
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
