<?php

namespace App\Http\Controllers;

use App\Models\Plano;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {

        if (Storage::exists('beneficiarios.json')) {
            Storage::delete('beneficiarios.json');
        }

        if (Storage::exists('propostas.json')) {
            Storage::delete('propostas.json');
        }
        $planos = Plano::recuperarPlanos();
        return view('home', compact(['planos']));
    }
}
