<?php

namespace App\Http\Livewire\Admin;

use App\Models\City;
use App\Models\Media;
use App\Models\Site;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class SiteEditComponent extends Component
{
    use WithFileUploads;

    public $user_id;
    public $name_id;
    public $name_en;
    public $name_ar;
    public $name_fr;
    public $city_id;
    public $description_en;
    public $description_fr;
    public $description_ar;
    public $site_id;
    public $latitude;
    public $longitude;
    public $openTime;
    public $duration;
    public $price = 0;
    public $photo;
    public $neWphoto;
    public $display;
    public $images = [];
    public $audios = [];
    public $videos = [];
    public $neWimages = [];
    public $neWaudios = [];
    public $neWvideos = [];

    public function mount($site_id){
        $site= Site::find($site_id);
        $this->name_en = $site->name_en;
        $this->name_ar = $site->name_ar;
        $this->name_fr = $site->name_fr;
        $this->description_en = $site->description_en;
        $this->description_fr = $site->description_fr;
        $this->description_ar = $site->description_ar;
        $this->longitude = $site->longitude;
        $this->latitude = $site->latitude;
        $this->photo = $site->photo;
        $this->site_id = $site_id;
        $this->price = $site->price;
        $this->city_id = $site->city_id;
        $this->openTime = $site->openTime;
      
        $this->duration = $site->duration; 
        $this->editedBy=Auth::user()->id;
        $this->user_id=Auth::user()->id;
    }

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'name_en' => 'required|min:3',
            'name_ar' => 'required|min:3',
            'name_fr' => 'required|min:3',
            'description_en' => 'required|min:50',
            'description_fr' => 'required|min:50',
            'description_ar' => 'required|min:50',
            'latitude' => 'required|numeric|between:-180,180',
            'longitude' => 'required|numeric|between:-180,180',
            'city_id' => 'required',
            'openTime' => 'required',
            'duration' => 'required',
            'price' => 'required'
        ]);

        // $this->validateOnly($fields,[
        //     'images' => 'required|mimes:png,jpg',

        // ]);
    }
    public function updateSite()
    {
        $site=Site::find($this->site_id);
        if ($this->neWphoto) {
            $imageName = Carbon::now()->timestamp . '.' . $this->neWphoto->extension();
            $this->neWphoto->storeAs('primary/assets/images/sites/', $imageName);
            $site->update(['photo'=>$imageName]);
        } else {
            $imageName = "No_Image_Available.jpg";
        }
        // dd($imageName);
        $valdiateData = $this->validate([
            'name_en' => 'required',
            'name_ar' => 'required',
            'name_fr' => 'required',
            'description_en' => 'required',
            'description_fr' => 'required',
            'description_ar' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'city_id' => 'required',
            'openTime' => 'required',
            'duration' => 'required',
            'price' => 'required'
        ]);

        $this->name_en = Str::of($this->name_en)->upper();
        $this->name_fr = Str::of($this->name_fr)->upper();
        $this->description_en = Str::of($this->description_en)->ucfirst();
        $this->description_fr = Str::of($this->description_fr)->ucfirst();

      

        $site->update($valdiateData);

        if ($this->neWimages) {
            foreach ($this->neWimages as $image) {
                $media_image = new Media();
                $imageName = Carbon::now()->timestamp . Str::random(10) . '.' . $image->extension();
                $media_image->name = $imageName;
                $media_image->type = 'image';
                $media_image->created_at = Carbon::now();
                $media_image->updated_at = Carbon::now();
                $site->media()->save($media_image);
                $image->storeAs('primary/assets/images/sites/media/images', $imageName);
                
            }
        }
        if ($this->neWaudios) {
            foreach ($this->neWaudios as $audio) {
                $media_audio = new Media();
                $audioName = Carbon::now()->timestamp . Str::random(10) . '.' . $audio->extension();
                $media_audio->name = $audioName;
                $media_audio->type = 'audio';
                $media_audio->created_at = Carbon::now();
                $media_audio->updated_at = Carbon::now();
                $site->media()->save($media_audio);
                $audio->storeAs('primary/assets/images/sites/media/audios', $audioName);
            }
        }
        if($this->neWvideos) {
            foreach($this->neWvideos as $video) {
                $media_video = new Media();
                $videoName = Carbon::now()->timestamp . Str::random(10) . '.' . $video->extension();
                $media_video->name = $videoName;
                $media_video->type = 'video';
                $media_video->created_at = Carbon::now();
                $media_video->updated_at = Carbon::now();

                $site->media()->save($media_video);
                $video->storeAs('primary/assets/images/sites/media/videos', $videoName);
            }
        }
        //setup toastr
        session()->flash('type', 'success');
        session()->flash('message', 'Well done, You have successfully added new site');
        session()->flash('title', 'Operation success');

        //redirect to the sites page
        return redirect()->route('admin-sites');
    }

    public function render()
    {
        $site = Site::find($this->site_id);
        $media = Media::where('site_id',$this->site_id);
        $countImages = $site->media->where('type','image')->count();
        $countAudios = $site->media->where('type','audio')->count();
        $countVideos = $site->media->where('type','video')->count(); 
        $cities=City::where('delete',0)->get();
        $title='edit site';
        return view('livewire.admin.site-edit-component',compact('cities','site','countImages','countAudios','media'))->layout("layouts.master", compact("title"));
    }
}
