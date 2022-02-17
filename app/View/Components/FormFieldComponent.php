<?php

namespace App\View\Components;

use Illuminate\View\Component;

class FormFieldComponent extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

     public $field;
    public function __construct($field)
    {
        $this->field = $field;
        //
    }

    public function isNumberField()
        {
            return $this->field->formfield_type_id == 1 && !$this->field->is_input_text;
        }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.form-field-component');
    }
}
