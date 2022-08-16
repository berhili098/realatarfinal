<?php

namespace App\Http\Livewire\Admin;

use App\Models\City;
use App\Models\Media;
use App\Models\Site;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\File;

class AddSiteComponent extends Component
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

    public $latitude;
    public $longitude;
    public $openTime;
    public $duration;
    public $price = 0;
    public $photo;
    public $display;
    public $images = [];
    public $audios = [];
    public $videos = [];


    public function mount($city_id = null)
    {
        $this->city_id = $city_id;
        $this->display = 'hide';
        $this->user_id = Auth::user()->id;

        // $this->photo = 'No_Image_Available.jpg';
    }


    public function updatedPhoto()
    {
        if ($this->photo) {
            $this->display = '';
        } else {
            $this->display = 'hide';
        }
    }

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'name_en' => 'required|min:3|unique:sites',
            'name_ar' => 'required|min:3|unique:sites,name_ar',
            'name_fr' => 'required|min:3|unique:sites,name_fr',
            'description_en' => 'required|min:50|unique:sites,description_en',
            'description_fr' => 'required|min:50|unique:sites,description_fr',
            'description_ar' => 'required|min:50|unique:sites,description_ar',
            'latitude' => 'required|numeric|between:-180,180',
            'longitude' => 'required|numeric|between:-180,180',
            'user_id' => 'required',
            'city_id' => 'required',
            'openTime' => 'required',
            'duration' => 'required',
            'price' => 'required'
        ]);

        // $this->validateOnly($fields,[
        //     'images' => 'required|mimes:png,jpg',

        // ]);
    }

    public function storeSite()
    {
        if ($this->photo) {
            $imageName = Carbon::now()->timestamp . '.' . $this->photo->extension();
            $this->photo->storeAs('primary/assets/images/sites/', $imageName);
        } else {
            $imageName = "No_Image_Available.jpg";
        }
        // dd($imageName);
        $valdiateData = $this->validate([
            'name_en' => 'required|unique:sites',
            'name_ar' => 'required|unique:sites',
            'name_fr' => 'required|unique:sites',
            'description_en' => 'required|unique:sites',
            'description_fr' => 'required|unique:sites',
            'description_ar' => 'required|unique:sites',
            'latitude' => 'required',
            'longitude' => 'required',
            'user_id' => 'required',
            'city_id' => 'required',
            'openTime' => 'required',
            'duration' => 'required',
            'price' => 'required'
        ]);

        $this->name_en = Str::of($this->name_en)->upper();
        $this->name_fr = Str::of($this->name_fr)->upper();
        $this->description_en = Str::of($this->description_en)->ucfirst();
        $this->description_fr = Str::of($this->description_fr)->ucfirst();

        $site = Site::create($valdiateData);

        $site->update([
            'photo' => $imageName,
        ]);

        if ($this->images) {
            foreach ($this->images as $image) {
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
        if ($this->audios) {
            foreach ($this->audios as $audio) {
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
        if($this->videos) {
            foreach($this->videos as $video) {
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
        $cities = City::all();
        $title = "ADD NEW SITE";
        return view('livewire.admin.add-site-component', compact('cities'))->layout('layouts.master', compact('title'));
    }
}
