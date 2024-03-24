<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Course;
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
    public function store(Request $request)
    {
        $car=Car::create($request->all());
        $car->save();
        return redirect()->route('cars.index');
    }
    public function edit($id)
    {
        $car = Car::findOrFail($id);
        $owners = Owner::all(); // Добавьте эту строку

        return view('cars.edit', compact('car', 'owners'));
    }
    public function update(Request $request, Car $car)
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
