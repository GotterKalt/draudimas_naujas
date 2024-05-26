<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Owner;
use Illuminate\Http\Request;

class CarControllerAPI extends Controller
{
    public function store(Request $request)
    {
        $car=new Car();
        $car->reg_number=$request->reg_number;
        $car->brand=$request->brand;
        $car->model=$request->model;
        $car->owner_id=$request->owner_id;
        $car->save();
        return response()->json("Automobilis pridetas :)");
    }
    public function update(Request $request)
    {
        $car=Car::findorfail($request->id);
        $car->reg_number=$request->reg_number;
        $car->brand=$request->brand;
        $car->model=$request->model;
        $car->owner_id=$request->owner_id;
        $car->save();
        return response()->json("Automobilis pokoreguotas :)");
    }
    public function destroy(Request $request)
    {
        $car=Car::findorfail($request->id)->delete();
        return response()->json("Automobilis istrintas :)");
    }
    public function cars(Request $request)
    {
        if ($car = Car::find($request->id)) return response()->json($car);
        else
        {
            $cars=Car::all();
            return response()->json($cars);
        }
    }
}
