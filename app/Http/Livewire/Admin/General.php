<?php

namespace App\Http\Livewire\Admin;

use App\Models\School;
use App\Models\SchoolYear;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;

class General extends Component
{
    use WithFileUploads;

    public $data = [
        'name',
        'logo',
        'debut_as',
        'fin_as',
    ];
    public $logo;
    public $icon;

    public $ecole = [
        'name' => '',
        'adresse' => '',
        'tel' => '',
        'email' => '',
    ];

    public $as;
    public $schoolInfo;

    public $etatSchoolYear = "list";
    public $etatSchool = "list";

    public function back()
    {
        $this->schoolYear();
        $this->etatSchoolYear = "list";
    }

    public function backName()
    {
        $this->schoolName();
        $this->etatSchool = "list";
    }

    public function newSchoolYear()
    {
        $this->etatSchoolYear = "add";
        $this->data['debut_as'] = "";
        $this->data['fin_as'] = "";
    }

    public function newSchool()
    {
        $this->etatSchool = "add";
        $this->ecole['name'] = "";
        $this->ecole['adresse'] = "";
        $this->ecole['email'] = "";
        $this->ecole['tel'] = "";
    }

    public function addSchoolYear()
    {
        $this->validate([
            'data.debut_as' => 'required',
            'data.fin_as' => 'required',
        ]);

        SchoolYear::create([
            "debut" => $this->data['debut_as'],
            "fin" => $this->data['fin_as'],
        ]);

        $this->dispatchBrowserEvent("schoolYearAdded");
        $this->etatSchoolYear = "list";
    }

    public function addSchool()
    {
        $this->validate([
            'ecole.name' => 'required',
            'ecole.adresse' => 'required',
            'ecole.tel' => 'required',
            'ecole.email' => 'nullable',
        ]);

        School::create([
            "name" => $this->ecole['name'],
            "adresse" => $this->ecole['adresse'],
            "tel" => $this->ecole['tel'],
            "email" => $this->ecole['email'],
        ]);

        $this->dispatchBrowserEvent("schoolAdded");
        $this->etatSchool = "list";
    }

    public function modifySchool()
    {
        $this->validate([
            'ecole.name' => 'required',
            'ecole.adresse' => 'required',
            'ecole.tel' => 'required',
            'ecole.email' => 'nullable',
        ]);

        if ($this->schoolInfo->id) {
            $as = School::where('id', $this->schoolInfo->id)->first();
            $as->name = $this->ecole['name'];
            $as->tel = $this->ecole['tel'];
            $as->adresse = $this->ecole['adresse'];
            $as->email = $this->ecole['email'];

            $as->save();

            $this->schoolInfo = $as;

            $this->dispatchBrowserEvent("schoolUpdated");
            $this->schoolName();

        }
    }

    public function changeVars()
    {
        $path = base_path('.env');

        if (isset($this->data['name'])) {
            if (file_exists($path)) {
                file_put_contents($path, str_replace(
                    'APP_NAME=' . config('app.name'),
                    'APP_NAME=' . $this->data['name'],
                    file_get_contents($path)
                ));
            }
        }

        if ($this->logo) {
            $this->validate([
                'logo' => 'image|max:1024'
            ]);
            $imageName = 'logo.png';

            $this->logo->storeAs('public/images', $imageName);
        }

        if ($this->icon) {
            $this->validate([
                'icon' => 'image|max:1024'
            ]);
            $imageName = 'icon.png';

            $this->icon->storeAs('public/images', $imageName);
        }

        $this->dispatchBrowserEvent('updateSetting');
    }

    public function modifySchoolYear()
    {
        $this->validate([
            'data.debut_as' => 'required',
            'data.fin_as' => 'required',
        ]);

        if($this->as->id){
            $as = SchoolYear::where('id', $this->as->id)->first();
            $as->debut = $this->data['debut_as'];
            $as->fin = $this->data['fin_as'];

            $as->save();

            $this->as = $as;

            $this->schoolYear();

            $this->dispatchBrowserEvent("schoolYearUpdated");
        }


    }

    public function render()
    {

        $this->data['name'] = config('app.name');
        $this->data['logo'] = config('app.logo');
        $this->data['icon'] = config('app.icon');

        $this->schoolYear();
        $this->schoolName();

        return view('livewire.admin.general.general', [

        ])->layout('layouts.app', [
            'page' => "general"
        ]);
    }

    public function mount()
    {
        if (!Auth::check()) {
            return redirect(route('login'));
        }
    }

    private function schoolYear()
    {
        $this->as = SchoolYear::orderBy('id', 'DESC')->first();

        if ($this->as) {
            $this->data['debut_as'] = $this->as->debut;
            $this->data['fin_as'] = $this->as->fin;
        }else{
            $this->newSchoolYear();
        }
    }

    private function schoolName()
    {
        $this->schoolInfo = School::orderBy('id', 'DESC')->first();

        if ($this->schoolInfo) {
            $this->ecole['name'] = $this->schoolInfo->name;
            $this->ecole['adresse'] = $this->schoolInfo->adresse;
            $this->ecole['tel'] = $this->schoolInfo->tel;
            $this->ecole['email'] = $this->schoolInfo->email;
        } else {
            $this->newSchool();
        }
    }
}
