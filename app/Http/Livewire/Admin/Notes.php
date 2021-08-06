<?php

namespace App\Http\Livewire\Admin;

use App\Models\Classe;
use App\Models\Cours;
use App\Models\Internaute;
use App\Models\Matiere;
use App\Models\Note;
use App\Models\Period;
use App\Models\SchoolYear;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Notes extends Component
{
    public $form = [
        "id" => null,
        "valeur" => "",
        "appreciation" => "",
        "matiere_id" => "",
        "classe_id" => "",
        "apprenant_id" => "",
        "school_year_id" => "",
        "period_id" => "",
    ];

    protected $rules = [
        "form.valeur" => "required",
        "form.appreciation" => "required",
        "form.matiere_id" => "required",
        "form.apprenant_id" => "required",
        "form.period_id" => "required",
    ];

    public $notes = [];
    public $etat = "list";
    public $users;
    public $students;
    public $matieres = [];
    public $classes = [];


    public function store()
    {
        $this->validate([
            "form.valeur" => "required",
            "form.matiere_id" => "required",
            "form.apprenant_id" => "required",
            "form.period_id" => "required",
            "form.classe_id" => "required",
        ]);

        $anSco = SchoolYear::where('status', 1)->first();

        $test = Note::where("matiere_id", $this->form["matiere_id"])
            ->where("apprenant_id", $this->form["apprenant_id"])
            ->where("period_id", $this->form["period_id"])
            ->where("school_year_id", $anSco->id)
            ->first();

        if ($test) {
            $this->dispatchBrowserEvent("noteExisted");
        } else {
            Note::create([
                'valeur' => $this->form['valeur'],
                'apprenant_id' => $this->form['apprenant_id'],
                'period_id' => $this->form['period_id'],
                'classe_id' => $this->form['classe_id'],
                'enseignant_id' => Auth::user()->id,
                'matiere_id' => $this->form['matiere_id'],
                'school_year_id' => $anSco->id,
                // 'enseignant_id' => Auth::user()->id,
                'appreciation' => $this->users->appreciation($this->form['valeur']),
            ]);
            $this->dispatchBrowserEvent("noteAdded");
            $this->back();
        }
    }

    public function classSelected()
    {
        $this->validate([
            "form.classe_id" => "required",
            "form.period_id" => "required",
            "form.school_year_id" => "required",
        ]);

        $this->notes = Note::where('classe_id', $this->form['classe_id'])
            ->where('period_id', $this->form['period_id'])
            ->where('school_year_id', $this->form['school_year_id'])
            ->where('matiere_id', $this->form['matiere_id'])
            ->orderBy('valeur', 'DESC')
            ->get();
    }

    public function getStudents()
    {
        if ($this->form['classe_id']) {
            $this->students = $this->users->studentsByClassId($this->form['classe_id']);
        }
        $this->form['apprenant_id'] = "";
    }

    public function new()
    {
        $this->etat = "add";
        $this->initForm();
    }

    public function back()
    {
        $this->etat = "list";
        $this->initForm();
    }

    public function render()
    {
        $this->users = new Internaute();
        $this->getMatieres();

        return view('livewire.admin.note.notes', [
            "periods" => Period::orderBy('value', 'ASC')->get(),
            "sy" => SchoolYear::orderBy('fin', 'DESC')->get(),
            "teachers" => $this->users->enseignants(),
        ])->layout('layouts.app', [
            'page' => "rating"
        ]);
    }

    public function mount()
    {

        if (!Auth::check()) {
            return redirect(route('login'));
        }
    }

    private function initForm()
    {
        $this->form['id'] = "";
        $this->form['valeur'] = "";
        $this->form['appreciation'] = "";
        $this->form['apprenant_id'] = "";
        $this->form['enseignant_id'] = "";
        $this->form['classe_id'] = "";
        $this->form['period_id'] = "";
        $this->form['matiere_id'] = "";
        $this->form['school_year_id'] = "";
    }

    private function getMatieres()
    {
        $courses = Cours::where('user_id', Auth::user()->id)->get();

        if ($courses) {
            foreach ($courses as $cours) {
                $trouvem = false;
                $trouvec = false;
                if ($this->matieres) {
                    foreach ($this->matieres as $item) {
                        if ($item['id'] === $cours->matiere['id']) {
                            $trouvem = true;
                        }
                    }
                }

                if ($this->classes) {
                    foreach ($this->classes as $item) {
                        if ($item['id'] === $cours->classe['id']) {
                            $trouvec = true;
                        }
                    }
                }

                if (!$trouvem) {
                    $this->matieres[] = $cours->matiere;
                }

                if (!$trouvec) {
                    $this->classes[] = $cours->classe;
                }
            }
        }
    }
}
