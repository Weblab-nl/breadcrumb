<?php

namespace Weblab\Breadcrumb;

use Illuminate\Support\Facades\Facade;

class BreadcrumbFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string            The registered name of the component
     */
    protected static function getFacadeAccessor(): string
    {
        return 'breadcrumbFacade';
    }
}