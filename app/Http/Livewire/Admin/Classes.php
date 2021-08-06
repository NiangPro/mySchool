<?php

namespace App\Http\Livewire\Admin;

use App\Models\Classe;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Classes extends Component
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

    public function store()
    {
        $this->validate();

        $classe = new Classe();

        $classe->name = $this->form['name'];
        $classe->libelle = $this->form['libelle'];

        $classe->save();

        $this->formInit();

        $this->dispatchBrowserEvent('classeAdded');
    }

    public function edit($id)
    {
        $classe = Classe::where('id', $id)->first();

        $this->form['id'] = $classe->id;
        $this->form['name'] = $classe->name;
        $this->form['libelle'] = $classe->libelle;

        $this->etat = "edit";
    }

    public function back()
    {
        $this->etat = "list";
        $this->formInit();
    }

    public function update()
    {
        if($this->form['id']){
            $this->validate();

            $classe = Classe::where('id', $this->form['id'])->first();

            $classe->name = $this->form['name'];
            $classe->libelle = $this->form['libelle'];

            $classe->save();

            $this->formInit();

            $this->etat = "list";

            $this->dispatchBrowserEvent('classeUpdated');
        }
    }

    public function delete($id)
    {
        $classe = Classe::where('id', $id)->first();

        $classe->delete();

        $this->dispatchBrowserEvent("classeDeleted");
    }

    public function render()
    {
        return view('livewire.admin.classes.classes', [
            'classes' => Classe::orderBy('name', 'ASC')->get()
        ])->layout('layouts.app', [
            'page' => "class"
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
        $this->form['id'] = null;
    }
}
