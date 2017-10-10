<?php

namespace App\Handlers;

use App\Events\MyWidgets;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Html\HtmlFacade;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Blade;


class WidgetFooterOne
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
        $footer_one = DB::table('widget')->where('position', 'footer_one')->first()->content;
        return $footer_one;
    }
}
