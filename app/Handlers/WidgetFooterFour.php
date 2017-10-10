<?php

namespace App\Handlers;

use App\Events\MyWidgets;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Blade;

class WidgetFooterFour
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
     * @param  myWidgets  $event
     * @return void
     */
    public function handle(MyWidgets $event)
    {
        $footer_four = DB::table('widget')->where('position', 'footer_four')->first()->content;
        return $footer_four;
    }
}
