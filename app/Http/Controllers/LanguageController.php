<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
class LanguageController extends Controller
{
    public function change($language){
        app()->setLocale($language);
        session()->put('locale' , $language);
        return redirect()->back();
    }
}
