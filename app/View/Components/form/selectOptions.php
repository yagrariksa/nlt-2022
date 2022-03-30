<?php

namespace App\View\Components\form;

use Illuminate\View\Component;

class selectOptions extends Component
{
    public $id, $class, $label, $options, $value, $helper, $helperUrl, $helperLink;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($id, $class = '', $label, $options, $value = '', $helper = '', $helperUrl = '', $helperLink = '')
    {
        $this->id = $id;
        $this->class = $class;
        $this->label = $label;
        $this->value = $value;
        $this->helper = $helper;
        $this->helperLink = $helperLink;
        $this->helperUrl = $helperUrl;
        $this->options = explode(",", $options);
        // $this->options = $options;
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
