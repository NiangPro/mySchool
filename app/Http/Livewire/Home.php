<?php

namespace App\Http\Livewire;

use App\Models\Classe;
use App\Models\Classroom;
use App\Models\Internaute;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;

class Home extends Component
{
    public $users;

    public function mount()
    {
        if (!Auth::check()) {
            return redirect(route('login'));
        }
    }

    public function render()
    {
        $this->users = new Internaute();

        $countClass = Classe::count();
        $countClassroom = Classroom::count();


        return view('livewire.home', [
            'countClass' => $countClass,
            'countClassroom' => $countClassroom,
            'countTeacher' => count($this->users->enseignants()),
            'countStudent' => count($this->users->students()),
            'cours' => $this->users->getCourses(),
            'jour' => $this->users->getToDay(),
            'boysGirls' => $this->users->getBoysAndGirls(),
            'data' => $this->users->teacherTimetable(),
            'dataStudent' => $this->users->studentTimetable(),
        ])->layout('layouts.app', [
            'page' => 'home',
        ]);
    }
}
