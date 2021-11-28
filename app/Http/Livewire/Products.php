<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use Livewire\WithPagination;

class Products extends Component
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
            $this->dispatchBrowserEvent('openModal', ['name' => 'deleteProduct']);
        }else{
            $this->dispatchBrowserEvent('openModal', ['name' => 'createProduct']);
            $this->emit('getModelId', $this->item);
        }
    }

    public function delete()
    {
        $product = Product::findOrFail($this->item);
        $product->delete();

        $this->dispatchBrowserEvent('closeModal', ['name' => 'deleteProduct']);

    }

    public function render()
    {
        return view('livewire.products', 
            ['products' => Product::orderBy('id','asc')->paginate(5)]
        );
    }
}
