<?php

namespace App\Http\Livewire;

use Livewire\WithPagination;
use Livewire\Component;
use App\Models\Establishment;
use App\Models\Product;

class ProductsList extends Component
{
    use WithPagination;

    //public $products;
    public $establishment_id;
    public $pagination_values = [4, 10, 25, 40];
    public $pagination_value;
    public $search_string = '';

    protected function getListeners()
    {
        return [
            'refreshParentProducts' => '$refresh'
        ];
    }

    public function render()
    {
        return view('components.products-list', [
            'products' => Establishment::find($this->establishment_id)->products($this->search_string)->paginate($this->pagination_value, ['*'], 'p'),
        ]);
    }

    public function mount($id)
    {
        $this->establishment_id = $id;
        $this->pagination_value = $this->pagination_values[0];
    }

    public function updated($field)
    {
        $this->resetPage();
    }

    public function update()
    {
        $this->emit('refreshParentProducts'); 
    }

}
