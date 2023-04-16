<?php

namespace App\Http\Controllers;

use App\Location;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function show(Request $request)
    {
        $users = User::get();
        return view('admin.users.index',compact('users'));
    }

    public function create(Request $request)
    {
        $locations = Location::get();
        return view('admin.users.create',compact('locations'));
    }

    public function store(Request $request)
    {
        $this->validateForm($request);
        User::create([
            'name' => $request->name,
            'family' => $request->family,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'password' => Hash::make($request->password),
            'wallet' => $request->wallet    ,
            'isadmin' => $request->isadmin,
            'type' => $request->type,
            'location_id' => $request->location_id,
        ]);
        return back()->with('success', ' کاربر با موفقیت ذخیره گردید!!');
    }

    public function edit(User $user)
    {
        $locations = Location::get();
        return view('admin.users.edit' ,compact('user','locations'));
    }

    public function update(Request $request , User $user)
    {

       $user->update($request->all());
       return redirect()->route('admin.users.show');
    }

    public function wallet(Request $request)
    {
        if ($request->all()==null)
        {
            $users = User::all();
            return view('admin.users.charge-wallet',compact('users'));
        }
        else
        {
            //dd($request->all());
            $users = User::where('type','=', $request->type)->get();
            return view('admin.users.charge-wallet',compact('users'));
        }

    }

    public function charger(Request $request)
    {
        //dd($request->all());
        User::where('type', '=', $request->type)->update($request->only('wallet'));
        return back()->with('success',true);
    }

    protected function validateForm(Request $request)
    {
        $request->validate(
            [
                'email' => ['required', 'email'],
                'password' =>  ['required'],
                'name' =>  ['required'],
                'family' =>  ['required'],
                'phone_number' =>  ['required', 'numeric'],
                'wallet' =>  ['required', 'numeric'],
                'isadmin' =>  ['required'],
                'type' =>  ['required'],
            ]
        );
    }

    public function showDashboard()
    {
        return view('admin.dashboard');
    }

}
