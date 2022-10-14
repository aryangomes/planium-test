<?php

namespace App\Http\Livewire;

use App\Models\Beneficiario;
use Livewire\Component;

class ListaBeneficiarios extends Component
{

    public array $beneficiariosPorPlano;

    public function __construct()
    {

        $this->listarBeneficiarios();
    }


    public function listarBeneficiarios()
    {
        $this->beneficiariosPorPlano = $this->recuperarBeneficiarios();
    }

    private function recuperarBeneficiarios(): array
    {
        return (array) Beneficiario::recuperarBeneficiarios();
    }



    public function render()
    {
        return view('livewire.lista-beneficiarios');
    }
}
