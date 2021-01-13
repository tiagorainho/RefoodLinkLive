<?php

namespace App\Http\Livewire;

use Illuminate\Support\Str;
use Livewire\Component;
use App\Models\Product;
use App\Models\Order;

class OrderProduct extends Component
{
    public $product;
    public $quantityToOrder = 1;
    public $useDeliveryman = false;
    public $price = 0;
    public $deliveryCost = 3;

    public function render()
    {
        return view('components.order-product');
    }

    public function rules() 
    {
        return [
            'quantityToOrder'           => ['required', 'gt:0', 'lte:product.quantity'],
        ];
    }

    public function updatePrice()
    {
        $this->price = $this->product->price * $this->quantityToOrder + $this->deliveryCost*$this->useDeliveryman;
    }

    public function updatedQuantityToOrder()
    {
        $this->updatePrice();
    }

    public function updatedUseDeliveryman()
    {
        $this->updatePrice();
    }

    protected function getListeners()
    {
        return [
            'refreshModalPrepareOrder'  => 'refreshModal',
        ];
    }

    public function updated($field)
    {
        $this->validateOnly($field);
    }

    public function refreshModal($id)
    {
        $this->product = Product::findOrFail($id);
        $this->updatePrice();
    }

    public function submit()
    {
        $this->validate();

        $this->product->update([
            'quantity' => $this->product->quantity - $this->quantityToOrder,
        ]);
        
        $random_id;
        while(true) {
            $random_id = Str::random($length = 8);
            $order_aux = Order::where('random_id')->get();
            if(count($order_aux) == 0) {
                break;
            }
        }

        Order::create([
            'random_id'         => $random_id,
            'buyer_id'          => Auth()->user()->id,
            'product_id'        => $this->product['id'],
            'establishment_id'  => $this->product['establishment_id'],
            'quantity'          => $this->quantityToOrder,
            'price'             => $this->price,
            'use_delivery_man'  => $this->useDeliveryman,
        ]);

        $this->reset(['quantityToOrder', 'useDeliveryman', 'price']);
        $this->emit('refreshParent');
        $this->dispatchBrowserEvent('closeModal', ['modalId' => 'modalPrepareToOrder']);
        $this->dispatchBrowserEvent('server-notification', [
            'mode' => 'success',
            'message' => 'Produto encomendado com sucesso!'
        ]);
    }

}
