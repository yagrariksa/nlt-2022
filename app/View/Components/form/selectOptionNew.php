<?php

namespace App\View\Components\form;

use Illuminate\View\Component;

class selectOptionNew extends Component
{
    public $id, $class, $label, $options, $value;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($id, $class='', $label, $options, $value='')
    {
        $this->id = $id;
        $this->class = $class;
        $this->label = $label;
        $this->value = $value;
        $this->options = explode(",", $options);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.form.select-option-new');
    }
}
