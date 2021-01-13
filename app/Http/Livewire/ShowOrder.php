<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Order;
use App\Models\User;
use App\Models\Product;

class ShowOrder extends Component
{
    public $order;

    public function render()
    {
        return view('components.show-order');
    }

    protected function getListeners()
    {
        return [
            'refreshModalShowProduct' => 'refreshModal',
        ];
    }

    public function refreshModal($id)
    {
        $this->order = Order::find($id);
        $this->order['consumer'] = User::find($this->order->buyer_id);
        $this->order['product'] = Product::find($this->order->product_id);
    }

    public function cancelOrder()
    {
        $order_new = Order::find($this->order['id']);
        $order_new -> state = Order::CANCELED;
        $order_new -> save();

        $this->reset(['order']);
        $this->emit('refreshParent');
        $this->dispatchBrowserEvent('closeModal', ['modalId' => 'modalShowOrder']);
        $this->dispatchBrowserEvent('server-notification', [
            'mode' => 'success',
            'message' => 'Pedido cancelado com sucesso!'
        ]);
    }

}
