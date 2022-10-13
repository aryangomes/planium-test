<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Plano extends Model
{
    use HasFactory;

    public static function recuperarPlanos(): array
    {
        return json_decode(Storage::disk('public')->get(config('arquivos.plans')));
    }

    public static function recuperarPlanoPeloCodigo(int $codigo): object
    {
        $planos = collect(self::recuperarPlanos());

        $plano = $planos->firstWhere('codigo', $codigo);

        return $plano;
    }
}
