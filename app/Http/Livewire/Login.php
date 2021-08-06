<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
    public $form = [
        "username" => "",
        "password" => "",
    ];

    protected $rules = [
        "form.username" => "required",
        "form.password" => "required",
    ];

    public function mount()
    {
        if(Auth::check()){
            return redirect(route('home'));
        }
    }

    public function connecter()
    {
        $this->validate();

        if(Auth::attempt(['username' => $this->form['username'], 'password' => $this->form['password']]))
        {
            return redirect(route('home'));
        }else{
            $this->dispatchBrowserEvent('errorLogin');
        }

    }

    public function render()
    {
        return view('livewire.login', [

        ])->layout('layouts.app_login');
    }

    public function username()
    {
        return 'username';
    }
}
