<?php

namespace App\Http\Livewire;

use App\Models\Answer;
use App\Models\Question;
use Livewire\Component;
use PhpParser\Node\Expr\FuncCall;
use WireUi\Traits\Actions;

class Exam extends Component
{
    use Actions;

    public $status;
    public $priority;
    public $count;

    public $question;
    public $answer;

    public $mySelected;
    public $answers = [];
    public $questions = [];

    public function render()
    {
        $this->getQuestion();
        $this->getQuestions();
        $this->getAnswer();
        return view('livewire.exam');
    }

    public function mount()
    {
        $this->priority = 1;
        $this->status = 'instruction';
        $this->count = Question::count();
        $this->answers = Answer::whereUserId(auth()->user()->id)
            ->get();
        $this->mySelected = null;
        $this->getQuestion();
        $this->getQuestions();
        $this->getAnswer();
    }

    public function changeStatus($status)
    {
        $this->status = $status;
    }

    public function setPriority($number)
    {
        $this->priority = $number;
    }
    
    public function choiceOption($index)
    {
        $this->mySelected = $index;
        if ($index == $this->question->correct) {
            $this->question->answers()->updateOrCreate(
                [
                    'user_id' => auth()->user()->id,
                    'priority' => $this->priority
                ],
                [
                    'answer' => $this->mySelected,
                    'is_correct' => 1
                ]
            );
        } else {
            $this->question->answers()->updateOrCreate(
                [
                    'user_id' => auth()->user()->id,
                    'priority' => $this->priority
                ],
                [
                    'answer' => $this->mySelected,
                    'is_correct' => 0
                ]
            );
        }
    }

    public function next()
    {
        if ($this->priority < $this->count) {
            $this->priority++;
        }
        $this->mySelected = null;
    }

    public function prev()
    {
        if ($this->priority > 1) {
            $this->priority--;
        }
        $this->mySelected = null;
    }

    public function simpan()
    {
        dd($this->answers);
    }

    public function getQuestion()
    {
        $this->question =  Question::wherePriority($this->priority)->first();
    }
    public function getQuestions()
    {
        $this->questions =  Question::get();
    }
    public function getAnswer()
    {
        $this->answer = Answer::whereUserId(auth()->user()->id)
            ->wherePriority($this->priority)
            ->first();
    }
}
