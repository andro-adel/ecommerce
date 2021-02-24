<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Session;

class homeController extends Controller
{
    public function index()
    {
        $lang = Lang::locale();

        return view('website.home', [
            "lang" => $lang,
        ]);
    }

    public function switch_language()
    {
        $lang = request('lang');
        if (!in_array($lang, ['ar', 'en'])) {
            return response()->json("pelase enter a valid languages", 400);
        } else {
            App::setLocale($lang);
            Session::put('lang', $lang);
            return redirect()->back();
        }
    }
}
