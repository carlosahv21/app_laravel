<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use Livewire\WithPagination;

class Users extends Component
{
    use WithPagination;
    public $item, $action = '';

    protected $paginationTheme = 'bootstrap';
    protected $listeners = [
        'refreshParent' => '$refresh'
    ];

    public function selectItem($item, $action)
    {
        $this->item = $item;
        
        if($action == 'delete'){
            $this->dispatchBrowserEvent('openDeleteModal');
        }
    }

    public function delete()
    {
        $user = User::findOrFail($this->item);
        $user->delete();

        $this->dispatchBrowserEvent('closeDeleteModal');

    }

    public function render()
    {
        return view('livewire.users', 
            ['users' => User::orderBy('id','asc')->paginate(5)]
        );
    }
}
