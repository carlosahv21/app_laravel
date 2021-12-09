<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Order;
use Livewire\WithPagination;

class Orders extends Component
{
    use WithPagination;
    public $item, $action, $search, $countOrders = '';
    public $selected = [];

    protected $paginationTheme = 'bootstrap';
    protected $listeners = [
        'refreshParent' => '$refresh'
    ];

    public function selectItem($item, $action)
    {
        $this->item = $item;
        
        if($action == 'delete'){
            $this->dispatchBrowserEvent('openModal', ['name' => 'deleteOrder']);
        }else if($action == 'masiveDelete'){
            $this->dispatchBrowserEvent('openModal', ['name' => 'deleteOrderMasive']);
            $this->countOrders = count($this->selected);
        }else{
            $this->dispatchBrowserEvent('openModal', ['name' => 'createOrder']);
            $this->emit('getModelId', $this->item);
        }
    }

    public function massiveDelete()
    {
        $orders = Order::whereKey($this->selected);
        $orders->delete();
        $this->selected = null;

        $this->dispatchBrowserEvent('closeModal', ['name' => 'deleteOrderMasive']);

    }

    public function delete()
    {
        $user = Order::findOrFail($this->item);
        $user->delete();

        $this->dispatchBrowserEvent('closeModal', ['name' => 'deleteOrder']);

    }

    public function render()
    {
        return view('livewire.orders', 
            ['orders' => Order::search('code', $this->search)->paginate(10)]
        );
    }
}
