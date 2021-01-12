<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Rules\UniqueProduct;

class CreateProduct extends Component
{
    public $establishmentId;
    public $product;

    public function rules() 
    {
        return [
            'product.name'                  => 'required',
            'product.description'           => 'nullable',
            'product.normal_price'          => 'required|gt:0',
            'product.price'                 => 'required|gt:0',
            'product'                       => [new UniqueProduct],
        ];
    }

    protected $messages = [
        'product.first_name.required' => 'O primeiro nome é obrigatório',
        'product.last_name.required' => 'O último nome é obrigatório',
        'product.email.unique' => 'O email já se encontra em uso',
    ];

    public function render()
    {
        return view('components.create-product');
    }

    public function mount($establishmentId)
    {
        $this->establishmentId = $establishmentId;
        $this->product = $this->getCleanProduct();
    }

    public function updated($field)
    {
        $this->validateOnly($field);
    }

    public function submit()
    {
        $this->validate();

        Product::create([
            'establishment_id'      => $this->establishmentId,
            'name'                  => $this->product['name'],
            'description'           => $this->product['description'],
            'normal_price'          => $this->product['normal_price'],
            'price'                 => $this->product['price'],
            'quantity'              => 0,
            'image_url'             => $this->product['image_url'],
        ]);

        $this->emit('refreshParentProducts');
        $this->product = $this->getCleanProduct();
        $this->dispatchBrowserEvent('closeModal', ['modalId' => 'modalCreateProduct']);
        $this->dispatchBrowserEvent('server-notification', [
            'mode' => 'success',
            'message' => 'Produto guardado com sucesso!'
            ]);
    }

    public function getCleanProduct()
    {
        return [
            'id'                => 0,
            'establishment_id'  => $this->establishmentId,
            'name'              => '',
            'description'       => '',
            'normal_price'      => '',
            'price'             => '',
            'image_url'         => '',
        ];
    }
}
