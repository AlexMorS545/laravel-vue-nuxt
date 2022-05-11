<?php

use App\Http\Controllers\EquipmentController;
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

Route::get('/equipment', [EquipmentController::class, 'index']);
Route::get('/equipment/{id}', [EquipmentController::class, 'show']);
Route::post('/equipment/create', [EquipmentController::class, 'store']);
