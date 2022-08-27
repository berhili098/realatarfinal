<?php

namespace App\Http\Livewire\Admin;

use App\Actions\Fortify\PasswordValidationRules;
use App\Models\City;
use App\Models\Site;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use Livewire\WithFileUploads;

class ProfileComponent extends Component
{
    use WithFileUploads;
    use PasswordValidationRules;

    public $name, $email, $newphoto, $photo, $password, $phoneNo, $description, $birthdate, $address, $user_id;
    public $facebook, $twitter, $youtube;

    public function mount()
    {
        $users = User::find(Auth::user()->id);
        $this->user_id = Auth::user()->id;
        $this->name = $users->name;
        $this->email = $users->email;
        $this->phoneNo = $users->phoneNo;
        $this->description = $users->description;
        $this->birthdate = $users->birthdate;
        $this->address = $users->address;
        $this->password = $users->password;
        $this->facebook = $users->facebook;
        $this->twitter = $users->twitter;
        $this->youtube = $users->youtube;
        $this->photo = $users->photo;
    }
    public function updatedNewphoto()
    {
        $users = User::find(Auth::user()->id);
        $imageName = Carbon::now()->timestamp . Str::random(10) . '.' .  $this->newphoto->extension();
        $this->newphoto->storeAs('primary/assets/images/users/', $imageName);
        $users->update([
            'photo' => $imageName,
        ]);
    }

    public function updated($fields)
    {

        $this->validateOnly($fields, [
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users,email, ' . $this->user_id,
            'birthdate' => 'required',
            'description' => 'required',
            'phoneNo' => 'required',
            'password' => 'required|min:8',
            'address' => 'required',
            'facebook' => 'url',
            'twitter' => 'url',
            'youtube' => 'url'
        ]);
    }

    public function render()
    {
        $title = 'profile';
        $users = User::find(Auth::user()->id);
        $sites = Site::where('user_id', Auth::user()->id)->get();
        $cities = City::where('user_id', Auth::user()->id)->get();

        $all = $cities->merge($sites)->sortByDesc('created_at');
        foreach ($all as $key => $value) {
            $all[$key]['type'] = $value->getTable();


            // $all = array_reverse(array_sort($all, function ($value) {
            //   return $value['created_at'];
            // }));
        }
        return view('livewire.admin.profile-component', compact('users', 'all'))->layout('layouts.master', compact('title'));
    }



    public function updateProfile()
    {
        $user = User::find(Auth::user()->id);
        $validatedata = $this->validate([
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users,email, ' . $this->user_id,
            'birthdate' => 'required',
            'description' => 'required',
            'phoneNo' => 'required',
            'password' => 'required|min:8',
            'address' => 'required',
            'facebook' => 'url',
            'twitter' => 'url',
            'youtube' => 'url'

        ]);

        if ($user->password == $this->password) {
            $user->update(
                [
                    'name' => $this->name,
                    'email' => $this->email,
                    'facebook' => $this->facebook,
                    'twitter' => $this->twitter,
                    'youtube' => $this->youtube,

                ]
            );
            $user->description = $this->description;
            $user->address = $this->address;
            $user->phoneNo = $this->phoneNo;
            $user->birthdate = $this->birthdate;
            $user->save();
        } else {
            $user->update(
                [
                    'name' => $this->name,
                    'email' => $this->email,
                    'password' => Hash::make($this->password),
                ]
            );
            $user->description = $this->description;
            $user->address = $this->address;
            $user->phoneNo = $this->phoneNo;
            $user->birthdate = $this->birthdate;

            $user->save();
        }

        return redirect(request()->header('Referer'));
    }
}
