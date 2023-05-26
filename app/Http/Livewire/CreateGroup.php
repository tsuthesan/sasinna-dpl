<?php

namespace App\Http\Livewire;

use App\Models\Attribute;
use App\Models\AttributeValue;
use Livewire\Component;

class CreateGroup extends Component
{
    public $showModal,$data,$show, $name ,$description,$atb_id;

    protected function rules()
    {
        return [
            'name' => 'required',
            'description' => 'required',
            'atb_id' => 'required',

        ];
    }
    protected $listeners = ['showModal' => 'showModal'];

    public function mount() {
        $this->show = false;
    }

    public function doShow() {
        $this->show = true;
    }

    public function doClose() {
        $this->show = false;
    }
    private function resetInputFields(){
        $this->name = '';
        $this->description = '';
        $this->atb_id = '';

    }
    public function doSomething() {
        $validatedData = $this->validate();

        AttributeValue::create($validatedData);
        $this->doClose();
        $this->resetInputFields();
    }
    public function showModal() {


        $this->doShow();
    }

    public function render()
    {
        $attributes= Attribute::all();
        return view('livewire.create-group');
    }
}
