<?php

namespace App\Http\Controllers;

use App\Models\Beneficiario;
use App\Models\Plano;
use App\Models\Preco;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        $beneficiariosPorPlano = collect(Beneficiario::recuperarBeneficiarios());

        $propostasDosBeneficiarios = collect();

        $beneficiariosPorPlano->each(function ($beneficiarios) use ($propostasDosBeneficiarios) {

            $beneficiarios =  collect($beneficiarios);

            $quantidadeDeBeneficiarios = ($beneficiarios->get('quantidade_beneficiarios'));

            $beneficiarios->forget('quantidade_beneficiarios');

            $beneficiarios->each(function ($beneficiario) use (
                $propostasDosBeneficiarios,
                $quantidadeDeBeneficiarios
            ) {
                $preco = new Preco($beneficiario->idade);

                $plano = Plano::recuperarPlanoPeloCodigo($beneficiario->plano);

                $planoPreco = $preco->recuperarPreco($beneficiario->plano, $quantidadeDeBeneficiarios);

                $propostasDosBeneficiarios->add(
                    [
                        'nome' => $beneficiario->nome,
                        'idade' => $beneficiario->idade,
                        'registro_plano' => $plano->registro,
                        'nome_plano' => $plano->nome,
                        'preco' => $preco->calcularPrecoPelaIdade($planoPreco),
                    ]
                );
            });
        });

        $propostasDosBeneficiarios = $propostasDosBeneficiarios->groupBy('registro_plano');

        $propostasDosBeneficiariosComTotaisDosPlanos = $propostasDosBeneficiarios->each(function ($propostas) {
            $propostas->put('precoTotalDoPlano', $propostas->sum('preco'));
        });

        Storage::put(
            'propostas.json',
            json_encode(
                $propostasDosBeneficiariosComTotaisDosPlanos,
                JSON_PRETTY_PRINT
            )
        );

        return Storage::get('propostas.json');
    }
}
