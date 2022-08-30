<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class TopHeaderComponent extends Component
{

    protected $listeners = ['refreshComponent' => '$refresh'];
    
    public function render()
    {
        return view('livewire.admin.top-header-component');
    }
}
