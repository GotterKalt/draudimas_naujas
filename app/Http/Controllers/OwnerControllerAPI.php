<?php

namespace App\Http\Controllers;

use App\Models\Owner;
use Illuminate\Http\Request;

class OwnerControllerAPI extends Controller
{
    public function store(Request $request)
    {
        $owner=new Owner();
        $owner->name=$request->name;
        $owner->surname=$request->surname;
        $owner->phone=$request->phone;
        $owner->email=$request->email;
        $owner->address=$request->address;
        $owner->user_id = $request->user_id;
        $owner->save();
        return response()->json("Savininkas pridetas :)");
    }
    public function update(Request $request)
    {
        $owner=Owner::findorfail($request->id);
        $owner->name=$request->name;
        $owner->surname=$request->surname;
        $owner->phone=$request->phone;
        $owner->email=$request->email;
        $owner->address=$request->address;
        $owner->update();
        return response()->json("Savininkas pokoreguotas :)");
    }
    public function destroy(Request $request)
    {
        $owner=Owner::findorfail($request->id)->delete();
        return response()->json("Savininkas istrintas :)");
    }
    public function owners(Request $request)
    {
        if ($owner = Owner::find($request->id)) return response()->json($owner);
        else
        {
            $owners=Owner::all();
            return response()->json($owners);
        }
    }
}
