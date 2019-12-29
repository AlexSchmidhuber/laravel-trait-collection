<?php

namespace AlexSchmidhuber\LaravelTraitCollection\Facades;

use Illuminate\Support\Facades\Facade;

class LaravelTraitCollection extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'laraveltraitcollection';
    }
}
