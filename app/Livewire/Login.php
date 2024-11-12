<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class Login extends Component
{
    #[Validate('required', message: 'Se requiere nombre de usuario')]
    public $user = '';

    #[Validate('required', message: 'Se requiere contraseña')]
    public $pass = '';

    public function login(){
        $this->validate(); 

        $credenciales = [
            'name' => $this -> user,
            'password' => $this -> pass,
        ];

        if(Auth::attempt($credenciales)){
            return $this->redirect('/dashboard', navigate: true);
        }else{
            session()->flash('error', 'Credenciales erroneas');
        }
    }

    public function render()
    {
        return view('livewire.login');
    }
}
