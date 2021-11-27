<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;

class UserForm extends Component
{
    public $first_name;
    public $last_name;
    public $email;
    public $phone;
    public $address;
    public $neighborhood;
    public $location;
    public $role;
    public $identificacion;

    public function save()
    {
        $user = new User;
        $user->first_name = $this->first_name;
        $user->last_name = $this->last_name;
        $user->email = $this->email;
        $user->phone = $this->phone;
        $user->address = $this->address;
        $user->neighborhood = $this->neighborhood;
        $user->location = $this->location;
        $user->role = $this->role;
        $user->identificacion = $this->identificacion;

        $this->validate();
        $user->save();
        
        $this->emit('confirm');
        $this->emit('refreshParent');
        $this->clearForm();
    }

    private function clearForm()
    {
        $this->first_name = null;
        $this->last_name = null;
        $this->email = null;
        $this->phone = null;
        $this->address = null;
        $this->neighborhood = null;
        $this->location = null;
        $this->role = null;
        $this->identificacion = null;
    }

    public function rules() {
        return [
            'first_name' => 'required|max:15',
            'last_name' => 'required|max:20',
            'email' => 'required|email',
            'phone' => 'required',
            'address' => 'required|max:40',
            'neighborhood' => 'required',
            'location' => 'required',
            'role' => 'required',
            'identificacion' => 'required',
        ];
    }

    public function render()
    {
        return view('livewire.user-form');
    }
}
