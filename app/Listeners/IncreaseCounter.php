<?php

namespace App\Listeners;

use App\Events\VideoViwer;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Auth;

class IncreaseCounter
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(VideoViwer $event)
    {
        $this -> updateviwer($event -> video);
    }

    public function updateviwer($video){

        if(Auth::user())
        {
            $video -> viewers = $video -> viewers + 1;
            
            $video -> save();
        }
    }
}
