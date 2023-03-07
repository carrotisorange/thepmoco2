<?php

namespace App\Http\Controllers;

use App\Models\Particular;
use App\Models\PropertyParticular;
use Illuminate\Http\Request;
use Session;
use DB;

class ParticularController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $particulars = Particular::join('property_particulars', 'particulars.id',
        'property_particulars.particular_id')
        ->where('property_uuid', Session::get('property'))
        ->orderBy('particulars.id', 'desc')
        ->paginate();

        return view('particulars.index', [
            'particulars'=> $particulars
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('particulars.create',[
            'particulars' => Particular::orderBy('id', 'DESC')->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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

        // if($property_particular)
        // {
        //     return back()->with('error', 'Particular already exists.');
        // }

        if($particular){
             try {
                DB::beginTransaction();

                $particular_attributes['property_uuid'] = Session::get('property');
                $particular_attributes['particular_id'] = $particular;

                PropertyParticular::create($particular_attributes);

                DB::commit();

             return back()->with('success', 'Success!');
             } catch (\Throwable $e) {
        
                DB::rollback();
               session()->flash('error');
             }
        }
        else{
             try {
                DB::beginTransaction();

                $particular = Particular::create([
                    'particular' => request('particular_id')
                ]);

                $particular_attributes['property_uuid'] = Session::get('property');
                $particular_attributes['particular_id'] = $particular->id;

                PropertyParticular::create($particular_attributes);

                DB::commit();

                return back()->with('success', 'Success!');
             } catch (\Throwable $e) {
          
                DB::rollback();
               session()->flash('error');
             }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Particular  $particular
     * @return \Illuminate\Http\Response
     */
    public function show(Particular $particular)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Particular  $particular
     * @return \Illuminate\Http\Response
     */
    public function edit(Particular $particular)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Particular  $particular
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Particular $particular)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Particular  $particular
     * @return \Illuminate\Http\Response
     */
    public function destroy(Particular $particular)
    {
        //
    }
}
