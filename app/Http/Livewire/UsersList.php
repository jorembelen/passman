<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class UsersList extends Component
{
    public $query;

    public function mount()
    {
        if(auth()->user()->role_id != 1) {
            $route = request()->route()->getName();
            session()->flash('error', 'Sorry, you are not allowed to access the ' .$route .' page!');
            return redirect()->route('home');
        }
    }

    public function render()
    {
        $users = User::search($this->query)
        ->latest()
        ->paginate(10);

        return view('livewire.users-list', compact('users'))->extends('layouts.master');
    }
}
