<?php

namespace App\View\Components\form;

use Illuminate\View\Component;

class inputPasswordSessionError extends Component
{
    public $error, $label, $id, $class;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($error, $label, $id, $class='')
    {
        $this->label = $label;
        $this->id = $id;
        $this->class = $class;
        $this->error = $error;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.form.input-password-session-error');
    }
}
