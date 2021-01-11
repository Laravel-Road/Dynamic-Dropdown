<?php

namespace App\Services;

use App\Transfers\City;
use App\Transfers\State;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class LocationsService
{
    private $client;

    public function __construct()
    {
        $this->client = Http::baseUrl('https://servicodados.ibge.gov.br/api/v1/localidades');
    }

    public function getStates()
    {
        if (! Cache::has( 'states')) {
            Cache::put('states', State::collection($this->fetchStates()->object()), 3600);
        }

        return Cache::get('states');
    }

    public function getCities(string $state)
    {
        if (! Cache::has( $state . '_cities')) {
            Cache::put($state . '_cities', City::collection($this->fetchCities($state)->object()), 3600);
        }

        return Cache::get($state . '_cities');
    }

    private function fetchStates()
    {
        return $this->client->get('/estados', ['orderBy' => 'nome']);
    }

    private function fetchCities(string $state)
    {
        return $this->client->get("/estados/{$state}/municipios");
    }
}
