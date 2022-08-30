<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UsersComponent extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $search;
    public $searchWord;
    public $searchStatus;
    public $searchCity;
    public $searchUser;
    public $typeUser;

    public function mount()
    {
        $this->searchWord = "";
        $this->searchStatus = "";
        $this->searchCity = "";
        $this->searchUser = "";
        $this->typeUser = "";
    }
    public function updating()
    {
        $this->resetPage();
    }

  
  
    public function render()
    {
        $users = User::where("delete", 0)->where(function ($query) {
            $query->where("status", "like", $this->searchStatus != '' ? "{$this->searchStatus}" : "%")
                ->where("createdBy", "like", $this->searchUser != '' ? "{$this->searchUser}" : "%")
                ->where("utype", "like", $this->typeUser != '' ? "{$this->typeUser}" : "%")
                ->where(
                    function ($query2) {
                        $query2->where("name", "like", "%{$this->searchWord}%")
                        ->orWhere("email", "like", "%{$this->searchWord}%");
                    }
                );
        })->orderBy('id', 'DESC')->paginate(6);


        $countsrecord =User::where("delete", 0)->where(function ($query) {
            $query->where("status", "like", $this->searchStatus != '' ? "{$this->searchStatus}" : "%")
                ->where("createdBy", "like", $this->searchUser != '' ? "{$this->searchUser}" : "%")
                ->where("utype", "like", $this->typeUser != '' ? "{$this->typeUser}" : "%")
                ->where(
                    function ($query2) {
                        $query2->where("name", "like", "%{$this->searchWord}%")
                        ->orWhere("email", "like", "%{$this->searchWord}%");
                    }
                );
        })->orderBy('id', 'DESC')->get();
        $wholeusers=User::where("delete", 0)->get();
        $title= 'Users';
        return view('livewire.admin.users-component',compact('users','countsrecord','wholeusers'))->layout('layouts.master',compact('title'));
    }
}
