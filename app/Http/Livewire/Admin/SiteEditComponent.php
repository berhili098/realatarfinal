<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class SiteEditComponent extends Component
{
    public function render()
    {
        $title='edit site';
        return view('livewire.admin.site-edit-component')->layout("layouts.master", compact("title"));
    }
}
