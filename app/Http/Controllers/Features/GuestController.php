<?php

namespace App\Http\Controllers\Features;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use Session;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendPaymentToTenant;

use App\Models\{Property,Guest,Unit,Bill,Collection,AdditionalGuest,Booking,AcknowledgementReceipt, User};

class GuestController extends Controller
{
    public function index(Property $property){

        $featureId = 7; //refer to the features table

        $restrictionId = 2; //refer to the restrictions table

        app('App\Http\Controllers\PropertyController')->storePropertySession($property->uuid);

        app('App\Http\Controllers\Utilities\UserPropertyController')->isUserAuthorized();

        if(!app('App\Http\Controllers\Utilities\UserRestrictionController')->isFeatureAuthorized($featureId, $restrictionId)){
            return abort(403);
        }

        app('App\Http\Controllers\PropertyController')->storeUnitStatistics();

        app('App\Http\Controllers\Utilities\ActivityController')->storeUserActivity($featureId,$restrictionId);

        return view('features.guests.index',[
            'property' => $property
        ]);
    }

    public function getGuests(){
        return Guest::where('property_uuid', Session::get('property_uuid'));
    }

    public function show_unit_guests($unit_uuid)
    {
       return Booking::where('unit_uuid', $unit_uuid)->get();
    }

    public function create(Property $property, Unit $unit)
    {
        return view('features.create', [
            'unit' => $unit
        ]);
    }

    public function store($guest_uuid, $unit_uuid, $guest, $email, $mobile_number, $movein_at, $moveout_at, $vehicle_details, $plate_number)
    {
        Guest::create([
            'uuid' => $guest_uuid,
            'unit_uuid' => $unit_uuid,
            'guest' => $guest,
            'email' => $email,
            'mobile_number' => $mobile_number,
            'movein_at' => $movein_at,
            'moveout_at' => $moveout_at,
            'property_uuid' => Session::get('property_uuid'),
            'vehicle_details' => $vehicle_details,
            'plate_number' => $plate_number
        ]);
    }

    public function show (Property $property, Guest $guest){
        return view('properties.guests.show', [
            'property' => $property,
            'guest_details' => $guest
        ]);
    }

    public function edit(Property $property, Guest $guest, Booking $booking){

        return view('properties.guests.edit',[
            'property' => $property,
            'guest_details' => $guest,
            'booking_details' => $booking
        ]);
    }

    public function show_bills(Property $property, Guest $guest){
        return view('properties.guests.show-bills',[
            'property' => $property,
            'guest' => $guest,
        ]);
    }

    public function store_collections(Property $property, Guest $guest, $batch_no){
     $collections = Bill::where('guest_uuid', $guest->uuid)
      ->where('batch_no', $batch_no)
      ->get();

      return view('properties.guests.store-collections',[
        'property' => $property,
         'collections' => $collections,
         'guest' => $guest,
         'batch_no' => $batch_no
      ]);
    }

