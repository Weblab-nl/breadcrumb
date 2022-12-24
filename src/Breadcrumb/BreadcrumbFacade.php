<?php

namespace Weblab\Breadcrumb;

class BreadcrumbFacade
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