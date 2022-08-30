<?php

namespace App\Http\Livewire\Admin;

use Livewire\WithFileUploads;
use App\Models\Path;
use App\Models\Site;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class EditPathComponent extends Component
{    use WithFileUploads;
    public $path_id;
    public $photo,$newphoto,$video,$newvideo,$name_ar,$name_fr,$name_en,$user_id,$sitesIds=[],$selectedSites2=[],$description_ar,$description_en,$description_fr,$duration,$length,$sites;
    public $arraythird;
    protected $listeners = [
        'store'
   ];

    public function updated($fields){
        $this->validateOnly($fields,[
            'name_ar'=>'required|unique:paths,name_ar,'.$this->path_id,
            'name_fr'=>'required|unique:paths,name_fr,'.$this->path_id,
            'name_en'=>'required|unique:paths,name_en,'.$this->path_id,
            'description_ar'=>'required',
            'description_fr'=>'required',
            'description_en'=>'required',
            'length'=>'required',
            'duration'=>'required',
        ]);
    }


   
    public function change(){
        $this->arraythird=$this->selectedSites2;
    }
    public function mount($path_id){
        $this->path_id=$path_id;
        $path= Path::find($path_id);
        $this->name_en = $path->name_en;
        $this->name_ar = $path->name_ar;
        $this->name_fr = $path->name_fr;
        $this->description_en = $path->description_en;
        $this->description_fr = $path->description_fr;
        $this->description_ar = $path->description_ar;
        $this->photo = $path->photo;
        $this->video = $path->video;
        $this->duration = $path->duration;
        $this->length = $path->length;
        $this->sitesIds = $path->sites->pluck('id')->toArray();
        $this->selectedSites2 = $path->sites->pluck('id')->toArray();
        $this->user_id = $path->user_id;
        $this->editedBy=Auth::user()->id;
        
    
  

    }
    public function store($value){ 
        $path=Path::find($this->path_id);
        if(!is_null($value))
        $this->selectedSites2=$value;
                   $validatedata= $this->validate([
                    'name_ar'=>'required|unique:paths,name_ar,'.$this->path_id,
                    'name_fr'=>'required|unique:paths,name_fr,'.$this->path_id,
                    'name_en'=>'required|unique:paths,name_en,'.$this->path_id,
            'description_ar'=>'required',
            'description_fr'=>'required',
            'description_en'=>'required',
            'length'=>'required',
            'duration'=>'required',
        ]);


        if($this->newphoto){
            $imageName = Carbon::now()->timestamp . Str::random(10) . '.' . $this->newphoto->extension();
            $this->newphoto->storeAs('primary/assets/images/paths/' , $imageName);
            $path->update(['photo'=>$imageName]);
           
        }else{
            $imageName = "No_Image_Available.jpg";
        }
        if($this->newvideo){
            $videoName = Carbon::now()->timestamp . Str::random(10) . '.' .  $this->newvideo->extension();
            $this->newvideo->storeAs('primary/assets/images/paths/' , $videoName);
            $path->update(['video'=>$videoName]);
        }
        

      
        $path->name_ar=$this->name_ar;
        $path->name_fr=$this->name_fr;
        $path->name_en=$this->name_en;
        $path->description_ar=$this->description_ar;
        $path->description_en=$this->description_en;
        $path->description_fr=$this->description_fr;
        $path->length=$this->length;
        $path->duration=$this->duration;
        $path->editedBy=$this->user_id;
       
    
        $path->save();
        $path->sites()->sync($this->selectedSites2);
        session()->flash('type', 'info');
        session()->flash('message', 'Well done, You have successfully updated   :  ' . $path->name_en);
         session()->flash('title', 'Operation success');
        return redirect()->route('admin-path');
    }

    public function render()
    {
        $title = 'Edit Path';
        $this->sites = Site::where('delete',0)->get();
        return view('livewire.admin.edit-path-component')->layout('layouts.master',compact('title'));
    }
}
