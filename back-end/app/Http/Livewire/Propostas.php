<?php

namespace App\Http\Livewire;

use App\Models\Proposta;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class Propostas extends Component
{
    public array $propostas = [];


    public function listarProposta()
    {
        $this->propostas = Proposta::recuperarPropostas();
    }

    public function render()
    {
        return view('livewire.propostas');
    }
}
