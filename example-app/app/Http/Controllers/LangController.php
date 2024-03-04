<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stichoza\GoogleTranslate\GoogleTranslate;
use Illuminate\Support\Facades\App;

class LangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    
    public function index()
    {
        return view('Client.index');
    }
    public function change(Request $request)
    {
        App::setLocale($request->lang);
        session()->put('locale', $request->lang);
        return redirect()->back();
    }

}
