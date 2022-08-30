<?php

namespace App\Http\Livewire\Admin;

use App\Models\City;
use Livewire\Component;

class ShowCityComponent extends Component
{

    public $idcity;


    public function mount($idcity)
    {
        $this->idcity = $idcity;
        
    }
    public function render()
    {

        $title = "Show details city";
        $city = City::find($this->idcity);

        return view('livewire.admin.show-city-component',compact('city'))->layout('layouts.master',compact('title'));
    }
}
