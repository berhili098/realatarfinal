<?php

namespace App\Http\Livewire\Admin;

use Livewire\WithPagination;
use App\Models\Quiz;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class QuizComponent extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $search;
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
    public $quiz_id;
    public $name_fr; 

    public function mount()
    {
        $this->search = '';
    }
    public function updatingSearch()
    {
        $this->resetPage();
    }
    public function render()
    {
        $title = 'quiz page';

        $quizzes = Quiz::where('delete', 0)->where(function ($query) {
            $query->where('question_ar', 'like', "%{$this->search}%")
                ->orwhere('question_fr', 'like', "%{$this->search}%")
                ->orwhere('question_en', 'like', "%{$this->search}%");
        })->orderBy('id','DESC')->paginate(6);


        $countsrecord = Quiz::where('delete', 0)->where(function ($query) {
            $query->where('question_ar', 'like', "%{$this->search}%")
                ->orwhere('question_fr', 'like', "%{$this->search}%")
                ->orwhere('question_en', 'like', "%{$this->search}%");
        })->get();
        return view('livewire.admin.quiz-component', compact('quizzes', 'countsrecord'))->layout('layouts.master', compact('title'));
    }
    public function changeStatus($quiz_id)
    {
        $this->quiz_id = $quiz_id;
        $quiz = Quiz::find($this->quiz_id);
        $quiz->update([
            'status' => $quiz->status == 0 ? 1 : 0,
        ]);
    }

    public function getAnswer($id)
    { $this->quiz_id=$id;
        $quiz=Quiz::find($this->quiz_id);
        $this->question_en= $quiz->question_en;
        $this->question_fr= $quiz->question_fr;
        $this->question_ar= $quiz->question_ar;
        $this->reponse1_en= $quiz->reponse1_en;
        $this->reponse2_en= $quiz->reponse2_en;
        $this->reponse3_en= $quiz->reponse3_en;
        $this->reponse4_en= $quiz->reponse4_en;
        $this->reponse1_fr= $quiz->reponse1_fr;
        $this->reponse2_fr= $quiz->reponse2_fr;
        $this->reponse3_fr= $quiz->reponse3_fr;
        $this->reponse4_fr= $quiz->reponse4_fr;
        $this->reponse1_ar= $quiz->reponse1_ar;
        $this->reponse2_ar= $quiz->reponse2_ar;
        $this->reponse3_ar= $quiz->reponse3_ar;
        $this->reponse4_ar= $quiz->reponse4_ar;
        $this->correcte_en= $quiz->correcte_en;
        $this->correcte_fr= $quiz->correcte_fr;
        $this->correcte_ar= $quiz->correcte_ar;
        $this->name_fr=$quiz->site->name_fr;
    }

    public function confirmDelete($quiz_id)
    {
        $this->quiz_id = $quiz_id;
    }

    public function deleteQuiz()
    {
        $quiz = Quiz::find($this->quiz_id);
        $quiz->update([
            'delete' => 1,
            'deletedBy' => Auth::user()->id,
            'status' => '0',
        ]);


        $this->emit('cityDeleted');
        session()->flash('type', 'error');
        session()->flash('message', 'Well done, You have successfully deleted this quiz');
        session()->flash('title', 'Operation success');
    }
}
