<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Alert extends Component
{


    public $type;

    public $dismissible;

    public $message;

    protected $types = [
        'success',
        'danger',
        'warning',
        'info'
    ];

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($message = '',$type = 'info', $dismissible = false)
    {
        $this->message = $message;
        $this->dismissible = $dismissible;
        $this->type = $type;
    }

    public function validType() {
        return in_array($this->type, $this->types)? $this->type : 'info';
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.alert');
    }
}
