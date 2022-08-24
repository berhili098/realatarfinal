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
        
        $users = User::all();
        $title = "sites liste"; 

            if(Auth::user()->utype=='ADM')

    {$sites = Site::where(function ($query) {
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
    })->paginate(6);}else{
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
        
    }


        $cities = City::where('delete',0)->get();



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
            'status'=> '1',
        ]);
        $this->emit('itemDeleted');
        session()->flash('type','error');
        session()->flash('message','Well done, You have successfully deleted' . $site->name_fr);
        session()->flash('title','Operation success');

    }
    public function restore($site_id){

        $site = Site::find($site_id);
        $site->update([
            'delete' => 0,
            'deletedBy' => NULL,
            'status'=> '0',
        ]);
        $this->emit('success');
      
    }
}
