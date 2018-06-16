<?php

namespace Railken\LaraOre\RecurringService;

use Illuminate\Support\ServiceProvider;

class RecurringServiceServiceProvider extends ServiceProvider
{
    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register()
    {
        RecurringService::observe(RecurringServiceObserver::class);
    }
}