    public function update_collections(Request $request, Property $property, Guest $guest, $batch_no)
     {
          Property::find($property->uuid)->collections()->where('guest_uuid', $guest->uuid)->where('is_posted', 0)->where('batch_no', '!=', $batch_no)->forceDelete();

         $ar_no = app('App\Http\Controllers\Features\CollectionController')->getLatestAr($property->uuid);

         $counter = $this->get_selected_bills_count($batch_no, $guest->uuid);

         for($i=0; $i<$counter; $i++)
         {
            $collection = (double) $request->input("collection_amount_".$i);

            $form = $request->form;

            $created_at = $request->created_at;

            $bill_id = $request->input("bill_id_".$i);

            $total_amount_due = $this->get_bill_balance($bill_id);

            $bill = Bill::find($bill_id);

            //store the collection
            app('App\Http\Controllers\Features\CollectionController')->update($ar_no, $bill_id, $collection, $form, $created_at);

            if(($total_amount_due) <= $collection)
            {
                app('App\Http\Controllers\Features\BillController')->update_bill_amount_due($bill_id, 'paid');

                app('App\Http\Controllers\Features\BillController')->update_bill_initial_payment($bill_id , $collection);
            }
            else
            {
                app('App\Http\Controllers\Features\BillController')->update_bill_amount_due($bill_id, 'partially_paid');

                app('App\Http\Controllers\Features\BillController')->update_bill_initial_payment($bill_id, $collection);
            }
         }

        $ar_id = AcknowledgementReceipt::insertGetId([
            'guest_uuid' => $guest->uuid,
            'amount' => Collection::where('ar_no', $ar_no)->where('batch_no', $batch_no)->sum('collection'),
            'property_uuid' => $property->uuid,
            'user_id' => auth()->user()->id,
            'ar_no' => $ar_no,
            'mode_of_payment' => $request->form,
            'collection_batch_no' => $batch_no,
            'cheque_no' => $request->check_no,
            'bank' => $request->bank,
            'date_deposited' => $request->date_deposited,
            'created_at' => $request->created
        ]);

        if(!$request->attachment == null)
        {
               AcknowledgementReceipt::where('id', $ar_id)
               ->update([
               'attachment' => $request->attachment->store('attachments')
               ]);
        }

        if(!$request->proof_of_payment == null)
        {
            AcknowledgementReceipt::where('id', $ar_id)
            ->update([
            'proof_of_payment' => $request->proof_of_payment->store('proof_of_payments')
            ]);
        }

         app('App\Http\Controllers\Utilities\PointController')->store($property->uuid, auth()->user()->id, Collection::where('ar_no', $ar_no)->where('batch_no', $batch_no)->count(), 6);

        //  $this->send_payment_to_guest($guest, $ar_no, $request->form, $request->created_at, User::find(auth()->user()->id)->name, User::find(auth()->user()->id)->role->role, Collection::where('guest_uuid',$guest->uuid)->where('batch_no', $batch_no)->get());

         return redirect('/property/'.$property->uuid.'/guest/'.$guest->uuid)->with('success', 'Changes Saved!');

         // return redirect('/property/'.Session::get('property_uuid').'/tenant/'.$tenant->uuid.'/ar/'.$ar_id.'/view')->with('success', 'Payment is successfully created.');
     }

     public function send_payment_to_guest($guest, $ar_no, $form, $payment_made, $user, $role, $collection)
     {
       $data = [
         'tenant' => $guest->guest,
         'ar_no' => $ar_no,
         'form' => $form,
         'payment_made' => $payment_made,
         'user' => $user,
         'role' => $role,
         'collections' => $collection,
         'balance' => $this->get_guest_balance($guest->uuid)
       ];

      if($guest->email)
       {
         return Mail::to($guest->email)->send(new SendPaymentToTenant($data));
       }
     }

    public function get_guest_balance($guest_uuid)
    {
        return Bill::where('guest_uuid', $guest_uuid)->whereIn('status', ['unpaid', 'partially_paid'])->orderBy('bill_no','desc')->get();
    }

    public function get_selected_bills_count($batch_no, $guest_uuid)
      {
      return Collection::where('property_uuid', Session::get('property_uuid'))
      ->where('guest_uuid',$guest_uuid)
      ->where('batch_no', $batch_no)
      ->where('is_posted', false)
      ->count();
      }

    public function view_attachment(Property $property, Guest $guest, AcknowledgementReceipt $ar)
   {
      $attachment = $ar->attachment;

      return Storage::download(($attachment), 'AR_'.$ar->ar_no.'_'.$ar->guest->guest.'.png');
   }


    public function get_bill_balance($bill_id)
    {
        return Bill::where('id',$bill_id)->sum('bill') - Bill::where('id',$bill_id)->sum('initial_payment');
    }

    public function show_collections(Property $property, Guest $guest, Collection $collection)
     {
        $balance = $this->get_guest_balance($collection->guest_uuid);

        $data = $this->get_collection_data(
            $guest,
            $collection,
            $balance,
        );

        $folder_path = 'properties.guests.export-collections';

        $pdf = app('App\Http\Controllers\Utilities\ExportController')->generatePDF($folder_path, $data);

        $pdf_name = str_replace(' ', '_', $property->property).'_AR_'.$collection->ar_no.'.pdf';

        return $pdf->stream($pdf_name);
     }

