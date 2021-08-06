<?php

namespace App\Http\Livewire\Admin;

use App\Models\Internaute;
use App\Models\Role;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class Users extends Component
{
    public $etat = "list";
    public $roles;
    public $user;
    public $astuce;
    public $permissions = [];

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
        'permissions' => [],
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
        'form.role' => 'required',
        'form.permissions' => 'required',
    ];

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
        $this->form['role'] = $this->user->roles ? $this->user->roles[0]->id : null;

        $this->permissions = $this->user->roles ? $this->user->roles[0]->permissions : [];

        $this->etat = "show";
    }


    public function save()
    {

        $this->form['permissions'] = [];

        foreach ($this->permissions as $value) {
            if ($value['id'] && $value['id'] !== true) {
                $this->form['permissions'][] = $value['id'];
            }
        }

        if (!$this->form['permissions']) {
            $this->dispatchBrowserEvent('noPermissions');
        }

        $this->validate();

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

        $user->roles()->attach($this->form['role']);
        $user->save();

        foreach ($this->form['permissions'] as $value) {
            $user->permissions()->attach($value);
            $user->save();
        }

        $this->dispatchBrowserEvent('userAdded');
        $this->etat = "list";
    }

    public function addNew()
    {
        $this->etat = "add";
    }

    public function back()
    {
        $this->etat = "list";
    }

    public function getPermissions()
    {
        $role = Role::where('id', $this->form['role'])->first();

        $this->permissions = [];
        if ($role) {
            foreach ($role->permissions as $permission) {
                $this->permissions[] = ["id" => $permission->id, "name" => $permission->name];
            }
        }
    }

    public function deletePermission($key)
    {
        unset($this->permissions[$key]);
    }


    public function render()
    {
        $this->astuce = new Internaute();
        $this->roles = Role::all();

        return view('livewire.admin.users.users', [
            'users' => $this->astuce->personal(),
        ])->layout('layouts.app', [
            'page' => "users"
        ]);
    }

    public function mount()
    {
        if (!Auth::check()) {
            return redirect(route('login'));
        }
    }
}
