<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    use HasFactory;
    protected $table = "sites";
    protected $fillable =['name_ar','name_fr','name_en','description_ar','description_fr','description_en','openTime','duration','price','status','delete','longitude','latitude','photo','user_id','editedBy','deletedBy','city_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function saveds(){
        return $this->hasMany(Saved::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function media()
    {
        return $this->hasMany(Media::class);
    }
    public function quiz()
    {
        return $this->hasMany(Quiz::class);
    }

    public function paths()
    {
        return $this->belongsToMany(Path::class,'path_sites');
    }
}