    public function get_collection_data($guest, $collection, $balance)
     {
           $aggregated_collection = Collection::where('property_uuid',
           $collection->property_uuid)->where('guest_uuid', $guest->uuid)->posted()->where('ar_no',
           $collection->ar_no);


          $unpaid_bills = $unpaid_bills = Bill::where('tenant_uuid', $guest->uuid)->sum('bill');
          $paid_bills = Collection::where('guest_uuid', $guest->uuid)->posted()->sum('collection');

            if($unpaid_bills<=0){
                $balance=0;
            }else
            {
                $balance=$unpaid_bills - $paid_bills;
            }

      return [
         'created_at' => $collection->updated_at,
         'reference_no' => $guest->bill_reference_no,
         'guest' => $guest->guest,
         'mode_of_payment' => $collection->form,
         'user' => $collection->user->name,
         'role' => $collection->user->role->role,
         'ar_no' => $collection->ar_no,
         'amount' => $aggregated_collection->sum('collection'),
         'cheque_no' => $collection->cheque_no,
         'bank' => $collection->bank,
         'property' => $guest->property->property,
         'date_deposited' => $collection->updated_at,
         'collections' => $aggregated_collection->get(),
         'balance' => $balance,
      ];
     }


     public function movein(Property $property, Unit $unit, Guest $guest)
    {
        Guest::where('uuid', $guest->uuid)
        ->update([
            'status' => 'active',
            'movein_at' => Carbon::now()
        ]);

        return redirect(url()->previous())->with('success', 'Changes Saved!');
    }

    public function update(Request $request ,$uuid)
    {
        $booking = Guest::find($uuid);
        if(! $booking) {
            return response()->json([
                'error' => 'Unable to locate the event'
            ], 404);
        }
        $booking->update([
            'start' => $request->start,
            'end' => $request->end,
        ]);

        return response()->json('Event updated');
    }

    public function moveout(Property $property, Unit $unit, Guest $guest)
    {
        Guest::where('uuid', $guest->uuid)
        ->update([
            'status' => 'inactive',
            'moveout_at' => Carbon::now()
        ]);

        return redirect(url()->previous())->with('success', 'Changes Saved!');
    }

    public function destroy($unit_uuid){
        Guest::where('unit_uuid', $unit_uuid)->delete();
    }

    public function export(Property $property, Guest $guest){
        $data = [
            'guest' => $guest,
            'additional_guests' => AdditionalGuest::where('guest_uuid', $guest->uuid)->get(),
        ];

        $pdf = \PDF::loadView('properties.guests.export', $data);

         $pdf->output();

         $canvas = $pdf->getDomPDF()->getCanvas();

         $height = $canvas->get_height();
         $width = $canvas->get_width();

         $canvas->set_opacity(.2,"Multiply");

         $canvas->set_opacity(.2);

         $canvas->page_text($width/5, $height/2, "", null, 55, array(0,0,0),2,2,-30);

        return $pdf->stream($guest->unit->unit.'-'.Carbon::now()->format('M d, Y').'-guest-info.pdf');
    }

    public function export_bill(Request $request, Property $property, Guest $guest){

        app('App\Http\Controllers\PropertyController')->update_property_note_to_bill($property->uuid, $request->note_to_bill);

        $data = $this->get_bill_data($guest, $request->due_date, $request->penalty, $request->note_to_bill);

        $folder_path = 'properties.guests.export-bills';

        $pdf = app('App\Http\Controllers\Utilities\ExportController')->generatePDF($folder_path, $data);

        return $pdf->stream(Carbon::now()->format('M d, Y').'-'.$guest->guest.'-soa.pdf');
    }

    public function get_bill_data($guest, $due_date, $penalty, $note)
    {
          $unpaid_bills = Bill::where('guest_uuid', $guest->uuid)->sum('bill');
          $paid_bills = Collection::where('guest_uuid', $guest->uuid)->posted()->sum('collection');

        if($unpaid_bills<=0){
            $balance=0;
        }else
        {
            $balance=$unpaid_bills - $paid_bills;
        }

        return $data = [
            'guest' => $guest->guest,
            'due_date' => $due_date,
            'penalty' => $penalty,
            'user' => User::find(auth()->user()->id)->name,
            'role' => User::find(auth()->user()->id)->role->role,
            'bills' => Bill::where('guest_uuid', $guest->uuid)->whereIn('status', ['unpaid','partially_paid'])->get(),
            'balance' => $balance,
            'balance_after_due_date' => $balance + $penalty,
            'note_to_bill' => $note,
        ];
    }

}
