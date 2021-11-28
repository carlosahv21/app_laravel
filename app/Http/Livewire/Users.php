<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use Livewire\WithPagination;

class Users extends Component
{
    use WithPagination;
    public $item, $action, $search, $countUsers = '';
    public $selected = [];

    protected $paginationTheme = 'bootstrap';
    protected $listeners = [
        'refreshParent' => '$refresh'
    ];

    public function selectItem($item, $action)
    {
        $this->item = $item;
        
        if($action == 'delete'){
            $this->dispatchBrowserEvent('openModal', ['name' => 'deleteUser']);
        }else if($action == 'masiveDelete'){
            $this->dispatchBrowserEvent('openModal', ['name' => 'deleteUserMasive']);
            $this->countUsers = count($this->selected);
        }else{
            $this->dispatchBrowserEvent('openModal', ['name' => 'createUser']);
            $this->emit('getModelId', $this->item);
        }
    }

    public function massiveDelete()
    {
        $users = User::whereKey($this->selected);
        $users->delete();
        $this->selected = null;

        $this->dispatchBrowserEvent('closeModal', ['name' => 'deleteUserMasive']);

    }

    public function delete()
    {
        $user = User::findOrFail($this->item);
        $user->delete();

        $this->dispatchBrowserEvent('closeModal', ['name' => 'deleteUser']);

    }

    public function render()
    {
        return view('livewire.users', 
            ['users' => User::search('first_name', $this->search)->paginate(10)]
        );
    }
}
