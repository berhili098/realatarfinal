<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    protected $fillable = ['uid','fullname','email','password','birthday','city','phone','gender','avatar','level','points','isPremium','isVerified','status','delete'];
    protected $table = 'clients';
    public $primaryKey = 'uid';
    protected $keyType = "string";
    public $incrementing = false;
    // public function saveds(){
    //     return $this->hasMany(saved::class, 'client_id');

//}

}
