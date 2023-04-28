<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Input extends Component
{
    /**
     * @var string type of input
     */
    public string $type;

    /**
     * @var string label of input
     */
    public string $label;

    /**
     * @var string fieldName of input
     */
    public string $fieldName;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($type, $label, $fieldName)
    {
        $this->type = $type;
        $this->label = $label;
        $this->fieldName = $fieldName;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.input');
    }
}
