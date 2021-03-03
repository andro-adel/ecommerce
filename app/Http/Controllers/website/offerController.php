<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use App\Models\images;
use App\Models\offer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class offerController extends Controller
{
    public function index()
    {
        $offer = new offer();
        return view('website.ajaxoffer.index', [
            "offer" => $offer,
        ]);
    }

    public function create()
    {

        return view('website.ajaxoffer.create');
    }

    public function store(Request $request)
    {
        request()->validate([
            'name_en' => 'required|string',
            'name_ar' => 'required|string',
            'details_en' => 'required|string',
            'details_ar' => 'required|string',
            'price' => 'required|numeric',
            'image' => ''
        ]);

        $offer = new offer();
        $offer->name_en = request('name_en');
        $offer->name_ar = request('name_ar');
        $offer->details_en  = request('details_en');
        $offer->details_ar  = request('details_ar');
        $offer->price = request('price');
        $offer->save();

        if (request('image')) {
            $path = Storage::disk('public')->put('offers', request('image'));
            $image =  new images();
            $image->image = $path;
            $image->imageable_type = "App\\Models\\offer";
            $image->imageable_id =  $offer->id;
            $image->save();
        }

        return response()->json(['success' => 'Ajax request submitted successfully']);
    }
}
