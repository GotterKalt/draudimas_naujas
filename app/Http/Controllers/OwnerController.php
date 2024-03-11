<?php

namespace App\Http\Controllers;

use App\Models\Owner;
use Illuminate\Http\Request;

class OwnerController extends Controller
{
    public function index()
    {
        $owners = Owner::all();

        return view('owners.index', compact('owners'));
    }

    public function create()
    {
        return view('owners.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'surname' => 'required|max:255',
            'phone' => 'required|numeric',
            'email' => 'required|email|unique:owners',
            'address' => 'required|max:255',
        ]);

        $owner = Owner::create($validatedData);

        return redirect()->route('owners.index')->with('success', 'Savininkas sekmingai pridėtas.');
    }

    public function edit($id)
    {
        $owner = Owner::findOrFail($id);

        return view('owners.edit', compact('owner'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'surname' => 'required|max:255',
            'phone' => 'required|numeric',
            'email' => 'required|email|unique:owners,email,' . $id,
            'address' => 'required|max:255',
        ]);

        $owner = Owner::findOrFail($id);
        $owner->update($validatedData);

        return redirect()->route('owners.index')->with('success', 'Savininko duomenys atnaujinti.');
    }

    public function destroy($id)
    {
        $owner = Owner::findOrFail($id);
        $owner->delete();

        return redirect()->route('owners.index')->with('success', 'Savininkas sekmingai pašalintas.');
    }
}
