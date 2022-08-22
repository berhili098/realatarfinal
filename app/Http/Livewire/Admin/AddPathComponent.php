<?php

namespace App\Http\Livewire\Admin;

use App\Models\Path;
use App\Models\Site;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

class AddPathComponent extends Component
{
    use WithFileUploads;
    public $photo,$videos,$name_ar,$name_fr,$name_en,$user_id,$selectedSites=[],$description_ar,$description_en,$description_fr,$duration,$length,$sites;
    public function render()
    {
        $this->sites = Site::where('delete',0)->get();
        $this->user_id=Auth::user()->id;
        $title='Parcours'; 
        return view('livewire.admin.add-path-component')->layout('layouts.master',compact('title'));
    }


    public function updated($fields){
        $this->validateOnly($fields,[
            'name_ar'=>'required',
            'name_fr'=>'required',
            'name_en'=>'required',
            'description_ar'=>'required',
            'description_fr'=>'required',
            'description_en'=>'required',
            'length'=>'required',
            'duration'=>'required',
        ]);
    }

    public function store(){
dd($this->selectedSites);
        $validatedata= $this->validate([
            'name_ar'=>'required',
            'name_fr'=>'required',
            'name_en'=>'required',
            'description_ar'=>'required',
            'description_fr'=>'required',
            'description_en'=>'required',
            'length'=>'required',
            'duration'=>'required',
        ]);
        if($this->photo){
            $imageName = Carbon::now()->timestamp . Str::random(10) . '.' . $this->photo->extension();
            $this->photo->storeAs('primary/assets/images/paths/' , $imageName);
        }else{
            $imageName = "No_Image_Available.jpg";
        }
        if($this->videos){
            $videoName = Carbon::now()->timestamp . Str::random(10) . '.' .  $this->videos->extension();
            $this->photo->storeAs('primary/assets/images/paths/' , $videoName);
        }

        
        $path=new Path();
        $path->name_ar=$this->name_ar;
        $path->name_fr=$this->name_fr;
        $path->name_en=$this->name_en;
        $path->description_ar=$this->description_ar;
        $path->description_en=$this->description_en;
        $path->description_fr=$this->description_fr;
        $path->length=$this->length;
        $path->duration=$this->duration;
        $path->user_id=$this->user_id;
        $path->photo=$imageName;
        $path->video=$videoName;
        $path->save();
    }
}
