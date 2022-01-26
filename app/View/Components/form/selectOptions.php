<?php

namespace App\View\Components\form;

use Illuminate\View\Component;

class selectOptions extends Component
{
    public $id, $class, $label, $opsi1, $options;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($id, $class='', $label, $opsi1, $options)
    {
        $this->id = $id;
        $this->class = $class;
        $this->label = $label;
        $this->opsi1 = $opsi1;
        $this->options = json_decode($options, true);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.form.select-options');
    }
}
