<?php

namespace App\View\Components\form;

use Illuminate\View\Component;

class inputPassword extends Component
{
    public $label, $id, $class;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($label, $id, $class='')
    {
        $this->label = $label;
        $this->id = $id;
        $this->class = $class;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.form.input-password');
    }
}
