<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Order;
use Livewire\WithPagination;
use App\Models\Product;
use App\Mail\OrdersMail;
use Illuminate\Support\Facades\Mail;
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
        'radioButtom.required' => 'Seleccione al menos una entrega.'
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
        if(Cart::instance('cart')->count() > 0){
            if (empty($this->date_order)) {
                return $this->dispatchBrowserEvent('showMessagge');
            }

            $this->validate();
            $this->dispatchBrowserEvent('openModal', ['name' => 'resumeOrder']);
        }else{
            $this->dispatchBrowserEvent('notify', ['type' => 'danger', 'message' => 'Al menos debes agregar un producto a tu pedido!']);
        }
    }

    public function save(){

        $order = new Order;
        $order->code = '1';
        $order->subtotal = Cart::instance('cart')->subtotal();
        $order->tax = 0;
        $order->total = Cart::instance('cart')->total();
        $order->partial_delivery = $this->radioButtom;
        $order->date_order = $this->date_order;
        $order->state = 'Creado';
        $order->user_id = auth()->user()->id;

        $order->save();

        $lastOrder = Order::latest()->first();
        $this->sendEmail( $lastOrder );
        
        foreach(Cart::instance('cart')->content() as $items ){
            $order->products()->attach($items->id, ['qty' => $items->qty]);
        }

        Cart::instance('cart')->destroy();

        $this->dispatchBrowserEvent('closeModal', ['name' => 'resumeOrder']);

        $this->dispatchBrowserEvent('notify', ['type' => 'success', 'message' => 'Tu pedido fue creado existosamente!']);

    }

    static public function getReference($num) {
		// La nomenclatura sera join_order_0001

        $result = Order::select('code')->orderBy('id', 'DESC')->limit(1)->get();
        $code = 'ORDER';
        $num_code = $num;

		$countNumber = strlen($num_code);

		switch ($countNumber) {
			case '1':
				$newSeq = '000'.$num_code;
				break;
			case '2':
				$newSeq = '00'.$num_code;
				break;
			case '3':
				$newSeq = '0'.$num_code;
				break;
            case '3':
                $newSeq = $num_code;
                break;
			default:
				$newSeq = $num_code;
				break;
		}

		return $code."_".$newSeq;
	}

    public function sendEmail( $lastOrder )
    {

        $mailData = [
            'cart' => Cart::instance('cart'),
            'model' => $lastOrder
        ];

        Mail::to( auth()->user()->email )->send( new OrdersMail($mailData) );
    }

    public function render()
    {
        return view('livewire.orders',
            ['products' => Product::search('name', $this->search)->paginate(6)]
        );   
    }
}
