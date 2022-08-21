<?php

namespace App\Http\Livewire\Admin;

use App\Models\City;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

class EditCityComponent extends Component
{


    use WithFileUploads;

    public $idcity;
    public $user_id;
    public $editedBy;
    public $city_en;
    public $city_ar;
    public $city_fr;

    public $description_en;
    public $description_fr;
    public $description_ar;

    public $latitude;
    public $longitude;
    public $photo;
    public $newphoto;
    public $display;

    public function mount($idcity)
    {
       

        $city = City::find($idcity);
        $this->city_en = $city->city_en;
        $this->city_ar = $city->city_ar;
        $this->city_fr = $city->city_fr;
        $this->description_en = $city->description_en;
        $this->description_fr = $city->description_fr;
        $this->description_ar = $city->description_ar;
        $this->longitude = $city->longitude;
        $this->latitude = $city->latitude;
        $this->photo = $city->photo;
        $this->idcity = $idcity;
        $this->editedBy=Auth::user()->id;
    }

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'city_en' => 'required|unique:cities,city_en,'.$this->idcity,
            'city_ar' => 'required|unique:cities,city_ar,'.$this->idcity,
            'city_fr' => 'required|unique:cities,city_fr,'.$this->idcity,
            'description_en' => 'required|unique:cities,description_en,'.$this->idcity,
            'description_fr' => 'required|unique:cities,description_fr,'.$this->idcity,
            'description_ar' => 'required|unique:cities,description_ar,'.$this->idcity,
            'latitude' => 'required',
            'longitude' => 'required',

            'editedBy'=>'required'
        ]);
    }

    public function updateCity()
    {
        $city = City::find($this->idcity);


        $validateData = $this->validate([
            'city_en' => 'required|unique:cities,city_en,'.$this->idcity,
            'city_ar' => 'required|unique:cities,city_ar,'.$this->idcity,
            'city_fr' => 'required|unique:cities,city_fr,'.$this->idcity,
            'description_en' => 'required|unique:cities,description_en,'.$this->idcity,
            'description_fr' => 'required|unique:cities,description_fr,'.$this->idcity,
            'description_ar' => 'required|unique:cities,description_ar,'.$this->idcity,
            'latitude' => 'required',
            'longitude' => 'required',
            'editedBy'=>'required'
        ]);

        $imageName ="";
        if($this->newphoto)
        {
            $imageName = Carbon::now()->timestamp . Str::random(10) . '.' .  $this->newphoto->extension();
            $this->newphoto->storeAs('primary/assets/images/cities', $imageName);
            $city->update(['photo'=>$imageName]);
        }

        $this->city_en = Str::of($this->city_en)->upper();
        $this->city_fr = Str::of($this->city_fr)->upper();
        $this->description_en = Str::of($this->description_en)->ucfirst();
        $this->description_fr = Str::of($this->description_fr)->ucfirst();
        $city->editedBy=$this->user_id;
        $city->update($validateData);
        

        //setup toastr
        session()->flash('type', 'info');
        session()->flash('message', 'Well done, You have successfully update city :  ' . $this->city_en);
        session()->flash('title', 'Operation success');
        
        //redirect to the cities page
        return redirect()->route('admin-cities');
    }



    public function render()
    {
        $title = "EDIT  $this->city_en ";
        return view('livewire.admin.edit-city-component')->layout('layouts.master', compact('title'));;
    }
}
