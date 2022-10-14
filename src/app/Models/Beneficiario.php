<?php

namespace App\Models;

use Illuminate\Support\Facades\Storage;

class Beneficiario
{

    public static function recuperarBeneficiarios(): ?object
    {
        return json_decode(Storage::get('beneficiarios.json'));
    }
}
