<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use App\Models\offer;
use Illuminate\Http\Request;

class offerController extends Controller
{
    public function index()
    {

        return view('website.ajaxoffer.index');
    }

    public function create()
    {

        return view('website.ajaxoffer.create');
    }

    public function store(Request $request)
    {

        offer::create([
            'name_en' => $request->name_en,
            'name_ar' => $request->name_ar,
            'details_en' => $request->details_en,
            'details_ar' => $request->details_ar,
            'price' => $request->price,
        ]);

        return response()->json(['success' => 'Ajax request submitted successfully']);
    }
}
