<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PathSite extends Model
{
    use HasFactory;
    protected $table='path_sites';
    protected $fillable=['site_id','path_id'];
}
