<?php

namespace App\Http\Livewire\Admin;

use App\Actions\Fortify\PasswordValidationRules;
use App\Models\City;
use App\Models\Site;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;

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
            'password'=>'required|min:8',
            'address'=>'required'
        ]);
    }
    
    public function render()
    {
        $title= 'profile';
        $users = User::find(Auth::user()->id);
        $sites=Site::where('user_id',Auth::user()->id)->get();
        $cities=City::where('user_id',Auth::user()->id)->get();
        
        
   
       

    
 
   
    $all = $cities->merge($sites)->sortByDesc('created_at');
 foreach ($all as $key => $value) {
     $all[$key]['type'] = $value->getTable();

 
    // $all = array_reverse(array_sort($all, function ($value) {
    //   return $value['created_at'];
    // }));
 }
        return view('livewire.admin.profile-component',compact('users','all'))->layout('layouts.master', compact('title'));
    }

    

    public function updateProfile(){
        $user = User::find(Auth::user()->id);
        $validatedata=$this->validate([
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users,email, '.$this->user_id,
            'birthdate'=>'required',
            'description'=>'required',
            'phoneNo'=>'required',
            'password'=>'required|min:8',
            'address'=>'required'

        ]);

        if($user->password==$this->password)
        {
            $user->update(
                ['name'=>$this->name,
                'email'=>$this->email, 
            
            ]);
            $user->description=$this->description;
            $user->address=$this->address;
            $user->phoneNo=$this->phoneNo;
            $user->birthdate=$this->birthdate;
            $user->save();
        }
        else{
            $user->update(
                ['name'=>$this->name,
                'email'=>$this->email,
                'password' =>Hash::make($this->password), 
            ]);
            $user->description=$this->description;
            $user->address=$this->address;
            $user->phoneNo=$this->phoneNo;
            $user->birthdate=$this->birthdate;

            $user->save();
        }
  
        return redirect(request()->header('Referer'));
    }
}
