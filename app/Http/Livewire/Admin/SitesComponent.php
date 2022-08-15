<?php

namespace App\Http\Livewire\Admin;

use App\Models\City;
use App\Models\Site;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;


class SitesComponent extends Component
{

    use WithPagination;
    protected $paginationTheme = 'bootstrap';


    public $searchWord;
    public $searchStatus;
    public $searchCity;
    public $searchUser;
    public $idSite;

    public function mount()
    {
        $this->searchWord = "";
        $this->searchStatus = "";
        $this->searchCity = "";
        $this->searchUser = "";
    }
    public function updating()
    {
        $this->resetPage();
    }


    public function render()
    {
        $title = "sites liste";



        $sites = Site::where("delete", 0)->where(function ($query) {
            $query->where("status", "like", $this->searchStatus != '' ? "{$this->searchStatus}" : "%")
                ->where("user_id", "like", $this->searchUser != '' ? "{$this->searchUser}" : "%")
                ->where("city_id", "like", $this->searchCity != '' ? "{$this->searchCity}" : "%")
                ->where(
                    function ($query2) {
                        $query2->where("name_fr", "like", "%{$this->searchWord}%")->orWhere("name_en", "like", "%{$this->searchWord}%")
                            ->orWhere("name_ar", "like", "%{$this->searchWord}%")
                            ->orWhere("longitude", "like", "%{$this->searchWord}%")
                            ->orWhere("latitude", "like", "%{$this->searchWord}%");
                    }
                );
        })->paginate(6);


        $cities = City::all();
        $users = User::all();



        return view("livewire.admin.sites-component", compact("sites", "cities", "users"))->layout("layouts.master", compact("title"));
    }

    public function confirmDeleteSite($id)
    {
        $this->idSite = $id;
    }
    public function deleteSite(){
        $site = Site::find($this->idSite);
        $site->update([
            'delete' => 1,
            'deletedBy' => Auth::user()->id,
        ]);
        $this->emit('confirmationDelete');
        session()->flash('type','error');
        session()->flash('message','Well done, You have successfully deleted' . $site->name_fr);
        session()->flash('title','Operation success');

    }
}
