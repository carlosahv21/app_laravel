<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;

class ProductForm extends Component
{
    public $name;
    public $reference;
    public $presentation;
    public $price;
    public $stock;
    public $product_image;
    public $modelId;
    
    protected $listeners = [
        'getModelId',
        'forcedCloseModal'
    ];

    public function getModelId($modelId)
    {
        $this->modelId = $modelId;

        $model = Product::find($this->modelId);

        $this->name = $model->name;
        $this->reference = $model->reference;
        $this->presentation = $model->presentation;
        $this->price = $model->price;
        $this->stock = $model->stock;
    }

    public function save()
    {
        if($this->modelId){
            $product = Product::findOrFail($this->modelId);
        }else{
            $product = new Product;
        }

        $product->name = $this->name;
        $product->reference = $this->reference;
        $product->presentation = $this->presentation;
        $product->price = $this->price;
        $product->stock = $this->stock;


        $this->validate();
        $product->save();
        
        $this->dispatchBrowserEvent('closeModal', ['name' => 'createProduct']);
        $this->emit('refreshParent');
        $this->clearForm();
    }

    private function clearForm()
    {
        $this->name = null;
        $this->reference = null;
        $this->presentation = null;
        $this->price = null;
        $this->stock = null;
        $this->modelId = null;

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
            'name' => 'required|max:15',
            'reference' => 'required',
            'presentation' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|numeric|gt:0',
        ];
    }

    public function render()
    {
        return view('livewire.product-form');
    }
}
