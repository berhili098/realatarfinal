<?php

namespace App\Http\Livewire\Admin;

use App\Models\City;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
    use Livewire\WithFileUploads;
    use Illuminate\Support\Str;

class AddCityComponent extends Component
{

    use WithFileUploads;
    public $user_id;
    public $city_en;
    public $city_ar;
    public $city_fr;

    public $description_en;
    public $description_fr;
    public $description_ar;

    public $latitude;
    public $longitude;

    public $photo;
    public $display;


    public function mount()
    {
        $this->display = 'hide';
        $this->user_id = Auth::user()->id;
        // $this->photo = 'No_Image_Available.jpg';
    }

    public function updatedPhoto()
    {
        if($this->photo)
        {
            $this->display = '';

        }else{
            $this->display = 'hide';
        }
    }

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'city_en' => 'required|min:3|unique:cities',
            'city_ar' => 'required|min:3|unique:cities,city_ar',
            'city_fr' => 'required|min:3|unique:cities,city_fr',
            'description_en' => 'required|min:50|unique:cities,description_en',
            'description_fr' => 'required|min:50|unique:cities,description_fr',
            'description_ar' => 'required|min:50|unique:cities,description_ar',
            'latitude' => 'required|numeric|between:-180,180',
            'longitude' => 'required|numeric|between:-180,180',
            'user_id' => 'required',
        ]);
    }

    public function storeCity()
    {
        if($this->photo){
            $imageName = Carbon::now()->timestamp . Str::random(10) . '.' .  $this->photo->extension();
            $this->photo->storeAs('primary/assets/images/cities/' , $imageName);
        }else{
            $imageName = "No_Image_Available.jpg";
        }
        // dd($imageName);
        $valdiateData = $this->validate([
            'city_en' => 'required|unique:cities',
            'city_ar' => 'required|unique:cities',
            'city_fr' => 'required|unique:cities',
            'description_en' => 'required|unique:cities',
            'description_fr' => 'required|unique:cities',
            'description_ar' => 'required|unique:cities',
            'latitude' => 'required',
            'longitude' => 'required',
            'user_id' => 'required',
        ]);

        $this->city_en = Str::of($this->city_en)->upper();
        $this->city_fr = Str::of($this->city_fr)->upper();
        $this->description_en = Str::of($this->description_en)->ucfirst();
        $this->description_fr = Str::of($this->description_fr)->ucfirst();


        $city = City::create($valdiateData);

        $city->update([
            'photo' => $imageName,
        ]);

        //setup toastr
        session()->flash('type','success');
        session()->flash('message','Well done, You have successfully added new city');
        session()->flash('title','Operation success');

        //redirect to the cities page
        return redirect()->route('admin-cities');
    }



    public function render()
    {
        $title = "ADD NEW CITY";
        return view('livewire.admin.add-city-component')->layout('layouts.master',compact('title'));
    }
}
