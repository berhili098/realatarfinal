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
    public $quiz_id;
    public $search;
    public $quizanswer1;
    public $quizanswer2;
    public $quizanswer3;
    public $quizanswer4;

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
        })->paginate(6);


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
    {
        $quiz = Quiz::find($id);
        $this->quiz_sel = $quiz;

        
        if ($quiz->correcte_en == 1) {
            $this->quizanswer1 = $quiz->reponse1_en;
            $this->quizanswer2 = $quiz->reponse2_en;
            $this->quizanswer3 = $quiz->reponse3_en;
            $this->quizanswer4 = $quiz->reponse4_en;
        }elseif ($quiz->correcte_en == 2) {
            $this->quizanswer1 = $quiz->reponse2_en;
            $this->quizanswer2 = $quiz->reponse1_en;
            $this->quizanswer3 = $quiz->reponse3_en;
            $this->quizanswer4 = $quiz->reponse4_en;
        }elseif ($quiz->correcte_en == 3) {
            $this->quizanswer1 = $quiz->reponse3_en;
            $this->quizanswer2 = $quiz->reponse1_en;
            $this->quizanswer3 = $quiz->reponse2_en;
            $this->quizanswer4 = $quiz->reponse4_en;
        }elseif ($quiz->correcte_en == 4) {
            $this->quizanswer1 = $quiz->reponse4_en;
            $this->quizanswer2 = $quiz->reponse1_en;
            $this->quizanswer3 = $quiz->reponse2_en;
            $this->quizanswer4 = $quiz->reponse3_en;
        }
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
