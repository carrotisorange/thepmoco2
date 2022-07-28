<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserProperty;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;
use App\Models\Property;
use DB;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('accountowner');

        app('App\Http\Controllers\ActivityController')->store(Session::get('property'), auth()->user()->id, 'opens', 8);
        
        $teams = UserProperty::join('properties', 'user_properties.property_uuid', 'properties.uuid')
        ->select('*', 'users.status as user_status')
        ->join('users', 'user_properties.user_id', 'users.id')
        ->join('types', 'properties.type_id', 'types.id')
        ->join('roles', 'users.role_id', 'roles.id')
        ->where('properties.uuid', Session::get('property'))
        ->where('users.id','!=',auth()->user()->id)
        ->where('users.status', 'active')
        ->orderBy('users.created_at', 'desc')
        ->paginate(10);

        return view('teams.index',[
        'teams' => $teams
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $members = UserProperty::join('properties', 'user_properties.property_uuid', 'properties.uuid')
        //  ->select('*', 'users.status as user_status', 'users.id as user_id')
        //  ->join('users', 'user_properties.user_id', 'users.id')
        //  ->join('types', 'properties.type_id', 'types.id')
        //  ->join('roles', 'users.role_id', 'roles.id')
        //  ->where('properties.uuid', Session::get('property'))
        //  ->where('users.status', 'pending')
        //  ->orderBy('users.created_at', 'desc')
        //  ->paginate(10);

        return view('teams.create',[
        
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
         $attributes = request()->validate([
         'name' => ['required', 'string', 'max:255'],
         'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
         'username' => ['required', 'string', 'max:255', 'unique:users'],
         'mobile_number' => ['required', 'unique:users'],
         'role_id' => ['required', Rule::exists('roles', 'id')],
         'avatar' => 'image',
         ]);

        $attributes['password'] = Hash::make(Str::random());
        $attributes['account_owner_id'] = auth()->user()->id;

        if(isset($attributes['avatar']))
        {
          $attributes['avatar'] = $request->file('avatar')->store('avatars');
        }

        $user_id = User::create($attributes)->id;

        UserProperty::create([
            'property_uuid' => Session::get('property'),
            'user_id' => $user_id,
            'is_account_owner' => false
        ]);

        return redirect('/property/'.Session::get('property').'/team')->with('success', 'A new member has been created
        successfully.');
    }

    public function save($random_str)
    {
         UserProperty::join('properties', 'user_properties.property_uuid', 'properties.uuid')
        ->join('users', 'user_properties.user_id', 'users.id')
        ->where('properties.uuid', Session::get('property'))
        ->where('users.status', 'pending')
        ->update([
            'users.status' => 'active'
        ]);

        return redirect('/property/'.Session::get('property').'/team')->with('success', 'Team has been created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return $user;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Property $property, User $user)
    {
        return view('teams.edit',[
            'member' => $user,
           'roles' => Role::orderBy('role')->where('id','!=','5')->get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Property $property, User $user)
    {
        $attributes = request()->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users', 'email')->ignore($user->id)],
            'username' => ['required', 'string', 'max:255', Rule::unique('users', 'username')->ignore($user->id)],
            'mobile_number' => ['required', Rule::unique('users', 'mobile_number')->ignore($user->id)],
            'role_id' => ['required', Rule::exists('roles', 'id')],
            'status' => 'required',
            'avatar' => 'image',
        ]);

        User::where('id', $user->id)
        ->update([
            'email_verified_at' => null
        ]);

        if(isset($attributes['avatar']))
        {
            $attributes['avatar'] = request()->file('avatar')->store('avatars');
        }

        $user->update($attributes);

        return redirect('/property/'.Session::get('property').'/team/'.$user->username.'/edit')->with('success', 'Team is successfully updated.');

        //return back()->with('success', 'Member has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $member = User::where('id', $id);
         if($member->delete()){
         return back()->with('success', 'A member has been removed.');
         }
         return back()->with('error', 'Cannot complete your action.');
    }
}
