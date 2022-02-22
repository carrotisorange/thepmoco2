<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\RoomBuilding;
use App\Models\Category;
use App\Models\Property;
use App\Models\Floor;
use App\Models\Status;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Str;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rooms = Room::where('status_id', 1)->paginate(10);

        return view('admin.rooms.index',
            [
                'rooms' => $rooms
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
        
        return redirect('room/'.$batch_no.'/edit');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function show(Room $room)
    {
        return view('admin.rooms.show', [
            'room' => $room
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

        $buildings = RoomBuilding::join('buildings', 'room_buildings.building_id', 'buildings.id')
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
        return $batch_no;
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

        return back();
    }
}
