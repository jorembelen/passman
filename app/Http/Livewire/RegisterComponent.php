<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;

class RegisterComponent extends Component
{
    public $name, $username, $email, $password, $password_confirmation;

    public function register()
    {
        $data = $this->validate([
            'name' => 'required',
            'username' => 'required|unique:users,username',
            'email' => 'required|email|unique:users,email',
            'password' => 'confirmed|min:6',
        ]);
        $data['password'] = Hash::make($this->password);
        $user = User::create($data);
        auth()->login($user);
        return redirect('/2fa');
    }

    public function render()
    {
        return view('livewire.register-component');
    }
}
