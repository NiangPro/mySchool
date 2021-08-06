<?php

namespace App\Http\Livewire\Admin;

use App\Models\Classe;
use App\Models\Classroom;
use App\Models\Cours;
use App\Models\Internaute;
use App\Models\Matiere;
use App\Models\SchoolYear;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Course extends Component
{
    public $as;
    public $etat = "list";
    public $classes;
    public $classrooms;
    public $matieres;
    public $teachers;

    public $days = ['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche'];

    public $form = [
        'id' => null,
        'jour' => '',
        'debut' => '',
        'fin' => '',
        'user_id' => '',
        'classe_id' => '',
        'classroom_id' => '',
        'matiere_id' => '',
        'school_year_id' => '',
    ];

    protected $rules = [
        'form.jour' => 'required',
        'form.debut' => 'required',
        'form.fin' => 'required',
        'form.user_id' => 'required',
        'form.classe_id' => 'required',
        'form.classroom_id' => 'required',
        'form.matiere_id' => 'required',
    ];

    public function back()
    {
        $this->etat = "list";
        $this->formInit();
    }

    public function store()
    {
        $this->validate();

        $c = Cours::where('classroom_id', $this->form['classroom_id'])
            ->where('jour', $this->form['jour'])
            ->where('fin', '<=', $this->form['debut'])
            ->first();
        $p = Cours::where('user_id', $this->form['user_id'])
            ->where('jour', $this->form['jour'])
            ->where('fin', '<=', $this->form['debut'])
            ->first();
        if ($c || $p) {
            $c ? $this->dispatchBrowserEvent("conflict")
                : $this->dispatchBrowserEvent("conflictProfessor");
        } else {
            if ($this->form['id']) {
                $cours = Cours::where('id', $this->form['id'])->first();

                $cours->jour = $this->form['jour'];
                $cours->debut = $this->form['debut'];
                $cours->fin = $this->form['fin'];
                $cours->user_id = $this->form['user_id'];
                $cours->classe_id = $this->form['classe_id'];
                $cours->classroom_id = $this->form['classroom_id'];
                $cours->matiere_id = $this->form['matiere_id'];

                $cours->save();

                $this->dispatchBrowserEvent("courseUpdated");
                $this->back();
            } else {
                $this->form['school_year_id'] = $this->as->id;

                Cours::create([
                    'jour' => $this->form['jour'],
                    'debut' => $this->form['debut'],
                    'fin' => $this->form['fin'],
                    'user_id' => $this->form['user_id'],
                    'classe_id' => $this->form['classe_id'],
                    'classroom_id' => $this->form['classroom_id'],
                    'matiere_id' => $this->form['matiere_id'],
                    'school_year_id' => $this->form['school_year_id'],
                ]);

                $this->dispatchBrowserEvent("courseAdded");
            }
        }
    }

    public function delete($id)
    {
        $cours = Cours::where('id', $id)->first();

        $cours->delete();

        $this->dispatchBrowserEvent('courseDeleted');
    }

    public function edit($id)
    {

        $this->etat = "edit";
        $cours = Cours::where('id', $id)->first();

        $this->form['id'] = $cours->id;
        $this->form['jour'] = $cours->jour;
        $this->form['debut'] = $cours->debut;
        $this->form['fin'] = $cours->fin;
        $this->form['user_id'] = $cours->user_id;
        $this->form['classe_id'] = $cours->classe_id;
        $this->form['classroom_id'] = $cours->classroom_id;
        $this->form['matiere_id'] = $cours->matiere_id;
        $this->form['school_year_id'] = $cours->school_year_id;
    }

    public function render()
    {
        $user = new Internaute();
        $this->teachers = $user->enseignants();

        $this->as = SchoolYear::orderBy('id', 'DESC')->first();
        $this->classes = Classe::orderBy('name', 'ASC')->get();
        $this->classrooms = Classroom::orderBy('name', 'ASC')->get();
        $this->matieres = Matiere::orderBy('name', 'ASC')->get();

        $cours = Cours::where('school_year_id', $this->as->id)->orderBy("id", "DESC")->get();

        return view('livewire.admin.cours.course', [
            'cours' => $cours
        ])->layout('layouts.app', [
            'page' => "course"
        ]);
    }

    public function mount()
    {
        if (!Auth::check()) {
            return redirect(route('login'));
        }
    }

    public function formInit()
    {
        $this->form['id'] = null;
        $this->form['jour'] = '';
        $this->form['debut'] = '';
        $this->form['fin'] = '';
        $this->form['user_id'] = '';
        $this->form['classe_id'] = '';
        $this->form['classroom_id'] = '';
        $this->form['matiere_id'] = '';
        $this->form['school_year_id'] = '';
    }
}
