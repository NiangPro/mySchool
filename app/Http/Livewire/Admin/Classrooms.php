<?php

namespace App\Http\Livewire\Admin;

use App\Models\Classroom;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Classrooms extends Component
{
    public $form = [
        'name' => "",
        'capacity' => "",
        'id' => null,
    ];

    public $etat = "list";

    protected $rules = [
        'form.name' => 'required',
        'form.capacity' => 'required',
    ];

    public function store()
    {
        $this->validate();

        $classroom = new Classroom();

        $classroom->name = $this->form['name'];
        $classroom->capacity = $this->form['capacity'];

        $classroom->save();

        $this->formInit();

        $this->dispatchBrowserEvent('classroomAdded');
    }

    public function edit($id)
    {
        $classroom = Classroom::where('id', $id)->first();

        $this->form['id'] = $classroom->id;
        $this->form['name'] = $classroom->name;
        $this->form['capacity'] = $classroom->capacity;

        $this->etat = "edit";
    }

    public function back()
    {
        $this->etat = "list";
    }

    public function update()
    {
        if ($this->form['id']) {
            $this->validate();

            $classroom = Classroom::where('id', $this->form['id'])->first();

            $classroom->name = $this->form['name'];
            $classroom->capacity = $this->form['capacity'];

            $classroom->save();

            $this->formInit();

            $this->etat = "list";

            $this->dispatchBrowserEvent('classroomUpdated');
        }
    }

    public function delete($id)
    {
        $classroom = Classroom::where('id', $id)->first();

        $classroom->delete();

        $this->dispatchBrowserEvent("classroomDeleted");
    }

    public function render()
    {
        return view('livewire.admin.salles.classrooms', [
            'classrooms' => Classroom::orderBy('id', 'DESC')->get()
        ])->layout('layouts.app', [
            'page' => "classroom"
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
        $this->form['capacity'] = "";
    }
}
