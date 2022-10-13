<?php

namespace App\Http\Controllers;

use App\Models\Beneficiario;
use App\Models\Plano;
use App\Models\Preco;
use App\Models\Proposta;
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
    public function __invoke()
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

                $proposta = new Proposta($beneficiario);

                $propostasDosBeneficiarios->add($proposta->gerarProposta($quantidadeDeBeneficiarios));
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
