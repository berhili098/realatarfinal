<?php

namespace App\Http\Livewire\Admin;

use App\Models\Site;
use Livewire\Component;

class ShowSiteComponent extends Component
{

    public $site_id;

    public function mount($site_id)
    {
        $this->site_id = $site_id;
    }

    public function render()
    {
        $title = "Show Details site";
        $site = Site::find($this->site_id);
        return view('livewire.admin.show-site-component',compact('site'))->layout('layouts.master',compact('title'));
    }
}
