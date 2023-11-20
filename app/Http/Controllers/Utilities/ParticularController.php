<?php

namespace App\Http\Controllers\Utilities;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use DB;
use App\Models\{Particular,PropertyParticular};

class ParticularController extends Controller
{

    public function index()
    {
        $particulars = Particular::join('property_particulars', 'particulars.id',
        'property_particulars.particular_id')
        ->where('property_uuid', Session::get('property_uuid'))
        ->orderBy('particulars.id', 'desc')
        ->paginate();

        return view('particulars.index', [
            'particulars'=> $particulars
        ]);
    }

    public function create()
    {
        return view('particulars.create',[
            'particulars' => Particular::orderBy('id', 'DESC')->get(),
        ]);
    }

    public function store(Request $request)
    {
        $particular_attributes = request()->validate([
          'particular_id'=> 'required',
          'minimum_charge' => 'nullable',
        ]);


        $particular = Particular::
        where('particular', strtolower($request->particular_id))
        ->pluck('id')
        ->first();

        $property_particular = PropertyParticular::
          where('particular_id', $particular)
          ->pluck('id')
          ->first();

        if($particular){
             try {
                DB::beginTransaction();

                $particular_attributes['property_uuid'] = Session::get('property_uuid');
                $particular_attributes['particular_id'] = $particular;

                PropertyParticular::create($particular_attributes);

                DB::commit();

            return redirect(url()->previous())->with('success', 'Changes Saved!');
             } catch (\Exception $e) {

                DB::rollback();
              return redirect(url()->previous())->with('error', $e);
             }
        }
        else{
             try {
                DB::beginTransaction();

                $particular = Particular::create([
                    'particular' => request('particular_id')
                ]);

                $particular_attributes['property_uuid'] = Session::get('property_uuid');
                $particular_attributes['particular_id'] = $particular->id;

                PropertyParticular::create($particular_attributes);

                DB::commit();

                return redirect(url()->previous())->with('success', 'Changes Saved!');
             } catch (\Exception $e) {

                DB::rollback();
               return redirect(url()->previous())->with('error', $e);
             }
        }
    }
}
