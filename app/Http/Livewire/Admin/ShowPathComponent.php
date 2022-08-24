<?php

namespace App\Http\Livewire\Admin;

use App\Models\Path;
use Livewire\Component;

class ShowPathComponent extends Component
{

    public $path_id;
    public function mount($path_id){
        $this->path_id=$path_id;


        
    }

    public function render()
    {
        $title = 'Show Path';
        $path = Path::find($this->path_id);


        return view('livewire.admin.show-path-component',compact('path'))->layout('layouts.master',compact('title'));
    }
}
