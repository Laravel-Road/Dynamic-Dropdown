<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Http;
use Livewire\Component;

class DynamicDropdown extends Component
{
    public $estado;
    public $estados;
    public $municipios = [];

    public function updatedEstado()
    {
        $this->municipios = json_decode(
            Http::get(
                "https://servicodados.ibge.gov.br/api/v1/localidades/estados/{$this->estado}/municipios"
            )->body()
        );
    }

    public function render()
    {
        $this->estados = Http::get(
            'https://servicodados.ibge.gov.br/api/v1/localidades/estados',
            ['orderBy' => 'nome']
        )->json();

        return view('livewire.dynamic-dropdown');
    }
}
