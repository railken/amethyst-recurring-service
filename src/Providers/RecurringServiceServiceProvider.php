<?php

namespace Railken\Amethyst\Providers;

use Railken\Amethyst\Common\CommonServiceProvider;

class RecurringServiceServiceProvider extends CommonServiceProvider
{
    /**
     * Register any application services.
     */
    public function register()
    {
        parent::register();

        $this->app->register(\Railken\Amethyst\Providers\TaxServiceProvider::class);
        $this->app->register(\Railken\Amethyst\Providers\CatalogueServiceProvider::class);
    }
}
