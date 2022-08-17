<?php

namespace App\Http\Livewire\Admin;

use App\Actions\Fortify\PasswordValidationRules;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\UpdatesUserPasswords;

class ProfileComponent extends Component
{
    use PasswordValidationRules;

public $name,$email,$password,$phoneNo,$description,$birthdate,$address,$user_id;

    public function mount(){
        $users = User::find(Auth::user()->id);
        $this->user_id=Auth::user()->id;
        $this->name=$users->name;
        $this->email=$users->email;
        $this->phoneNo='0'.$users->phoneNo;
        $this->description=$users->description;
        $this->birthdate=$users->birthdate;
        $this->address=$users->address;
        $this->password=$users->password;
    }

    public function updated($fields){
   
        $this->validateOnly($fields,[
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users,email, '.$this->user_id,
            'birthdate'=>'required',
            'description'=>'required',
            'phoneNo'=>'required',
            'password'=>'required|min:8'
        ]);
    }
    
    public function render()
    {
        $title= 'profile';
        $users = User::find(Auth::user()->id);
        return view('livewire.admin.profile-component',compact('users'))->layout('layouts.master', compact('title'));;
    }

    

    public function updateProfile(){
        $user = User::find(Auth::user()->id);
        $validatedata=$this->validate([
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users,email, '.$this->user_id,
            'birthdate'=>'required',
            'description'=>'required',
            'phoneNo'=>'required',
            'password'=>'required|min:8'

        ]);

        $user->update(
            ['name'=>$this->name,
            'email'=>$this->email,
            'description'=>$this->description,
            'phoneNo'=>$this->phoneNo,
            'birthdate'=>$this->birthdate,
            'password' =>Hash::make($this->password)
        
        
        ]);
        return redirect(request()->header('Referer'));
    }
}
