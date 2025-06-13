<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;


class RegisterUser extends Component
{
    public $name, $email, $password, $password_confirmation, $type;

    protected $rules = [
        'name' => 'required|min:3',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:6|same:password_confirmation',
        'password_confirmation' => 'required|min:6',
        'type' => 'required',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function register()
    {
        $validated = $this->validate();

        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'type' => (int) $this->type
        ]);

        session()->flash('message', 'Usuario registrado exitosamente.');
        $this->reset(); // Limpia los campos
    }

    protected $messages = [
        'name.required' => 'El nombre es obligatorio.',
        'name.min' => 'El nombre debe tener al menos :min caracteres.',

        'email.required' => 'El correo es obligatorio.',
        'email.email' => 'Debes ingresar un correo válido.',
        'email.unique' => 'Este correo ya está registrado.',

        'password.required' => 'La contraseña es obligatoria.',
        'password.min' => 'La contraseña debe tener al menos :min caracteres.',
        'password.same' => 'Las contraseñas no coinciden.',

        'password_confirmation.required' => 'Por favor confirma la contraseña.',
        'password_confirmation.min' => 'La confirmación debe tener al menos :min caracteres.',

        'type.required' => 'El tipo es obligatorio.',
    ];

    public function render()
    {
        return view('livewire.register-user');
    }
}
