<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Order;
use Livewire\WithPagination;
use App\Models\Product;
use Cart;

class Orders extends Component
{
    use WithPagination;
    public $search = '';
    public $comment, $radioButtom, $date_order;

    protected $listeners = [
        'refreshParent' => '$refresh'
    ];

    public function rules() {
        return [
            'radioButtom' => 'required'
        ];
    }

    protected $messages = [
        'radioButtom.required' => 'Select at least one delivery.'
    ];

    public function addProduct($id, $name, $price, $reference)
    {        
        Cart::instance('cart')->add($id, $name, 1, $price, ['reference' => $reference])->associate('App\Model\Product');
        $this->dispatchBrowserEvent('notify', ['type' => 'success', 'message' => 'Producto agregado a tu pedido!']);
    }

    public function removeProduct($rowId)
    {
        Cart::instance('cart')->remove($rowId);
        $this->dispatchBrowserEvent('notify', ['type' => 'danger', 'message' => 'Producto eliminado de tu pedido!']);
    }

    public function increaseQuantity($rowId)
    {
        $product = Cart::instance('cart')->get($rowId);
        $qty = $product->qty + 1;
        Cart::instance('cart')->update($rowId,$qty);
    }

    public function decreaseQuantity($rowId)
    {
        $product = Cart::instance('cart')->get($rowId);
        $qty = $product->qty - 1;
        Cart::instance('cart')->update($rowId,$qty);

        if($qty == 0){
            $this->dispatchBrowserEvent('notify', ['type' => 'danger', 'message' => 'Producto eliminado de tu pedido!']);
        }
    }

    public function mount()
    {
        Cart::instance('cart')->destroy();
    }

    public function cancel(){
        
        $this->dispatchBrowserEvent('closeModal', ['name' => 'resumeOrder']);

        $this->dispatchBrowserEvent('openModal', ['name' => 'cancelOrder']);
    }

    public function accept(){
        $this->dispatchBrowserEvent('closeModal', ['name' => 'cancelOrder']);
        return redirect()->route('dashboard');
    }

    public function resume(){
        $this->validate();
        $this->dispatchBrowserEvent('openModal', ['name' => 'resumeOrder']);
    }

    public function save(){
        $result = Order::select('code')->orderBy('id', 'DESC')->limit(1)->get();

        if($result->count()){
            $code = $result->first()->code + 1;
        }else{
            $code = '000001';
        }
        
        $order = new Order;
        $order->code = $code;
        $order->subtotal = Cart::instance('cart')->subtotal();
        $order->tax = 0;
        $order->total = Cart::instance('cart')->total();
        $order->state = 'Creado';
        $order->user_id = auth()->user()->id;

        $order->save();

        foreach(Cart::instance('cart')->content() as $items ){
            $order->products()->attach($items->id, ['qty' => $items->qty]);
        }

        Cart::instance('cart')->destroy();

        $this->dispatchBrowserEvent('closeModal', ['name' => 'resumeOrder']);

        $this->dispatchBrowserEvent('notify', ['type' => 'success', 'message' => 'Tu pedido fue creado existosamente!']);

    }

    public function render()
    {
        return view('livewire.orders',
            ['products' => Product::search('name', $this->search)->paginate(6)]
        );   
    }
}
