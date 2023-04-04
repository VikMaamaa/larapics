<?php

namespace App\View\Components;

use Illuminate\Support\HtmlString;
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

    public function link($text, $target = '#'){
        return  new HtmlString('<a href="#" class="alert-link">'.$text.'</a>');
    }

    public function icon($url = null) {
        $icon = $url ?? asset("icons/icon-{$this->type}.svg");
        return new HtmlString("<img class='me-2' src='{$icon}'");
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
