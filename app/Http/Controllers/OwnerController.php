<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Owner;
use Illuminate\Http\Request;
use App\Http\Requests\OwnerRequest;
use Illuminate\Support\Facades\App;

class OwnerController extends Controller
{
    public function index(Request $request)
    {
        //App::setLocale('lt');
        return view('owners.index',[
            'owners'=>Owner::with('cars')-> get()
        ]);
    }

    /*private $validationRules=[
        'name'=>'required|min:3|max:15',
        'surname'=>'required|min:3|max:15',
        'phone'=>'required',
    ];*/
    //private $validationMessages;

    /*public function __construct()
    {
        $this->validationMessages=[
            'name.required'=>__('Vardas yra privalomas'),
            'name.min'=>__('Vardas turi buti ilgesnis nei 2 simboliai'),
            'name.max'=>__('Vardas turi buti trumpesnin nei 16 simboliu'),
            'name'=>__('Vardas yra neteisingas'),
            'surname'=>__('Pavardė yra privalomas ir turi buti nuo 3 iki 15 simboliu'),
            'phone'=>__('Telefono numeris yra privalomas')
        ];
    }*/

    public function create()
    {
        return view('owners.create');
    }

    public function store(OwnerRequest $request)
    {
        /*$request->validate([
            'name'=>'required|min:3|max:15',
            'surname'=>'required|min:3|max:15',
            'phone'=>'required',
        ],[
            'name.required'=>__('Vardas yra privalomas'),
            'name.min'=>__('Vardas turi buti ilgesnis nei 2 simboliai'),
            'name.max'=>__('Vardas turi buti trumpesnin nei 16 simboliu'),
            'name'=>__('Vardas yra neteisingas'),
            'surname'=>__('Pavardė yra privalomas ir turi buti nuo 3 iki 15 simboliu'),
            'phone'=>__('Telefono numeris yra privalomas')
        ]);*/
        //$request->validate($this->validationRules, $this->validationMessages);
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

    public function update(OwnerRequest $request, Owner $owner)
    {
        //$request->validate($this->validationRules, $this->validationMessages);
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
