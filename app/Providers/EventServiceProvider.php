<?php

namespace App\Providers;

use Illuminate\Contracts\Events\Dispatcher as DispatcherContract;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;


class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        \App\Events\MyWidgets::class =>[
            \App\Handlers\WidgetFooterOne::class,
            \App\Handlers\WidgetFooterTwo::class,
            \App\Handlers\WidgetFooterThree::class,
            \App\Handlers\WidgetFooterFour::class,
        ],

        \App\Events\UseFullLinks::class =>[
            \App\Handlers\WidgetFooterThree::class,
        ],
    ];

    /**
     * Register any other events for your application.
     *
     * @param  \Illuminate\Contracts\Events\Dispatcher  $events
     * @return void
     */
    public function boot(DispatcherContract $events)
    {
        parent::boot($events);

        //
    }
}
