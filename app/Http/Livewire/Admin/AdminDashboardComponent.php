<?php

namespace App\Http\Livewire\Admin;

use App\Models\City;
use App\Models\Site;
use App\Models\User;
use Livewire\Component;

class AdminDashboardComponent extends Component
{
    public function render()
    {
        $sites= Site::where('delete',0)->get();
        $cities= City::where('delete',0)->get();
        $users= User::all();
        $title = 'dashboard';
        return view('livewire.admin.admin-dashboard-component',compact('sites','cities','users'))->layout('layouts.master',compact('title'));
    }
}
