<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;

class Users extends Component
{
    
    protected $listeners = [
        'refreshParent' => '$refresh'
    ];

    public function render()
    {
        return view('livewire.users', 
            ['users' => User::orderBy('id','asc')->paginate(5)]
        );
    }
}
