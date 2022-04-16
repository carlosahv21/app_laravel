<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserForm extends Component
{
    public $first_name, $last_name, $email, $phone, $address, $neighborhood, $location, $role, $identificacion, $enrollment, $modelId;
    
    protected $listeners = [
        'getModelId',
        'forcedCloseModal'
    ];

    public function getModelId($modelId)
    {
        $this->modelId = $modelId;

        $model = User::find($this->modelId);

        $this->first_name = $model->first_name;
        $this->last_name = $model->last_name;
        $this->email = $model->email;
        $this->phone = $model->phone;
        $this->address = $model->address;
        $this->neighborhood = $model->neighborhood;
        $this->location = $model->location;
        $this->role = $model->role;
        $this->identificacion = $model->identificacion;
        $this->enrollment = $model->enrollment;
    }

    public function save()
    {

        if($this->modelId){
            $user = User::findOrFail($this->modelId);
        }else{
            $user = new User;
        }

        $user->first_name = $this->first_name;
        $user->last_name = $this->last_name;
        $user->email = $this->email;
        $user->phone = $this->phone;
        $user->address = $this->address;
        $user->neighborhood = $this->neighborhood;
        $user->location = $this->location;
        $user->role = $this->role;
        $user->identificacion = $this->identificacion;
        $user->enrollment = $this->enrollment;
        $user->password = Hash::make('123456');

        $this->validate();
        $user->save();
        
        $this->dispatchBrowserEvent('closeModal', ['name' => 'createUser']);
        $this->emit('refreshParent');
        $this->clearForm();
    }

    private function clearForm()
    {
        $this->modelId = null;
        $this->first_name = null;
        $this->last_name = null;
        $this->email = null;
        $this->phone = null;
        $this->address = null;
        $this->neighborhood = null;
        $this->location = null;
        $this->role = null;
        $this->identificacion = null;
        $this->enrollment = null;
    }

    public function forcedCloseModal()
    {
        // This is to <re></re>set our public variables
        $this->clearForm();

        // These will reset our error bags
        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function rules() {
        return [
            'first_name' => 'required|max:15',
            'last_name' => 'required|max:20',
            'email' => 'required|email|unique:users',
            // 'phone' => 'required',
            'role' => 'required',
        ];
    }

    public function render()
    {
        return view('livewire.user-form');
    }
}
