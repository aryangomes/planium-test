<?php

namespace App\Models;

use Illuminate\Support\Facades\Storage;

class Proposta
{
    private $plano;
    private $preco;

    public function __construct(private $beneficiario)
    {
        $this->preco = new Preco($beneficiario->idade);

        $this->plano = Plano::recuperarPlanoPeloCodigo($beneficiario->plano);
    }

    public function gerarProposta($quantidadeDeBeneficiarios): array
    {

        $planoPreco = $this->preco->recuperarPreco($this->beneficiario->plano, $quantidadeDeBeneficiarios);

        return [
            'nome' => $this->beneficiario->nome,
            'idade' => $this->beneficiario->idade,
            'registro_plano' => $this->plano->registro,
            'nome_plano' => $this->plano->nome,
            'preco' => $this->preco->calcularPrecoPelaIdade($planoPreco),
        ];
    }

    public static function recuperarPropostas(): ?array
    {
        $propostas = json_decode(Storage::get('propostas.json'), true);
        if ($propostas) {
            return $propostas;
        }
        return [];
    }
}
