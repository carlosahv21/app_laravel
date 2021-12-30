<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Livewire\Component;

class Profile extends Component
{
    public User $user;
    public $showSavedAlert = false;
    public $showDemoNotification = false;
    
    protected $listeners = [
        'refreshParent' => '$refresh'
    ];

    public function rules() {
        return [
            'user.first_name' => 'required|max:15',
            'user.last_name' => 'required|max:20',
            'user.email' => 'required|email',
            'user.phone' => 'required',
            'user.address' => 'required|max:40',
            'user.neighborhood' => 'required',
            'user.location' => 'required',
            'user.role' => 'required',
            'user.identificacion' => 'required',
            'user.confirm' => 'required',
            'user.method' => 'max:20'
        ];
    }

    public function mount() {
        $this->user = auth()->user(); 
    }

    public function testListen()
    {
        $this->dispatchBrowserEvent('openModal', ['name' => 'changePass']);
        $this->emit('changePass', $this->user->password);
    }

    public function save(){

        if($this->user->confirm == 'option1'){
            $this->user->method = '';
        }

        $this->validate();
        $this->user->email_verified_at = 'yes';
        $this->user->save();

        $this->showSavedAlert = true;   
    }

    public function render()
    {
        return view('livewire.profile');
    }
}
