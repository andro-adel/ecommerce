<?php

namespace App\Http\Controllers\website;

use App\Events\VideoViwer;
use App\Http\Controllers\Controller;
use App\Models\video;
use Illuminate\Http\Request;

class videoController extends Controller
{
    public function index()
    {
        $video = video::first();
        event(new VideoViwer($video));
        return view('website.videocounter') -> with('video' , $video);
    }
}
