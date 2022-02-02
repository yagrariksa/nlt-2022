<?php

namespace App\View\Components\form;

use Illuminate\View\Component;

class inputTextWithHelp extends Component
{
    public $label, $id, $class, $helper, $value;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($label, $id, $class, $helper, $value='')
    {
        $this->label = $label;
        $this->id = $id;
        $this->class = $class;
        $this->helper = $helper;
        $this->value = $value;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.form.input-text-with-help');
    }
}
