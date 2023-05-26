<?php

namespace App\Http\Livewire;

use App\Models\AttributeValue;
use Livewire\Component;

class CreateDrop extends Component
{
    public $product_groups;

    protected $listeners = ['refreshComponent' => 'mount']; /*Note: activating the refresh*/


    public function mount(){
        $this->product_groups = AttributeValue::where("atb_id","=",1)->get();
    }
    public function render()
    {
        return view('livewire.create-drop');
    }
}
