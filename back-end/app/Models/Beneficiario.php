<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Beneficiario extends Model
{
    use HasFactory;

    public static function recuperarBeneficiarios(): string
    {
        return Storage::get('beneficiarios.json');
    }
}
