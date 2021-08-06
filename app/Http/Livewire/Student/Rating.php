<?php

namespace App\Http\Livewire\Student;

use App\Models\Note;
use App\Models\Period;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Rating extends Component
{
    public $user;
    public $search = false;
    public $notes;

    public $form = [
        'classe_id' => "",
        'period_id' => "",
    ];

    protected $rules = [
        'form.classe_id' => "required",
        'form.period_id' => "required",
    ];

    public function checkClass($id)
    {
        $this->form['classe_id'] = $id;
        $this->search = false;
    }

    public function searchMark()
    {
        $this->validate();
        $this->notes = Note::where('apprenant_id', Auth::user()->id)
            ->where('classe_id', $this->form['classe_id'])
            ->where('period_id', $this->form['period_id'])
            ->orderBy('valeur', 'DESC')
            ->get();
        if (count($this->notes) <= 0) {
            $this->notes = null;
        }
        $this->search = true;
        $this->dispatchBrowserEvent("mark");
    }

    public function render()
    {
        $this->user = Auth::user();

        return view('livewire.student.rating', [
            "periodes" => Period::orderBy('value', 'ASC')->get()
        ])->layout('layouts.app', [
            'page' => "mymark"
        ]);
    }

    public function mount()
    {
        if (!Auth::check()) {
            return redirect(route('login'));
        }
    }
}
