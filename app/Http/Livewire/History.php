<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Establishment;
use App\Models\Order;
use App\Models\Product;

class History extends Component
{
    public $orders;
    public $search = '';
    public $type;
    public $object_id;

    public function render()
    {
        return view('components.history');
    }

    protected function getListeners()
    {
        return [
            'refreshParent' => 'getOrders',
        ];
    }
    
    public function mount($type, $id)
    {
        $this->type = $type;
        $this->object_id = $id;
        $this->getOrders();
    }

    public function updatedSearch()
    {
        $this->getOrders();
    }

    public function getOrders($search='')
    {
        if($search == '') $search = $this->search;
        if($this->type=="establishment") {
            $this->orders = Establishment::find($this->object_id)->orders()->where('random_id', 'like', '%'.$search.'%')->get();
            foreach($this->orders as $order) {
                $order['product'] = Product::find($order->product_id);
            }
        }
    }
}
