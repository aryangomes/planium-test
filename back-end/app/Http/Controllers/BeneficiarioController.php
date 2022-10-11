<?php

namespace App\Http\Controllers;

use App\Http\Requests\CadastrarBeneficiarioRequest;
use App\Models\Beneficiario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class BeneficiarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CadastrarBeneficiarioRequest $request)
    {
        $dadosValidados = $request->validated();

        foreach ($dadosValidados as $beneficiario) {
            Storage::put(
                'beneficiarios.json',
                json_encode($beneficiario)
            );
        }
        return Storage::get('beneficiarios.json');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Beneficiario  $beneficiario
     * @return \Illuminate\Http\Response
     */
    public function show(Beneficiario $beneficiario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Beneficiario  $beneficiario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Beneficiario $beneficiario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Beneficiario  $beneficiario
     * @return \Illuminate\Http\Response
     */
    public function destroy(Beneficiario $beneficiario)
    {
        //
    }
}
