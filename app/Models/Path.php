<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Path extends Model
{
    use HasFactory;
    protected $table='paths';
    protected $fillable=['name_fr','name_ar','name_en','description_fr','description_ar','description_en','length','duration','photo','video','delete','user_id','editedBy','deletedBy'];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function Sites()
    {
       return $this->belongsToMany(Site::class,'path_sites');
    }



}
