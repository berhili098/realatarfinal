<?php

namespace App\Http\Livewire\Admin;
use Livewire\WithPagination;
use App\Models\Quiz;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class QuizComponent extends Component
{ use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $quiz_id;
    public $search;
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

        $quizzes = Quiz::where('delete',0)->where(function($query){
            $query->where('question_ar','like',"%{$this->search}%")
            ->orwhere('question_fr','like',"%{$this->search}%")
            ->orwhere('question_en','like',"%{$this->search}%");
        })->paginate(6);


        $countsrecord=Quiz::where('delete',0)->where(function($query){
            $query->where('question_ar','like',"%{$this->search}%")
            ->orwhere('question_fr','like',"%{$this->search}%")
            ->orwhere('question_en','like',"%{$this->search}%");
        })->get();
        return view('livewire.admin.quiz-component',compact('quizzes','countsrecord'))->layout('layouts.master',compact('title'));
    }
    public function changeStatus($quiz_id){
        $this->quiz_id=$quiz_id;
        $quiz=Quiz::find($this->quiz_id);
        $quiz->update([
            'status' => $quiz->status == 0 ? 1 : 0, 
        ]);
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
            'status'=> '0',
        ]);
   
      
        $this->emit('cityDeleted');
        session()->flash('type','error');
        session()->flash('message','Well done, You have successfully deleted this quiz');
        session()->flash('title','Operation success');
    }

 
}
