<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Property;
use App\Models\Guest;
use App\Models\Unit;
use Carbon\Carbon;
use App\Models\Bill;
use App\Models\Collection;
use Session;
use App\Models\AcknowledgementReceipt;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendPaymentToTenant;
use \PDF;
use App\Models\AdditionalGuest;
use App\Models\Booking;

class PropertyGuestController extends Controller
{
    public function index(Property $property){

        app('App\Http\Controllers\ActivityController')->store($property->uuid, auth()->user()->id,'opens',22);

        app('App\Http\Controllers\UserPropertyController')->isUserApproved(auth()->user()->id, $property->uuid);

        return view('properties.guests.index',[
            'property' => $property
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

         $ar_no = app('App\Http\Controllers\AcknowledgementReceiptController')->get_latest_ar($property->uuid);

         $counter = $this->get_selected_bills_count($batch_no, $guest->uuid);
      
         for($i=0; $i<$counter; $i++)
         {
            $collection = (double) $request->input("collection_amount_".$i);

            $form = $request->form;

            $bill_id = $request->input("bill_id_".$i);

            $total_amount_due = $this->get_bill_balance($bill_id);

            $bill = Bill::find($bill_id);
            
            //store the collection
            app('App\Http\Controllers\CollectionController')->update($ar_no, $bill_id, $collection, $form);

            if(($total_amount_due) <= $collection)
            {
                app('App\Http\Controllers\BillController')->update_bill_amount_due($bill_id, 'paid');

                app('App\Http\Controllers\BillController')->update_bill_initial_payment($bill_id , $collection);
            }
            else
            {
                app('App\Http\Controllers\BillController')->update_bill_amount_due($bill_id, 'partially_paid');

                app('App\Http\Controllers\BillController')->update_bill_initial_payment($bill_id, $collection);
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

         app('App\Http\Controllers\PointController')->store($property->uuid, auth()->user()->id, Collection::where('ar_no', $ar_no)->where('batch_no', $batch_no)->count(), 6);

         $this->send_payment_to_guest($guest, $ar_no, $request->form, $request->created_at, User::find(auth()->user()->id)->name, User::find(auth()->user()->id)->role->role, Collection::where('guest_uuid',$guest->uuid)->where('batch_no', $batch_no)->get());
   
         return redirect('/property/'.$property->uuid.'/guest/'.$guest->uuid)->with('success', 'Success!');

         // return redirect('/property/'.Session::get('property').'/tenant/'.$tenant->uuid.'/ar/'.$ar_id.'/view')->with('success', 'Payment is successfully created.');
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
      return Collection::where('property_uuid', Session::get('property'))
      ->where('guest_uuid',$guest_uuid)
      ->where('batch_no', $batch_no)
      ->where('is_posted', false)
      ->max('id');
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

    public function show_collections(Property $property, Guest $guest, AcknowledgementReceipt $ar)
     {          
         $balance = $this->get_guest_balance($ar->guest_uuid);

         $data = $this->get_collection_data(
            $ar->created_at, 
            $guest->uuid, 
            $guest->guest,
            $ar->mode_of_payment,
            User::find($ar->user_id)->name,
            User::find($ar->user_id)->role->role,
            $ar->ar_no,
            $ar->amount,
            $ar->cheque_no,
            $ar->bank,
            $property,
            $ar->date_deposited,
            Collection::where('guest_uuid',$ar->guest_uuid)->where('batch_no', $ar->collection_batch_no)->orderBy('ar_no','asc')->get(),
            $balance
         );

        $pdf = $this->generate_pdf($property, $data, 'properties.guests.export-collections');

        return $pdf->stream($guest->guest.'-ar.pdf');
     }

      public function generate_pdf(Property $property, $data, $folder_path)
     {

         $pdf = PDF::loadView($folder_path, $data);

         $pdf->output();
               
         $canvas = $pdf->getDomPDF()->getCanvas();

         $height = $canvas->get_height();
         
         $width = $canvas->get_width();

         $canvas->set_opacity(.2,"Multiply");

         $canvas->set_opacity(.2);

         $canvas->page_text($width/5, $height/2, $property->property, null, 55, array(0,0,0),2,2,-30);

         return $pdf;

     }

      public function get_collection_data($payment_made, $reference_no, $tenant, $mode_of_payment, $user, $role, $ar_no, $amount, $cheque_no, $bank, $property, $date_deposited, $collections, $balance)
     {
      return [
         'created_at' => $payment_made,
         'reference_no' => $reference_no,
         'tenant' => $tenant,
         'mode_of_payment' => $mode_of_payment,
         'user' => $user,
         'role' => $role,
         'ar_no' => $ar_no,
         'amount' => $amount,
         'cheque_no' => $cheque_no,
         'bank' => $bank,
         'property' => $property,
         'date_deposited' => $date_deposited,
         'collections' => $collections,
         'balance' => $balance
      ];
     }


     public function movein(Property $property, Unit $unit, Guest $guest)
    {
        Guest::where('uuid', $guest->uuid)
        ->update([
            'status' => 'active',
            'movein_at' => Carbon::now()
        ]);

        return back()->with('success', 'Success!');
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

        return back()->with('success', 'Success!');
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

         $canvas->page_text($width/5, $height/2, $property->property, null,
         55, array(0,0,0),2,2,-30);

        return $pdf->stream($guest->unit->unit.'-'.Carbon::now()->format('M d, Y').'-guest-info.pdf');
    }

    public function export_bill(Request $request, Property $property, Guest $guest){

        app('App\Http\Controllers\PropertyController')->update_property_note_to_bill($property->uuid, $request->note_to_bill);

        $data = $this->get_bill_data($guest, $request->due_date, $request->penalty, $request->note_to_bill);
    
        $pdf = $this->generate_pdf($property, $data, 'properties.guests.export-bills');

        return $pdf->stream(Carbon::now()->format('M d, Y').'-'.$guest->guest.'-soa.pdf');
    }

    public function get_bill_data($guest, $due_date, $penalty, $note)
    {
        return $data = [
            'guest' => $guest->guest,
            'due_date' => $due_date,
            'penalty' => $penalty,
            'user' => User::find(auth()->user()->id)->name,
            'role' => User::find(auth()->user()->id)->role->role,
            'bills' => $this->get_guest_balance($guest->uuid),
            'note_to_bill' => $note,
        ];
    }
    
}
