<?php

namespace App\Http\Livewire\Admin;

use App\Models\Appreciation;
use App\Models\Coefficient;
use App\Models\Internaute;
use App\Models\Period;
use App\Models\School;
use App\Models\SchoolYear;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Livewire\WithFileUploads;

class Parametres extends Component
{
    use WithFileUploads;

    public $config;
    public $etatApp = "list";
    public $etatCoef = "list";
    public $etatPeriod = "list";

    public $formApp = [
        'value' => "",
        'id' => null,
    ];


    public $formCoef = [
        'value' => "",
        'id' => null,
    ];

    public $formPeriod = [
        'value' => "",
        'id' => null,
    ];


    public $form = [
        'name' => "",
        'logo' => "",
        'icon' => "",
    ];

    public $anSco = [
        "debut" => "",
        "fin" => "",
        "id" => null,
    ];
    public $formAs = [
        "debut" => "",
        "fin" => "",
        "id" => null,
    ];

    public $school = [
        'name' => '',
        'adresse' => '',
        'email' => '',
        'tel' => '',
        'id' => null,
    ];

    public $logo;
    public $icon;

    public function backPeriod()
    {
        $this->etatPeriod = "list";
        $this->initFormPeriod();
    }

    public function newPeriod()
    {
        $this->etatPeriod = "add";
    }

    public function backCoef()
    {
        $this->etatCoef = "list";
        $this->initFormCoef();
    }

    public function newCoef()
    {
        $this->etatCoef = "add";
    }

    public function backApp()
    {
        $this->etatApp = "list";
        $this->initFormApp();
    }

    public function newApp()
    {
        $this->etatApp = "add";
    }

    public function editApp($id)
    {
        $this->etatApp = "add";

        $app = Appreciation::where('id', $id)->first();

        $this->formApp['id'] = $app->id;
        $this->formApp['value'] = $app->value;
    }

    public function deleteApp($id)
    {
        $app = Appreciation::where('id', $id)->first();

        $app->delete();

        $this->dispatchBrowserEvent("appreciationDeleted");
    }

    public function storeApp()
    {
        $this->validate([
            'formApp.value' => 'required'
        ]);

        if ($this->formApp['id']) {
            $app = Appreciation::where('id', $this->formApp['id'])->first();

            $app->value = $this->formApp['value'];
            $app->save();

            $this->dispatchBrowserEvent("appreciationUpdated");
        } else {

            Appreciation::create([
                "value" => $this->formApp['value']
            ]);

            $this->dispatchBrowserEvent("appreciationAdded");
        }
        $this->backApp();
    }

    public function storeCoef()
    {
        $this->validate([
            'formCoef.value' => 'required'
        ]);

        if ($this->formCoef['id']) {
            $app = Coefficient::where('id', $this->formCoef['id'])->first();

            $app->value = $this->formCoef['value'];
            $app->save();

            $this->dispatchBrowserEvent("coefficientUpdated");
        } else {

            Coefficient::create([
                "value" => $this->formCoef['value']
            ]);

            $this->dispatchBrowserEvent("coefficientAdded");
        }
        $this->backCoef();
    }

    public function editCoef($id)
    {
        $this->etatCoef = "add";

        $coef = Coefficient::where('id', $id)->first();

        $this->formCoef['id'] = $coef->id;
        $this->formCoef['value'] = $coef->value;
    }

    public function deleteCoef($id)
    {
        $app = Coefficient::where('id', $id)->first();

        $app->delete();

        $this->dispatchBrowserEvent("coefficientDeleted");
    }

    public function storePeriod()
    {
        $this->validate([
            'formPeriod.value' => 'required'
        ]);

        if ($this->formPeriod['id']) {
            $app = Period::where('id', $this->formPeriod['id'])->first();

            $app->value = $this->formPeriod['value'];
            $app->save();

            $this->dispatchBrowserEvent("periodUpdated");
        } else {

            Period::create([
                "value" => $this->formPeriod['value']
            ]);

            $this->dispatchBrowserEvent("periodAdded");
        }
        $this->backPeriod();
    }

    public function editPeriod($id)
    {
        $this->etatPeriod = "add";

        $period = Period::where('id', $id)->first();

        $this->formPeriod['id'] = $period->id;
        $this->formPeriod['value'] = $period->value;
    }

    public function deletePeriod($id)
    {
        $app = Period::where('id', $id)->first();

        $app->delete();

        $this->dispatchBrowserEvent("periodDeleted");
    }

