<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class DynamicDropdown extends Component
{
    public $estado;
    public $municipios;

    public function getClientProperty()
    {
        return Http::baseUrl('https://servicodados.ibge.gov.br/api/v1/localidades');
    }

    public function getEstadosProperty()
    {
        if (! Cache::has( 'estados')) {
            Cache::put('estados', $this->getEstados(), 3600);
        }

        return Cache::get('estados');
    }

    public function updatedEstado()
    {
        if (! Cache::has( $this->estado . '_municipios')) {
            Cache::put($this->estado . '_municipios', $this->getMunicipios(), 3600);
        }

        $this->municipios = Cache::get($this->estado . '_municipios');
    }

    public function render()
    {
        return view('livewire.dynamic-dropdown');
    }

    private function getEstados()
    {
        return $this->client
            ->get('/estados', ['orderBy' => 'nome'])
            ->object();
    }

    private function getMunicipios()
    {
        return $this->client
            ->get("/estados/{$this->estado}/municipios")
            ->object();
    }
}
