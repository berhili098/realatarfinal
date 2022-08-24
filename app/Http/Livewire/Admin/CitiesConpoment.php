<?php

namespace App\Http\Livewire\Admin;

use App\Models\City;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class CitiesConpoment extends Component
{

    use WithPagination;
    
    public $search;
    public $satuts;
    public $cid;
    public $city_en;

    public function mount()
    {
        $this->search = '';
    }
    public function updating()
    {
        $this->resetPage();
    }

    public function confirmDelete($cid)
    {
        $this->cid = $cid;
        $city = City::find($cid);
        $this->city_en = $city->city_en;
    }

    public function deleteCity()
    {
        $city = City::find($this->cid);
        $city->update([
            'delete' => 1,
            'deletedBy' => Auth::user()->id,
            'status'=> '1',
        ]);
        foreach($city->sites as $site){
            $site->update([
                'delete' => 1,
                'deletedBy' => Auth::user()->id,
            ]);  
        }
      
        $this->emit('cityDeleted');
        session()->flash('type','error');
        session()->flash('message','Well done, You have successfully deleted' . $this->city_en);
        session()->flash('title','Operation success');
    }

    public function changeStatus($cid)
    {
        $city = City::find($cid);
       $city->update([
            'status' => $city->status == 0 ? 1 : 0, 
        ]); 
    }

    

    public function render()
    {
        $title = "Cities";

        $cities = City::where('delete',0)->where(function($query){
            $query->where('city_ar','like',"%{$this->search}%")
            ->orwhere('city_fr','like',"%{$this->search}%")
            ->orwhere('city_en','like',"%{$this->search}%")
            ->orwhere('description_ar','like',"%{$this->search}%")
            ->orwhere('description_fr','like',"%{$this->search}%")
            ->orwhere('description_en','like',"%{$this->search}%");
        })->paginate(6);
        
        $countsrecord = City::where('delete',0)->where(function($query){
            $query->where('city_ar','like',"%{$this->search}%")
            ->orwhere('city_fr','like',"%{$this->search}%")
            ->orwhere('city_en','like',"%{$this->search}%")
            ->orwhere('description_ar','like',"%{$this->search}%")
            ->orwhere('description_fr','like',"%{$this->search}%")
            ->orwhere('description_en','like',"%{$this->search}%");
        })->get();

        return view('livewire.admin.cities-conpoment',compact('cities','countsrecord'))->layout('layouts.master',compact('title'));
    }
}
