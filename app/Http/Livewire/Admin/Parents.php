<?php

namespace App\Http\Livewire\Admin;

use App\Models\Internaute;
use App\Models\Role;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class Parents extends Component
{
    public $etat = 'list';
    public $user;

    public $form = [
        'username' => '',
        'prenom' => '',
        'nom' => '',
        'nationalite' => '',
        'sexe' => '',
        'adresse' => '',
        'datenais' => '',
        'lieunais' => '',
        'email' => '',
        'tel' => '',
        'photo' => '',
    ];

    protected $rules = [
        'form.prenom' => 'required',
        'form.nom' => 'required',
        'form.nationalite' => 'required',
        'form.sexe' => 'required',
        'form.adresse' => 'required',
        'form.datenais' => 'required',
        'form.lieunais' => 'required',
        'form.email' => 'nullable',
        'form.tel' => ['required', 'min:9', 'max:9', 'regex:/^[33|70|75|76|77|78]+[0-9]{7}$/']
    ];

    public function addNew()
    {
        $this->etat = "add";
    }

    public function back()
    {
        $this->etat = "list";
    }

    public function store()
    {

        $this->validate();

        $this->form['username'] = strtolower(substr($this->form['prenom'], 0, 1)) . strtolower(substr($this->form['nom'], 0, 1)) . $this->form['tel'];

        $user = new User();

        $user->username = $this->form['username'];
        $user->prenom = $this->form['prenom'];
        $user->nom = $this->form['nom'];
        $user->sexe = $this->form['sexe'];
        $user->email = $this->form['email'];
        $user->tel = $this->form['tel'];
        $user->lieunais = $this->form['lieunais'];
        $user->datenais = $this->form['datenais'];
        $user->adresse = $this->form['adresse'];
        $user->nationalite = $this->form['nationalite'];
        $user->password = Hash::make("myschool@1");
        $user->photo = $this->form['sexe'] === "Masculin" ? "user-male.png" : "user-female.png";

        $user->save();

        $role = Role::where('slug', 'tuteur')->first();

        $user->roles()->attach($role->id);
        $user->save();

        foreach ($role->permissions as $value) {
            $user->permissions()->attach($value->id);
            $user->save();
        }

        $this->dispatchBrowserEvent('parentAdded');
        $this->etat = "list";
    }

    public function show($id)
    {
        $this->user = User::where('id', $id)->first();
        $this->form['username'] = $this->user->username;
        $this->form['prenom'] = $this->user->prenom;
        $this->form['nom'] = $this->user->nom;
        $this->form['sexe'] = $this->user->sexe;
        $this->form['nationalite'] = $this->user->nationalite;
        $this->form['email'] = $this->user->email;
        $this->form['adresse'] = $this->user->adresse;
        $this->form['tel'] = $this->user->tel;
        $this->form['datenais'] = $this->user->datenais;
        $this->form['lieunais'] = $this->user->lieunais;

        $this->etat = "show";
    }

    public function update()
    {
        $user = User::where('id', $this->user->id)->first();

        $user->username = $this->form['username'];
        $user->prenom = $this->form['prenom'];
        $user->nom = $this->form['nom'];
        $user->sexe = $this->form['sexe'];
        $user->nationalite = $this->form['nationalite'];
        $user->email = $this->form['email'];
        $user->adresse = $this->form['adresse'];
        $user->tel = $this->form['tel'];
        $user->datenais = $this->form['datenais'];
        $user->lieunais = $this->form['lieunais'];

        $user->save();

        $this->user = $user;
        $this->dispatchBrowserEvent('parentUpdated');
    }

    public function render()
    {
        $users = new Internaute();

        return view('livewire.admin.parent.parents', [
            'parents' => $users->tutors()
        ])->layout('layouts.app', [
            'page' => "tutor"
        ]);
    }

    public function mount()
    {
        if (!Auth::check()) {
            return redirect(route('login'));
        }
    }
}
