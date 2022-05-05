<?php

namespace App\Http\Livewire;

use LivewireUI\Modal\ModalComponent;
use App\Models\Tenant;


class CollectionModalComponent extends ModalComponent
{
     public int $counter = 0;

     public function update()
     {
        $this->counter++;
     }

     public function render()
     {
     return view('livewire.collection-modal-component');
     }
}
