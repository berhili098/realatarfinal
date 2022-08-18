<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;
    protected $table="quizzes";
    protected $fillable = ['question_en','question_fr','question_ar','reponse1_ar','reponse2_ar','reponse3_ar','reponse4_ar','reponse1_fr','reponse2_fr','reponse3_fr','reponse4_fr','reponse1_en','reponse2_en','reponse3_en','reponse4_en','correcte_ar','correcte_en','correcte_fr','site_id','status','delete','editedBy','deletedBy','user_id'];


    public function site()
    {
        return $this->belongsTo(Site::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
