<?php

namespace App\Facades;

use App\Services\LocationsService;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Facade;

/**
 * @method static Collection getStates()
 * @method static Collection getCities(string $state)
 *
 * @see \App\Services\SolicitationsService
 */
class Locations extends Facade
{
    protected static function getFacadeAccessor()
    {
        return LocationsService::class;
    }
}
