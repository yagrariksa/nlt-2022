<?php

namespace App\View\Components\form;

use Illuminate\View\Component;

class textArea extends Component
{
    public $label, $id, $class, $value, $attr;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($label, $id, $class = '', $value = '', $attr = '')
    {
        $this->label = $label;
        $this->id = $id;
        $this->class = $class;
        $this->value = $value;
        $this->attr = $attr;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.form.text-area');
    }
}
