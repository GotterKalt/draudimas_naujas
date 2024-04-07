<?php

namespace App\Http\Controllers;


use App\Models\ShortCode;
use Illuminate\Http\Request;

class ShortCodeController extends Controller
{

    public function index(Request $request)
    {

        $shortcodes = ShortCode::all();
        return view('shortcode.index', compact('shortcodes'));
    }

    public function create()
    {
        return view('shortcode.create');
    }

    public function store(Request $request)
    {
        $shortcode=ShortCode::create($request->all());
        $shortcode->save();
        return redirect()->route('shortcode.index');
    }
    public function destroy($id)
    {
        $shortcode = ShortCode::findOrFail($id);
        $shortcode->delete();

        return redirect()->route('shortcode.index')->with('success');
    }
}
