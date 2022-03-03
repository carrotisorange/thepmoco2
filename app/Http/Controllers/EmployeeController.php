<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserProperty;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rules;
use Illuminate\Validation\Rule;


class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = UserProperty::join('properties', 'user_properties.property_uuid', 'properties.uuid')
        ->select('*', 'users.status as user_status')
        ->join('users', 'user_properties.user_id', 'users.id')
        ->join('types', 'properties.type_id', 'types.id')
        ->join('roles', 'users.role_id', 'roles.id')
        ->where('properties.uuid', Session::get('property'))
        ->orderBy('users.created_at', 'desc')
        ->paginate(10);

        return view('employees.index',[
        'employees' => $employees
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employees.create',[
            'random_str' => Str::random(10),
            'roles' => Role::all(),
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
         'avatar' => 'required|image',
         ]);

        $attributes['password'] = Hash::make(Str::random());
        $attributes['avatar'] = $request->file('avatar')->store('avatars');

        $user_id = User::create($attributes)->id;

        UserProperty::create([
            'property_uuid' => Session::get('property'),
            'user_id' => $user_id,
            'isManager' => false
        ]);

        return redirect('/property/'.Session::get('property').'/employees')->with('success', 'A new has been created successfully.');
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
