<?php
// 
namespace App\Http\Controllers;
// 
use Illuminate\Http\Request;

class languageController extends Controller
{
    public function switchLanguage(Request $request,$locale)
    {
        \Session::put('locale', $locale);
        \Session::save();
         \App::setLocale(\Session::get('locale'));
         // return view('auth.login');
        return redirect()->back();
    }
}