    public function changeVars()
    {
        $path = base_path('.env');

        if (isset($this->form['name'])) {
            if (file_exists($path)) {
                file_put_contents($path, str_replace(
                    'APP_NAME=' . config('app.name'),
                    'APP_NAME=' . $this->form['name'],
                    file_get_contents($path)
                ));
            }
        }

        if ($this->logo) {
            $this->validate([
                'logo' => 'image'
            ]);
            $imageName = 'logo.png';

            $this->logo->storeAs('public/images', $imageName);
        }

        if ($this->icon) {
            $this->validate([
                'icon' => 'image'
            ]);
            $imageName = 'icon.png';

            $this->icon->storeAs('public/images', $imageName);
        }

        $this->dispatchBrowserEvent('updateSetting');
    }

    public function saveAnSco()
    {
        $this->validate([
            'anSco.debut' => 'required',
            'anSco.fin' => 'required',
        ]);

        if ($this->anSco['id']) {
            $as = SchoolYear::where('id', $this->anSco['id'])->first();

            $as->debut = $this->anSco['debut'];
            $as->fin = $this->anSco['fin'];

            $as->save();

            $this->dispatchBrowserEvent("schoolYearUpdated");

            $this->init();
        } else {
            SchoolYear::create([
                'debut' => $this->anSco['debut'],
                'fin' => $this->anSco['fin'],
                'status' => 0,
            ]);

            $this->dispatchBrowserEvent("schoolYearAdded");
        }
    }
    public function storeAnSco()
    {
        $this->validate([
            'formAs.debut' => 'required',
            'formAs.fin' => 'required',
        ]);
        SchoolYear::create([
            'debut' => $this->formAs['debut'],
            'fin' => $this->formAs['fin'],
            'status' => 0,
        ]);

        $this->dispatchBrowserEvent("schoolYearAdded");
    }

    public function saveSchool()
    {
        $this->validate([
            'school.name' => 'required',
            'school.adresse' => 'required',
            'school.email' => 'nullable|email',
            'school.tel' => ['nullable', 'min:9', 'max:9', 'regex:/^[33|70|75|76|77|78]+[0-9]{7}$/'],
        ]);

        if ($this->school['id']) {
            $sch = School::where('id', $this->school['id'])->first();

            $sch->name = $this->school['name'];
            $sch->adresse = $this->school['adresse'];
            $sch->email = $this->school['email'];
            $sch->tel = $this->school['tel'];

            $sch->save();

            $this->dispatchBrowserEvent("schoolUpdated");
            $this->init();
        } else {
            School::create([
                'name' => $this->school['name'],
                'adresse' => $this->school['adresse'],
                'email' => $this->school['email'],
                'tel' => $this->school['tel'],
            ]);

            $this->dispatchBrowserEvent('schoolAdded');
        }
    }

    public function render()
    {

        $this->form['logo'] = config("app.logo");
        $this->form['icon'] = config("app.icon");

        return view('livewire.admin.parametre.parametres', [
            'apps' => Appreciation::orderBy('value', 'ASC')->get(),
            'coefs' => Coefficient::orderBy('value', 'ASC')->get(),
            'periods' => Period::orderBy('value', 'ASC')->get(),
        ])->layout('layouts.app', [
            'page' => "general"
        ]);
    }

    public function mount()
    {
        if (!Auth::check()) {
            return redirect(route('login'));
        }

        $this->config = new Internaute();
        $this->init();

        $this->form['name'] = config("app.name");
    }

    private function init()
    {
        $as = $this->config->anneeScolaire();

        if ($as) {

            $this->anSco['id'] = $as->id;
            $this->anSco['debut'] = $as->debut;
            $this->anSco['fin'] = $as->fin;
        }

        $sch = $this->config->ecole();

        if ($sch) {
            $this->school['id'] = $sch->id;
            $this->school['name'] = $sch->name;
            $this->school['adresse'] = $sch->adresse;
            $this->school['email'] = $sch->email;
            $this->school['tel'] = $sch->tel;
        }
    }

    private function initFormApp()
    {
        $this->formApp['value'] = "";
        $this->formApp['id'] = null;
    }

    private function initFormCoef()
    {
        $this->formCoef['value'] = "";
        $this->formCoef['id'] = null;
    }

    private function initFormPeriod()
    {
        $this->formPeriod['value'] = "";
        $this->formPeriod['id'] = null;
    }
}
