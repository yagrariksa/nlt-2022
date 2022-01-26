<?php

namespace App\View\Components\form;

use Illuminate\View\Component;

class inputRadio extends Component
{
    public $name, $label, $checked;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name, $label, $checked='')
    {
        $this->name = $name;
        $this->label = $label;
        $this->checked = $checked;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.form.input-radio');
    }
}
