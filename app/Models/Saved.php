<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Saved extends Model
{
    use HasFactory;
    protected $fillable = ['site_id', 'client_id'];
    public function site(){
        return $this->belongsTo(site::class, 'site_id');
    }
    public function client(){
        return $this->belongsTo(client::class, 'client_id');
    }
}
