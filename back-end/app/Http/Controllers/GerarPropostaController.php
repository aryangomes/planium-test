<?php

namespace App\Http\Controllers;

use App\Models\Beneficiario;
use App\Models\Plano;
use App\Models\Preco;
use Illuminate\Http\Request;

class GerarPropostaController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $beneficiariosPorPlano = collect(json_decode(Beneficiario::recuperarBeneficiarios()));

        $planos = collect(json_decode(Plano::recuperarPlanos()));

        $precos = collect(json_decode(Preco::recuperarPrecos()));

        $planosBeneficiarios = [];

        $planosBeneficiarios = $beneficiariosPorPlano->map(function ($beneficiario, $codigoPlano) use ($precos) {
            return
                $precos->where('codigo', $codigoPlano)
                ->where('minimo_vidas', '<=', $beneficiario->quantidade_beneficiarios)
                ->last();
        });

        $propostas = collect();

        $beneficiariosPorPlano->each(function ($beneficiarios, $codigoPlano) use ($propostas, $planosBeneficiarios) {

            $beneficiarios =  collect($beneficiarios);
            $quantidadeDeBeneficiarios = ($beneficiarios->get('quantidade_beneficiarios'));
            $beneficiarios->forget('quantidade_beneficiarios');
            foreach ($beneficiarios as  $beneficiario) {

                $preco = new Preco($beneficiario->idade);

                $planoPreco = $preco->recuperarPreco($beneficiario->plano, $quantidadeDeBeneficiarios);

                $propostas->add(
                    [
                        'nome' => $beneficiario->nome,
                        'idade' => $beneficiario->idade,
                        'plano' => $beneficiario->plano,
                        'preco' => $preco->calcularPrecoPelaIdade($planoPreco),
                    ]
                );
            }
        });
        // return $propostas;
        dd($propostas);
    }
}
