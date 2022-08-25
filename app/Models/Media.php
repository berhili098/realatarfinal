<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    use HasFactory;
    protected $table="media";
    protected $fillable = ['name','type','site_id','path_id'];


    public function site()
    {
        return $this->belongsTo(Site::class);
    }
    public function path_sites()
    {
        return $this->belongsTo(PathSite::class);
    }
}
