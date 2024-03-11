<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Lecturer;
use App\Models\Owner;
use Illuminate\Http\Request;

class OwnerController extends Controller
{
    public function index()
    {
        return view('owners.index',[
            'owners'=>Owner::with('cars')-> get()
        ]);
    }

    public function create()
    {
        return view('owners.create');
    }

    public function store(Request $request)
    {
        $owner=Owner::create($request->all());
        $owner->save();
        return redirect()->route('owners.index');
    }
    public function edit(Owner $owner)
    {
        return view('owners.edit', [
            'owner'=>$owner
        ]);
    }

    public function update(Request $request, Owner $owner)
    {
        $owner->update($request->all());
        $owner->save();
        return redirect()->route('owners.index');
    }

    public function destroy($id)
    {
        $owner = Owner::findOrFail($id);
        $owner->delete();

        return redirect()->route('owners.index')->with('success', 'Savininkas sekmingai pašalintas.');
    }
}
