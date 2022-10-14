<?php

namespace App\Http\Livewire;

use App\Models\Plano;
use Livewire\Component;

class CadastroBeneficiario extends Component
{
    public array $planos;
    public array $erros = [];

    public function __construct()
    {
        $this->planos = Plano::recuperarPlanos();
        $this->erros = Plano::recuperarPlanos();
    }
    public function render()
    {
        return view('livewire.cadastro-beneficiario');
    }
}
