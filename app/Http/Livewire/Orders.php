<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Order;
use Livewire\WithPagination;
use App\Models\Product;

class Orders extends Component
{
    use WithPagination;
    public $item, $action, $search, $countOrders, $select, $amount = '';
    public $selected = [];
    public $total = [];

    public $orders_products = [];
    

    protected $paginationTheme = 'bootstrap';
    protected $listeners = [
        'refreshParent' => '$refresh'
    ];

    public function updatedSelect($value)
    {
        $select = $value;
    }

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

    public function addProduct()
    {
        $product = Product::find($this->select);

        foreach ($product as $key => $value) {
            $name = $value->name;
            $price = $value->price;
        }        

        $this->orders_products->push(
            [
                'name' => $name,
                'price' => $price,
            ]
        );
    }

    public function removeProduct($key)
    {
        $this->orders_products->pull($key);
    }

    public function updatedAmount($qty, $amount)
    {

        $data = explode("(", $amount);

        $key = $data[0];
        $price = substr($data[1], 0, -2);

        // dd($key." - ".$price);

        $this->total[$key] = $price;
    }

    public function recalc($qty)
    {
        dd($qty);
    }

    public function mount()
    {
        $this->fill([
            'orders_products' => collect(array()),
        ]);
    }

    public function add(){
        return view('livewire.orders');
    }

    public function render()
    {
        
        return view('livewire.orders',
            ['products' => Product::search('name', $this->search)->paginate(10)]
        );
        
    }
}
