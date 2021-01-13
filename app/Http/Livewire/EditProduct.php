<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Models\Establishment;
use App\Rules\UniqueProduct;

class EditProduct extends Component
{
    public $product_id;
    public $quantity_change = 0;
    public $product;

    public function rules() 
    {
        return [
            'product.name'                  => ['required'],
            'product.description'           => 'nullable',
            'product.normal_price'          => 'required|gt:0',
            'product.price'                 => 'required|gt:0',
            'product'                       => [new UniqueProduct],
        ];
    }

    protected function getListeners()
    {
        return [
            'refreshModalEditProduct' => 'refreshModal',
        ];
    }

    public function updated($field)
    {
        $this->validateOnly($field);
    }

    public function render()
    {
        return view('components.edit-product');
    }

    public function submit()
    {
        $this->validate();

        $product_new = Product::find($this->product_id);
        $product_new->update([
            'name' => $this->product['name'],
            'description' => $this->product['description'],
            'normal_price' => $this->product['normal_price'],
            'price' => $this->product['price'],
            'image_url' => $this->product['image_url'],
            'quantity' => $product_new->quantity + $this->quantity_change,
        ]);

        $this->quantity_change = 0;
        $this->emit('refreshParentProducts');
        $this->dispatchBrowserEvent('closeModal', ['modalId' => 'modalProductEdit']);
        $this->dispatchBrowserEvent('server-notification', [
            'mode' => 'success',
            'message' => 'Produto editado com sucesso!'
            ]);
    }

    public function refreshModal($id)
    {
        $this->product_id = $id;
        $this->product = Product::find($this->product_id);
    }
}
