<?php

use App\Http\Controllers\BeneficiarioController;
use App\Http\Controllers\GerarPropostaController;
use App\Http\Controllers\PlanoController;
use App\Http\Controllers\PrecoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('/planos', PlanoController::class);
Route::apiResource('/precos', PrecoController::class);
Route::apiResource('/beneficiarios', BeneficiarioController::class);
Route::get('gerarProposta', GerarPropostaController::class);
