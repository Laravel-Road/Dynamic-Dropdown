<?php

namespace App\Http\Livewire;

use App\Facades\Locations;
use Livewire\Component;

class DynamicDropdown extends Component
{
    public $state;
    public $cities;

    public function getStatesProperty()
    {
        return Locations::getStates();
    }

    public function updatedState()
    {
        $this->cities = Locations::getCities($this->state);
    }

    public function render()
    {
        return view('livewire.dynamic-dropdown');
    }
}
