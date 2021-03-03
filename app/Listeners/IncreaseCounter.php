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
        if (!session()->has(key: 'videoisvisited')) {

            $this->updateviwer($event->video);
        } else {
            return false;
        }
    }

    public function updateviwer($video)
    {
        $video->viewers = $video->viewers + 1;

        $video->save();

        session()->put('videoisvisited', $video->id);
    }
}
