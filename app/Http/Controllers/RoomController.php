<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\PropertyBuilding;
use App\Models\Category;
use App\Models\Property;
use App\Models\Floor;
use App\Models\Status;
use App\Models\Contract;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Str;
use DB;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rooms = Room::leftJoin('statuses', 'rooms.status_id', 'statuses.id')
        ->select('*', 'rooms.*')
        ->leftJoin('categories', 'rooms.category_id', 'categories.id')
        ->leftJoin('buildings', 'rooms.building_id', 'buildings.id')
        ->leftJoin('floors', 'rooms.floor_id', 'floors.id')
        ->where('status_id', '!=', 6)
        ->where('property_uuid', Session::get('property'))
        ->paginate(10);

        return view('admin.rooms.index',
            [
                'rooms' => $rooms,
            ]    
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($batch_no)
    {
        return view('admin.rooms.create',[
            'batch_no' => $batch_no
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $batch_no)
    {

        $request->validate([
            'number_of_rooms' => ['integer', 'required', 'min:1']
        ]);

       for($i=1; $i<=$request->number_of_rooms; $i++){
            Room::create([
                'uuid' => Str::uuid(),
                'room' => 'Room '.$i,
                'property_uuid' => Session::get('property'),
                'user_id' => auth()->user()->id,
                'batch_no' => $batch_no
            ]);
       }

       $rooms = Room::where('batch_no', $batch_no)->count();
        
        return redirect('room/'.$batch_no.'/edit')->with('success', $rooms.' rooms have been created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function show(Room $room)
    {
        $contracts = Room::findOrFail($room->uuid)->contracts;

        return view('admin.rooms.show', [
            'room' => $room,
            'contracts' => $contracts,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function edit($batch_no)
    {
        $rooms = Room::join('categories', 'rooms.category_id','categories.id')
        ->leftJoin('statuses', 'rooms.status_id', 'statuses.id')
        ->leftJoin('buildings', 'rooms.building_id', 'buildings.id')
        ->leftJoin('floors', 'rooms.floor_id', 'floors.id')
        ->where('batch_no', $batch_no)
        ->get();

        $buildings = PropertyBuilding::join('buildings', 'property_buildings.building_id', 'buildings.id')
         ->where('room_buildings.property_uuid', Session::get('property'))
         ->get();

         $floors = Floor::all();

         $categories = Category::all();

         $statuses = Status::all();

        return view('admin.rooms.edit',[
            'rooms' => $rooms,
            'buildings' => $buildings,
            'floors' => $floors,
            'categories' => $categories,
            'statuses' => $statuses,
            'batch_no' => $batch_no
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $batch_no)
    {
        Room::where('batch_no', $batch_no)
        ->update([
            'status_id' => 1
        ]);

        $rooms = Room::where('batch_no', $batch_no)->count();
        
        return redirect('/property/'.Session::get('property').'/rooms')->with('success', $rooms.' rooms have been
        updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function destroy($uuid)
    {
        $room = Room::where('uuid', $uuid);
        $room->delete();

        return back()->with('success', 'A room has been removed.');
    }
}
