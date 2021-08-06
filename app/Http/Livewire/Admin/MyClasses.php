<?php

namespace App\Http\Livewire\Admin;

use App\Models\Classe;
use App\Models\Cours;
use App\Models\Internaute;
use App\Models\Matiere;
use App\Models\Note;
use App\Models\Period;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class MyClasses extends Component
{
    public $courses;
    public $classe;
    public $periodes;
    public $classSelected;
    public $users;
    public $period_name;
    public $matiere_name;

    public $form = [
        "classId" => "",
        "matiereId" => "",
        "periodId" => "",
    ];

    protected $rules = [
        "form.periodId" => "required"
    ];

    public function render()
    {
        $this->users = new Internaute();
        $this->courses = Cours::where('school_year_id', $this->users->anneeScolaire()->id)->where('user_id', Auth::user()->id)->get();
        $this->periodes = Period::orderBy('value', 'ASC')->get();

        return view('livewire.admin.classes.my-classes', [])->layout('layouts.app', [
            'page' => "myclasses"
        ]);
    }

    public function selectClasse($classId, $matiereId)
    {
        $this->form['classId'] = $classId;
        $this->form['matiereId'] = $matiereId;
    }

    public function searchMark()
    {
        $this->validate();

        $this->classe = Classe::where('id', $this->form['classId'])->first();
        $this->period_name = Period::where('id', $this->form['periodId'])->get("value")->first();
        $this->matiere_name = Matiere::where('id', $this->form['matiereId'])->get("name")->first();

        $this->dispatchBrowserEvent("classeSelected");
    }

    public function mount()
    {
        if (!Auth::check()) {
            return redirect(route('login'));
        }
    }

    public function getMark($studentId)
    {
        return Note::where('school_year_id', $this->users->anneeScolaire()->id)
            ->where('classe_id', $this->form['classId'])
            ->where('matiere_id', $this->form['matiereId'])
            ->where('apprenant_id', $studentId)
            ->where('period_id', $this->form['periodId'])
            ->get("valeur")
            ->first();
    }
}
