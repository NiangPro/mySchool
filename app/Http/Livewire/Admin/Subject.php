<?php

namespace App\Http\Livewire\Admin;

use App\Models\Matiere;
use App\Models\TypeMatiere;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Subject extends Component
{
    public $form = [
        'name' => "",
        'libelle' => "",
        'type_matiere_id' => "",
        'coefficient' => "",
        'id' => null,
    ];

    public $etat = "list";
    public $tms;

    protected $rules = [
        'form.name' => 'required',
        'form.libelle' => 'required',
        'form.type_matiere_id' => 'required',
        'form.coefficient' => 'required',
    ];

    public function back()
    {
        $this->etat = "list";
        $this->formInit();
    }

    public function store()
    {
        $this->validate();

        if ($this->form['id']) {
            $tm = Matiere::where('id', $this->form['id'])->first();

            $tm->name = $this->form['name'];
            $tm->libelle = $this->form['libelle'];
            $tm->type_matiere_id = $this->form['type_matiere_id'];
            $tm->coefficient = $this->form['coefficient'];
            $tm->save();

            $this->dispatchBrowserEvent("subjectUpdated");

            $this->back();
        } else {

            Matiere::create([
                'name' => $this->form['name'],
                'libelle' => $this->form['libelle'],
                'type_matiere_id' => $this->form['type_matiere_id'],
                'coefficient' => $this->form['coefficient'],
            ]);

            $this->formInit();
            $this->dispatchBrowserEvent("subjectAdded");
        }
    }

    public function edit($id)
    {
        $tm = Matiere::where('id', $id)->first();

        $this->form['id'] = $tm->id;
        $this->form['name'] = $tm->name;
        $this->form['libelle'] = $tm->libelle;
        $this->form['type_matiere_id'] = $tm->type_matiere_id;
        $this->form['coefficient'] = $tm->coefficient;

        $this->etat = "edit";
    }

    public function render()
    {
        $this->tms = TypeMatiere::orderBy('name', 'DESC')->get();
        return view('livewire.admin.matiere.subject', [
            'matieres' => Matiere::orderBy('name', 'ASC')->get()
        ])->layout('layouts.app', [
            'page' => "subject"
        ]);
    }

    public function mount()
    {
        if (!Auth::check()) {
            return redirect(route('login'));
        }
    }

    private function formInit()
    {
        $this->form['name'] = "";
        $this->form['libelle'] = "";
        $this->form['type_matiere_id'] = "";
        $this->form['coefficient'] = "";
        $this->form['id'] = null;
    }
}
