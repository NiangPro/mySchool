<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class Profil extends Component
{
    public $roles;
    public $role;
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
        'password' => '',
        'password_confirmation' => '',
        'role' => '',
    ];

    protected $rules = [
        'form.username' => 'required',
        'form.prenom' => 'required',
        'form.nom' => 'required',
        'form.nationalite' => 'required',
        'form.sexe' => 'required',
        'form.adresse' => 'required',
        'form.datenais' => 'required',
        'form.lieunais' => 'required',
        'form.email' => 'nullable',
        'form.tel' => ['required', 'min:9', 'max:9', 'regex:/^[33|70|75|76|77|78]+[0-9]{7}$/'],
    ];

    protected $messages = [
        "form.password.confirmed" => "Mots de passe différents",
        "form.password.required" => "Ce champ est requis",
        "form.password.min" => "Ce champ doit contenir minimum 6 caractères",
    ];

    public function editPassword()
    {
        $this->validate([
            "form.password" =>  ['required', "min:6", 'confirmed']
        ]);

        $user = User::where('id', Auth::user()->id)->first();
        $user->password = Hash::make($this->form['password']);

        $user->save();

        $this->dispatchBrowserEvent("passwordUpdated");
    }

    public function update()
    {
        $this->validate();
        $user = User::where('id', Auth::user()->id)->first();
        $login = User::where('username', $this->form['username'])->first();
        if ($login) {
            $this->dispatchBrowserEvent("loginAlreadyExist");
        } else {
            $user->username = $this->form['username'];
            $user->prenom = $this->form['prenom'];
            $user->nom = $this->form['nom'];
            $user->nationalite = $this->form['nationalite'];
            $user->nationalite = $this->form['nationalite'];
            $user->sexe = $this->form['sexe'];
            $user->adresse = $this->form['adresse'];
            $user->datenais = $this->form['datenais'];
            $user->lieunais = $this->form['lieunais'];
            $user->email = $this->form['email'];
            $user->tel = $this->form['tel'];

            $user->save();
            $this->dispatchBrowserEvent("userUpdated");
        }
    }

    public function render()
    {
        $this->role = Auth::user()->roles[0];
        return view('livewire.admin.profil.profil', [
            "user" => Auth::user()
        ])->layout('layouts.app', [
            'page' => "profile"
        ]);;
    }

    public function mount()
    {
        if (!Auth::check()) {
            return redirect(route('login'));
        }
        $this->init();
    }

    public function init()
    {
        $this->form['username'] = Auth::user()->username;
        $this->form['prenom'] = Auth::user()->prenom;
        $this->form['nom'] = Auth::user()->nom;
        $this->form['sexe'] = Auth::user()->sexe;
        $this->form['nationalite'] = Auth::user()->nationalite;
        $this->form['email'] = Auth::user()->email;
        $this->form['adresse'] = Auth::user()->adresse;
        $this->form['tel'] = Auth::user()->tel;
        $this->form['datenais'] = Auth::user()->datenais;
        $this->form['lieunais'] = Auth::user()->lieunais;
        $this->form['role'] = Auth::user()->roles ? Auth::user()->roles[0]->id : null;
    }
}
