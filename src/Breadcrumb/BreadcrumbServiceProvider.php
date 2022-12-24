<?php

namespace Weblab\Breadcrumb;

use Weblab\Breadcrumb;

class BreadcrumbServiceProvider
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