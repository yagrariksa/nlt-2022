<?php

namespace App\View\Components\form;

use Illuminate\View\Component;

class inputImg extends Component
{
    public $id, $label, $value;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($id, $label, $value='')
    {
        $this->id = $id;
        $this->label = $label;
        $this->value = $value;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.form.input-img');
    }
}
