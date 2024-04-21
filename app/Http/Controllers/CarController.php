<?php

namespace App\Http\Controllers;

use App\Http\Requests\OwnerRequest;
use App\Models\Car;
use App\Http\Requests\CarRequest;
use App\Models\Owner;
use Illuminate\Http\Request;

class CarController extends Controller
{

    //public function __construct()
    //{
    //    $this->middleware('auth');
    //}
    public function index()
    {
        return view('cars.index',[
            'cars'=>Car::with('owner')->get()
        ]);
    }
    public function create()
    {

        return view('cars.create', [
            'owners'=>Owner::all()
        ]);

    }
    public function store(CarRequest $request)
    {

        $newImageName = time() . '-' . $request->reg_number . '.' . $request->photo->extension();
        $request->photo->extension();
        $request->photo->move(public_path('images'), $newImageName);


        $car=Car::create([
            'image_path' => $newImageName,
            'reg_number' => $request->input('reg_number'),
            'brand' => $request->input('brand'),
            'model' => $request->input('model'),
            'owner_id' => $request->input('owner_id')
        ]);
        $car->save();
        return redirect()->route('cars.index');

    }
    public function edit($id)
    {
        $car = Car::findOrFail($id);
        $owners = Owner::all();

        return view('cars.edit', compact('car', 'owners'));
    }
    public function update(CarRequest $request, Car $car)
    {
        $car->update($request->all());
        $car->save();
        return redirect()->route('cars.index');
    }
    public function destroy(Car $car)
    {
        $car->delete();
        return redirect()->route('cars.index');
    }
}
