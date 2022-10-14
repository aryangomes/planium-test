<?php

namespace App\View\Components\Beneficiario\Table;

use App\Models\Beneficiario;
use Illuminate\View\Component;

class Lista extends Component
{
    public array $beneficiarios;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->beneficiarios = (array) Beneficiario::recuperarBeneficiarios();
    }

    public function possuiBeneficiariosCadastrados(): bool
    {
        return count($this->beneficiarios) > 0;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.beneficiario.table.lista');
    }
}
