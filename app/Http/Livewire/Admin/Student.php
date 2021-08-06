<?php

namespace App\Http\Livewire\Admin;

use App\Models\Classe;
use App\Models\Internaute;
use App\Models\Role;
use App\Models\SchoolYear;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class Student extends Component
{
    public $etat = 'list';
    public $etatParent;
    public $users;
    public $user;
    public $parents;
    public $classes;

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
        'father_name' => '',
        'mother_name' => '',
        'tel' => '',
        'class' => '',
        'photo' => '',
        'parent' => [
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
            'id' => [],
        ],
    ];

    protected $rules = [
        'form.prenom' => 'required',
        'form.nom' => 'required',
        'form.nationalite' => 'required',
        'form.sexe' => 'required',
        'form.adresse' => 'required',
        'form.datenais' => 'required',
        'form.lieunais' => 'required',
        'form.class' => 'required',
        'form.father_name' => 'required',
        'form.mother_name' => 'required',
        'form.email' => 'nullable',
        'form.tel' => ['nullable', 'min:9', 'max:9', 'regex:/^[33|70|75|76|77|78]+[0-9]{7}$/']
    ];

    public function addNew()
    {
        $this->etat = 'add';
    }

    public function back()
    {
        $this->etat = 'list';
        $this->etatParent = null;

        $this->parentInitForm();
        $this->parentInitFormId();
        $this->formInit();
    }

    public function newParent()
    {
        $this->etatParent = 'new';
        $this->parentInitFormId();
    }

    public function existingParent()
    {
        $this->etatParent = 'exist';
        $this->parentInitFormId();
    }

    public function show($id)
    {
        $this->user = User::where('id', $id)->first();
        $this->etat = "show";

        $this->form['prenom'] = $this->user->prenom;
        $this->form['nom'] = $this->user->nom;
        $this->form['username'] = $this->user->username;
        $this->form['tel'] = $this->user->tel;
        $this->form['sexe'] = $this->user->sexe;
        $this->form['email'] = $this->user->email;
        $this->form['adresse'] = $this->user->adresse;
        $this->form['datenais'] = $this->user->datenais;
        $this->form['lieunais'] = $this->user->lieunais;
        $this->form['nationalite'] = $this->user->nationalite;
        $this->form['father_name'] = $this->user->father_name;
        $this->form['mother_name'] = $this->user->mother_name;
        $this->form['class'] = $this->lastItem($this->user->classes)->id;
        $this->form['parent']['id'] = $this->user->tuteur->id;
    }

    public function editTutor()
    {
        // insertion de la relation apprenant-tuteur
        $child = User::where('id', $this->user->id)->first();
        $child->parent_id = $this->form['parent']['id'];
        $child->save();


        $this->dispatchBrowserEvent("studentTutorUpdated");
        $this->show($this->user->id);
    }

    public function update()
    {
        // validation des champs de l'apprenant
        $this->validate();
        // l'apprenant
        $user = User::where('id', $this->user->id)->first();
        // modification des informations de l'apprenant
        $user->prenom = $this->form['prenom'];
        $user->nom = $this->form['nom'];
        $user->nationalite = $this->form['nationalite'];
        $user->sexe = $this->form['sexe'];
        $user->adresse = $this->form['adresse'];
        $user->datenais = $this->form['datenais'];
        $user->lieunais = $this->form['lieunais'];
        $user->email = $this->form['email'];
        $user->father_name = $this->form['father_name'];
        $user->mother_name = $this->form['mother_name'];
        $user->tel = $this->form['tel'];

        $user->save();
        // detachement et attachement d'une classe
        // Année scolaire
        $as = $this->users->anneeScolaire();

        $user->classes()->detach($this->lastItem($this->user->classes)->id, ["school_year_id" => $as->id]);
        $user->classes()->attach($this->form['class'], ["school_year_id" => $as->id]);
        $user->save();

        $this->dispatchBrowserEvent("studentUpdated");
        $this->show($user->id);
    }

    public function store()
    {
        $this->validate();

        $tutor = [];

        if ($this->form['parent']['id']) {
        } else {
            $this->etatParent = 'new';

            $this->validate([
                'form.parent.prenom' => 'required',
                'form.parent.nom' => 'required',
                'form.parent.nationalite' => 'required',
                'form.parent.sexe' => 'required',
                'form.parent.adresse' => 'required',
                'form.parent.datenais' => 'required',
                'form.parent.lieunais' => 'required',
                'form.parent.email' => 'nullable',
                'form.parent.tel' => ['required', 'min:9', 'max:9', 'regex:/^[33|70|75|76|77|78]+[0-9]{7}$/']
            ]);

            // ajout de nouveau professeur
            $tutor = new User();

            $tutor->prenom = $this->form['parent']['prenom'];
            $tutor->nom = $this->form['parent']['nom'];
            $tutor->nationalite = $this->form['parent']['nationalite'];
            $tutor->sexe = $this->form['parent']['sexe'];
            $tutor->photo = $this->form['parent']['sexe'] === "Masculin" ? "user-male.png" : "user-female.png";
            $tutor->adresse = $this->form['parent']['adresse'];
            $tutor->datenais = $this->form['parent']['datenais'];
            $tutor->lieunais = $this->form['parent']['lieunais'];
            $tutor->email = $this->form['parent']['email'];
            $tutor->tel = $this->form['parent']['tel'];
            $tutor->password = Hash::make("myschool@1");
            $tutor->username = strtolower(substr($this->form['parent']['prenom'], 0, 1)) . strtolower(substr($this->form['parent']['nom'], 0, 1)) . $this->form['parent']['tel'];

            $tutor->save();

            $r = Role::where('slug', "tuteur")->first();
            if ($r) {
                $tutor->roles()->attach($r->id);
                $tutor->save();
            }
        }

        // enregistrement de l'apprenant
        $lastuser = User::orderBy('id', 'DESC')->first();
        $user = new User();

        $user->username = strtolower(substr($this->form['prenom'], 0, 1)) . strtolower(substr($this->form['nom'], 0, 1)) . "0000" . ($lastuser->id + 1);

        $user->prenom = $this->form['prenom'];
        $user->nom = $this->form['nom'];
        $user->nationalite = $this->form['nationalite'];
        $user->sexe = $this->form['sexe'];
        $user->adresse = $this->form['adresse'];
        $user->datenais = $this->form['datenais'];
        $user->lieunais = $this->form['lieunais'];
        $user->photo = $this->form['sexe'] === "Masculin" ? "user-male.png" : "user-female.png";
        $user->email = $this->form['email'];
        $user->father_name = $this->form['father_name'];
        $user->mother_name = $this->form['mother_name'];
        $user->password = Hash::make("myschool@1");
        $user->tel = $this->form['tel'];

        $user->save();

        // role de l'apprenant
        $role = Role::where('slug', "apprenant")->first();
        if ($role) {
            $user->roles()->attach($role->id);
        }

        // insertion de la relation apprenant-tuteur
        if ($this->form['parent']['id']) {
            $t = User::where('id', $this->form['parent']['id'])->first();
            $t->enfants()->save($user);
        } else {
            $t = User::where('id', $tutor->id)->first();
            $t->enfants()->save($user);
        }

        // Année scolaire
        $as = $this->users->anneeScolaire();

        $user->classes()->attach($this->form['class'], ["school_year_id" => $as->id]);
        $user->save();

        $this->dispatchBrowserEvent("studentAdded");

        $this->back();
    }

    public function render()
    {
        $this->users = new Internaute();
        $this->classes = Classe::orderBy('name', 'ASC')->get();
        $this->parents = $this->users->tutors();


        return view('livewire.admin.apprenant.student', [
            'apprenants' => $this->users->students()
        ])->layout('layouts.app', [
            'page' => "student"
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
        $this->form['username'] = '';
        $this->form['prenom'] = '';
        $this->form['nom'] = '';
        $this->form['nationalite'] = '';
        $this->form['sexe'] = '';
        $this->form['adresse'] = '';
        $this->form['datenais'] = '';
        $this->form['lieunais'] = '';
        $this->form['email'] = '';
        $this->form['tel'] = '';
        $this->form['class'] = '';
        $this->form['photo'] = '';
        $this->form['father_name'] = '';
        $this->form['mother_name'] = '';
    }

    private function parentInitForm()
    {
        $this->form['parent']['username'] = '';
        $this->form['parent']['prenom'] = '';
        $this->form['parent']['nom'] = '';
        $this->form['parent']['nationalite'] = '';
        $this->form['parent']['sexe'] = '';
        $this->form['parent']['adresse'] = '';
        $this->form['parent']['datenais'] = '';
        $this->form['parent']['lieunais'] = '';
        $this->form['parent']['email'] = '';
        $this->form['parent']['tel'] = '';
        $this->form['parent']['photo'] = '';
    }

    private function parentInitFormId()
    {
        $this->form['parent']['id'] = [];
    }

    public function lastItem($classes)
    {
        $class = false;

        foreach ($classes as $value) {
            $class = $value;
        }
        return $class;
    }
}
