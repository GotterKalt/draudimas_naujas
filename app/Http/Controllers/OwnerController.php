<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Car;
use App\Models\Owner;
use Illuminate\Http\Request;
use App\Http\Requests\OwnerRequest;
use Illuminate\Support\Facades\App;

class OwnerController extends Controller
{
    public function __construct(){
        $this->authorizeResource(Owner::class, 'owner');
    }
    public function index(Request $request)
    {
        //App::setLocale('lt');
        return view('owners.index',[
            'owners'=>Owner::with('cars')-> get()
        ]);
    }



    public function create()
    {
        return view('owners.create');
    }

    public function store(OwnerRequest $request)
    {


        $owner=Owner::create($request->all());
        $owner->user_id = $request->user()->id;
        $owner->save();
        return redirect()->route('owners.index');
    }
    public function edit(Owner $owner,Request $request, User $user)
    {
        /*if(!$request->user()->can('edit_owner',$owner)){
            return redirect()->route('owners.index');
        }*/
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

    public function destroy($id, Request $request)
    {
        /*if(!$request->user()->can('delete_owner')){
            return redirect()->route('owners.index');
        }*/
        $owner = Owner::findOrFail($id);
        $owner->delete();

        return redirect()->route('owners.index')->with('success', 'Savininkas sekmingai pašalintas.');
    }
}
