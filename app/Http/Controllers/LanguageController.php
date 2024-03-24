<?php

namespace App\Http\Controllers;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class LanguageController extends Controller
{
    public function setLanguage($language, Request $request){
        $request->session()->put('lang', $language);
        return redirect()->back();
    }
}
