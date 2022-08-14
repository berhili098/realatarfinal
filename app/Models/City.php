<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;
    protected $table = "cities";
    protected $fillable = ['city_ar','city_fr','city_en','description_ar','description_fr', 'description_en','photo','latitude','longitude','user_id','delete','status'];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function sites()
    {
        return $this->hasMany(Site::class);
    }
}
