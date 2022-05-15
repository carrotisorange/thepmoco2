<?php

namespace App\Http\Controllers;

use App\Models\Collection;
use App\Models\Property;
use Illuminate\Http\Request;
use Session;

class CollectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $collections = Property::find(Session::get('property'))->collections;

          //$collections = Property::find(Session::get('property'))->collections()->get()->groupBy('batch_no');
        // $collections = Collection::join('tenants', 'collections.tenant_uuid', 'tenants.uuid')
        //  ->join('owners', 'collections.owner_uuid', 'owners.uuid')
        //  ->join('users', 'collections.user_id', 'users.id')
        //  ->join('units', 'collections.unit_uuid', 'units.uuid')
        //  ->orderBy('collections.created_at', 'asc')
        //  ->paginate(10);

        return view('collections.index',[
            'collections'=> $collections,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($bills)
    {
        return $bills;
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
     * @param  \App\Models\Collection  $collection
     * @return \Illuminate\Http\Response
     */
    public function show(Collection $collection)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Collection  $collection
     * @return \Illuminate\Http\Response
     */
    public function edit(Collection $collection)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Collection  $collection
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Collection $collection)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Collection  $collection
     * @return \Illuminate\Http\Response
     */
    public function destroy(Collection $collection)
    {
        //
    }
}
