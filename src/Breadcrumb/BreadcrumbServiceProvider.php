<?php

namespace Weblab\Breadcrumb;

use Illuminate\Support\ServiceProvider;
use Weblab\Breadcrumb;

class BreadcrumbServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(Breadcrumb::class, function () {
            return new Breadcrumb();
        });

        $this->app->singleton('breadcrumbFacade', function ($app) {
            return $app->make(Breadcrumb::class);
        });
    }
}