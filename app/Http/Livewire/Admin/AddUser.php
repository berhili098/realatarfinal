<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithFileUploads;

class AddUser extends Component
{
    use WithFileUploads;
    public $photo;
    public $name;
    public $email;
    public $twitter;
    public $facebook;
    public $youtube;
    public $birthdate;



    public function render()
    {
        $title = "Add User";
        return view('livewire.admin.add-user')->layout('layouts.master', compact('title'));
    }


}
