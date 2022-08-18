<?php

namespace App\Http\Livewire\Admin;

use App\Models\Quiz;
use App\Models\Site;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AddQuizComponent extends Component
{
    public $question_en;
    public $question_fr;
    public $question_ar;
    public $reponse1_en;
    public $reponse2_en;
    public $reponse3_en;
    public $reponse4_en;
    public $reponse1_fr;
    public $reponse2_fr;
    public $reponse3_fr;
    public $reponse4_fr;
    public $reponse1_ar;
    public $reponse2_ar;
    public $reponse3_ar;
    public $reponse4_ar;
    public $correcte_en;
    public $correcte_fr;
    public $correcte_ar;
    public $site_id;
    public function render()
    {
        $title = 'quizz ajouter';
        $sites=Site::where('delete',0)->get();
        return view('livewire.admin.add-quiz-component',compact('sites'))->layout('layouts.master',compact('title'));
    }

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'reponse1_en' => 'required',
            'reponse2_en' => 'required',
            'reponse3_en' => 'required',
            'reponse4_en' => 'required',
            'reponse1_fr' => 'required',
            'reponse2_fr' => 'required',
            'reponse3_fr' => 'required',
            'reponse4_fr' => 'required',
            'reponse1_ar' => 'required',
            'reponse2_ar' => 'required',
            'reponse3_ar' => 'required',
            'reponse4_ar' => 'required',
            'question_en'=>'required',
            'question_fr'=>'required',
            'question_ar'=>'required',
            'correcte_en'=>'required',
            'correcte_fr'=>'required',
            'correcte_ar'=>'required',
            'site_id'=>'required'

           
        ]);

    }

    public   function storeQuiz()
    {
        $valdiateData = $this->validate([
            'reponse1_en' => 'required',
            'reponse2_en' => 'required',
            'reponse3_en' => 'required',
            'reponse4_en' => 'required',
            'reponse1_fr' => 'required',
            'reponse2_fr' => 'required',
            'reponse3_fr' => 'required',
            'reponse4_fr' => 'required',
            'reponse1_ar' => 'required',
            'reponse2_ar' => 'required',
            'reponse3_ar' => 'required',
            'reponse4_ar' => 'required',
            'question_en'=>'required',
            'question_fr'=>'required',
            'question_ar'=>'required',
            'correcte_en'=>'required',
            'correcte_fr'=>'required',
            'correcte_ar'=>'required',
            'site_id'=>'required'
        ]);


        $quiz=new Quiz();
        $quiz->question_en=$this->question_en;
        $quiz->question_fr=$this->question_fr;
        $quiz->question_ar=$this->question_ar;
        $quiz->reponse1_en=$this->reponse1_en;
        $quiz->reponse1_fr=$this->reponse1_fr;
        $quiz->reponse1_ar=$this->reponse1_ar;
        $quiz->reponse2_en=$this->reponse2_en;
        $quiz->reponse2_fr=$this->reponse2_fr;
        $quiz->reponse2_ar=$this->reponse2_ar;
        $quiz->reponse3_en=$this->reponse3_en;
        $quiz->reponse3_fr=$this->reponse3_fr;
        $quiz->reponse3_ar=$this->reponse3_ar;
        $quiz->reponse4_en=$this->reponse4_en;
        $quiz->reponse4_fr=$this->reponse4_fr;
        $quiz->reponse4_ar=$this->reponse4_ar;
        $quiz->correcte_en=$this->correcte_en;
        $quiz->correcte_fr=$this->correcte_fr;
        $quiz->correcte_ar=$this->correcte_ar;
        $quiz->site_id=$this->site_id;
        $quiz->user_id=Auth::user()->id;
        $quiz->save();
        $title = 'quizz ajouter';
        return redirect()->route('admin-quiz');
    }
}
