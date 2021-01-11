<?php

namespace App\Transfers;

use Illuminate\Support\Collection;

class State
{
    public $id;
    public $name;
    public $initials;

    public function __construct($state)
    {
        $this->id = $state->id;
        $this->name = $state->nome;
        $this->initials = $state->sigla;
    }

    /**
     * @param $resource
     * @return Collection
     */
    public static function collection($resource)
    {
        return (new Collection($resource))->map(function ($item){
            return new State($item);
        });
    }
}
