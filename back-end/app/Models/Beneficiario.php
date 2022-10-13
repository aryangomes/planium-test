<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Beneficiario extends Model
{
    use HasFactory;

    public static function recuperarBeneficiarios(): object
    {
        return json_decode(Storage::get('beneficiarios.json'));
    }
}
