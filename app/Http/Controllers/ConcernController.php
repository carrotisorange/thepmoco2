<?php

namespace App\Http\Controllers;

use App\Models\Concern;
use Illuminate\Http\Request;
use Session;
use App\Models\Property;
use App\Models\ConcernCategory;

class ConcernController extends Controller
{
    public function get_property_concerns($property_uuid, $status, $duration)
    {
        return Property::find($property_uuid)->concerns()
        ->when($status, function ($query) use ($status) {
          $query->where('status', $status);
        })
         ->when($duration, function ($query) use ($duration) {
           $query->whereMonth('created_at', $duration);
        })
        ->orderBy('created_at', 'desc');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       // $this->authorize('is_concern_create_allowed');

        return view('tenants.concerns.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Concern  $concern
     * @return \Illuminate\Http\Response
     */
    public function show($property_uuid, Concern $concern)
    {
        //$this->authorize('is_concern_read_allowed');

        //$this->authorize('is_concern_update_allowed');

        app('App\Http\Controllers\ActivityController')->store(Session::get('property'), auth()->user()->id,'opens one',13);
        
        return view('concerns.show',[
            'concern' => $concern
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Concern  $concern
     * @return \Illuminate\Http\Response
     */
    public function edit(Concern $concern)
    {
       // $this->authorize('is_concern_update_allowed');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Concern  $concern
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Concern $concern)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Concern  $concern
     * @return \Illuminate\Http\Response
     */
    public function destroy(Concern $concern)
    {
      // $this->authorize('is_concern_delete_allowed');
    }
}
