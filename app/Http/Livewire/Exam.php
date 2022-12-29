<?php

namespace App\Http\Livewire;

use App\Models\Answer;
use App\Models\Gaya;
use App\Models\JawabGaya;
use App\Models\Question;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
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

    public $gaya;
    public $jawab;

    public $prioritas;
    public $hitung;

    public $pilihan;
    public $jawabs = [];
    public $gayas = [];

    public function render()
    {
        $this->getQuestion();
        $this->getQuestions();
        $this->getAnswer();

        $this->getGaya();
        $this->getGayas();
        $this->getJawaban();
        return view('livewire.exam');
    }

    public function mount()
    {
        $this->priority = 1;
        $this->prioritas = 1;
        if (auth()->user()->sudah_test && !auth()->user()->sudah_gaya) {
            $this->status = 'gaya';
        } elseif (auth()->user()->sudah_test && auth()->user()->sudah_gaya) {
            $this->status = 'akhir';
        } else {
            $this->status = 'petunjuk';
        }
        $this->count = Question::count();
        $this->hitung = Gaya::count();
        $this->answers = Answer::whereUserId(auth()->user()->id)
            ->get();
        $this->mySelected = null;
        $this->getQuestion();
        $this->getQuestions();
        $this->getAnswer();

        $this->jawabs = JawabGaya::whereUserId(auth()->user()->id)
            ->get();
        $this->pilihan = null;
        $this->getGaya();
        $this->getGayas();
        $this->getJawaban();
    }

    public function changeStatus($status)
    {
        $this->status = $status;
    }

    //akademik
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
        auth()->user()->update([
            'sudah_test'  => 1
        ]);

        $this->status = 'gaya';
    }



    //gaya belajar
    public function setPrioritas($number)
    {
        $this->prioritas = $number;
    }

    public function pilihJawaban($index)
    {
        $this->pilihan = $index;
        $this->gaya->jawab()->updateOrCreate(
            [
                'user_id' => auth()->user()->id,
                'priority' => $this->prioritas
            ],
            [
                'answer' => $this->pilihan,
            ]
        );
    }

    public function lanjut()
    {
        if ($this->prioritas < $this->hitung) {
            $this->prioritas++;
        }
        $this->pilihan = null;
    }

    public function sebelum()
    {
        if ($this->prioritas > 1) {
            $this->prioritas--;
        }
        $this->pilihan = null;
    }

    public function akhiri()
    {
        auth()->user()->update([
            'sudah_gaya'  => 1
        ]);

        $this->status = 'akhir';
    }

    private function getQuestion()
    {
        $this->question =  Question::wherePriority($this->priority)->first();
    }
    private function getQuestions()
    {
        $this->questions =  Question::get();
    }
    private function getAnswer()
    {
        $this->answer = Answer::whereUserId(auth()->user()->id)
            ->wherePriority($this->priority)
            ->first();
    }

    private function getGaya()
    {
        $this->gaya = Gaya::wherePriority($this->prioritas)->first();
    }
    private function getGayas()
    {
        $this->gayas = Gaya::get();
    }
    private function getJawaban()
    {
        $this->jawab = JawabGaya::whereUserId(auth()->user()->id)
            ->wherePriority($this->prioritas)
            ->first();
    }
}
