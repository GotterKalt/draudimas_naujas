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
        //dd('Reached CarController@index');
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

    //public function document($owner_id){
    //    $owner=$owner::find($owner_id);
    //    return response()->download(storage_path(). "/app/images".$car->photo);
    //}

    public function save(CarRequest $request, Car $car)
    {
        $car->reg_number = $request->reg_number;
        $car->brand = $request->brand;
        $car->model = $request->model;
        $car->owner_id = $request->owner_id;

        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $newImageName = time() . '-' . $request->reg_number . '.' . $photo->getClientOriginalExtension();
            $photo->move(public_path('images'), $newImageName);
            $car->image_path = $newImageName;
        }
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
        $car->reg_number = $request->reg_number;
        $car->brand = $request->brand;
        $car->model = $request->model;
        $car->owner_id = $request->owner_id;

        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $newImageName = time() . '-' . $request->reg_number . '.' . $photo->getClientOriginalExtension();
            $photo->move(public_path('images'), $newImageName);
            $car->image_path = $newImageName;
        }
        $car->save();
        return redirect()->route('cars.index');
    }
    public function destroy(Car $car)
    {
        $car->delete();
        return redirect()->route('cars.index');
    }

    public function photoDelete($id)
    {
        $car = Car::findOrFail($id);

        if ($car->image_path) {
            unlink(public_path('images/' . $car->image_path));
            $car->image_path = null;
            $car->save();
        }

        return redirect()->route('cars.edit', $car->id);
    }
    public function specific($id, Car $car){
        $car=Car::find($id);
        return view('cars.specific', [
            "car"=>$car
        ]);
    }
}
