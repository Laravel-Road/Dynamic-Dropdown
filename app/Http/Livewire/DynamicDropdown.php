<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Http;
use Livewire\Component;

class DynamicDropdown extends Component
{
    public $estado;
    public $municipios = [];

    public function getClientProperty()
    {
        return Http::baseUrl('https://servicodados.ibge.gov.br/api/v1/localidades');
    }

    public function getEstadosProperty()
    {
        return $this->client
            ->get('/estados', ['orderBy' => 'nome'])
            ->object();
    }

    public function updatedEstado()
    {
        $this->municipios = $this->client
            ->get("/estados/{$this->estado}/municipios")
            ->object();
    }

    public function render()
    {
        return view('livewire.dynamic-dropdown');
    }
}
