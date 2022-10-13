<?php

namespace App\View\Components\Beneficiario\Forms;

use App\Models\Plano;
use Illuminate\View\Component;

class Input extends Component
{

    public array $planos;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->planos = Plano::recuperarPlanos();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.beneficiario.forms.input');
    }
}
