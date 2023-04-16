<?php

namespace App\Http\Controllers;

use App\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function create(Request $request)
    {
        $locations = Location::where('parent_id', 0)->get();
        $items = Location::get();
        //dd($alllocation);
        return view('admin.location.create', compact('locations','items'));

    }

    public function getLocation()
    {
        return Location::all();
    }

    public function store(Request $request)
    {
        $data = $request->all();
        Location::create($data);
        return back()->with('success','مکان  با موفقیت ایجاد شد');
    }
}
