<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Order;

class ConfirmOrder extends Component
{
    public $order_random_id = '';

    public function rules() 
    {
        return [
            'order_random_id'           => 'required|exists:orders,random_id',
        ];
    }

    public function render()
    {
        return view('components.confirm-order');
    }

    public function submit()
    {
        $this->validate();

        $orders = Order::where('random_id', '=', $this->order_random_id)->get();
        $order = $orders->first();
        $order->state = ORDER::PAYED;
        $order->save();
        
        $this->reset(['order_random_id']);
        $this->emit('refreshParent');
        $this->dispatchBrowserEvent('closeModal', ['modalId' => 'modalConfirmOrder']);
        $this->dispatchBrowserEvent('server-notification', [
            'mode' => 'success',
            'message' => 'Encomenda confirmada com sucesso!'
        ]);

    }

}
