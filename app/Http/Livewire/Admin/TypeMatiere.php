<?php

namespace App\Http\Livewire\Admin;

use App\Models\TypeMatiere as ModelsTypeMatiere;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class TypeMatiere extends Component
{
    public $form = [
        'name' => "",
        'libelle' => "",
        'id' => null,
    ];

    public $etat = "list";

    protected $rules = [
        'form.name' => 'required',
        'form.libelle' => 'required',
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
            $tm = ModelsTypeMatiere::where('id', $this->form['id'])->first();

            $tm->name = $this->form['name'];
            $tm->libelle = $this->form['libelle'];
            $tm->save();

            $this->dispatchBrowserEvent("subjectTypeUpdated");

            $this->back();
        } else {

            ModelsTypeMatiere::create([
                'name' => $this->form['name'],
                'libelle' => $this->form['libelle'],
            ]);

            $this->formInit();
            $this->dispatchBrowserEvent("subjectTypeAdded");
        }


    }

    public function edit($id)
    {
        $tm = ModelsTypeMatiere::where('id', $id)->first();

        $this->form['id'] = $tm->id;
        $this->form['name'] = $tm->name;
        $this->form['libelle'] = $tm->libelle;

        $this->etat = "edit";
    }

    public function render()
    {
        return view(
        'livewire.admin.typeMatiere.type-matiere', [
            'matieres' => ModelsTypeMatiere::orderBy('name', 'ASC')->get()
        ])->layout('layouts.app', [
            'page' => "subjectType"
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
    }
}
