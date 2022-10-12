<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Preco extends Model
{
    use HasFactory;

    private const  FAIXA_0_A_17_ANOS = 'faixa1';
    private const  FAIXA_18_A_40_ANOS = 'faixa2';
    private const  FAIXA_MAIS_DE_40_ANOS = 'faixa3';


    private string $faixaDeIdade;

    public function __construct(private int $idade)
    {
        $this->definirFaixaDeIdade($idade);
    }

    public static function recuperarPrecos(): string
    {
        return Storage::disk('public')->get(config('arquivos.prices'));
    }


    public function calcularPrecoPelaIdade($preco)
    {
        $precoFaixaIdade = $this->faixaDeIdade;
        return $preco->$precoFaixaIdade;
    }

    public function recuperarPreco($codigoPlano, $quantidadeBeneficiarios)
    {
        $precos = collect(json_decode(self::recuperarPrecos()));

        $preco = $precos->where('codigo', $codigoPlano)
            ->where('minimo_vidas', '<=', $quantidadeBeneficiarios)
            ->last();

        return $preco;
    }


    private function definirFaixaDeIdade(): void
    {
        if (
            $this->idade >= 0 &&
            $this->idade <= 17
        ) {
            $this->faixaDeIdade = self::FAIXA_0_A_17_ANOS;
            return;
        }

        if (
            $this->idade >= 18 &&
            $this->idade <= 40
        ) {
            $this->faixaDeIdade = self::FAIXA_18_A_40_ANOS;
            return;
        }

        $this->faixaDeIdade = self::FAIXA_MAIS_DE_40_ANOS;
    }
}
