<?php

namespace Buchin\LaravelTermapi\Facades;

use Illuminate\Support\Facades\Facade;

class LaravelTermapi extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'laraveltermapi';
    }
}
