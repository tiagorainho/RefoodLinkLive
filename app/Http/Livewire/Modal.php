<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Modal extends Component
{
    public $modalId, $modalTitle, $modalContent, $args, $class;

    public function render()
    {
        return view('components.modal');
    }

    public function mount($id, $title, $content, $args=null, $modalClass='modal-dialog modal-lg')
    {
        $this->modalId = $id;
        $this->modalTitle = $title;
        $this->modalContent = $content;
        $this->args = $args;
        $this->class = $modalClass;
    }
}
