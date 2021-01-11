<?php

namespace App\Transfers;

use Illuminate\Support\Collection;

class City
{
    public $id;
    public $name;

    public function __construct($state)
    {
        $this->id = $state->id;
        $this->name = $state->nome;
    }

    /**
     * @param $resource
     * @return Collection
     */
    public static function collection($resource)
    {
        return (new Collection($resource))->map(function ($item){
            return new City($item);
        });
    }
}
