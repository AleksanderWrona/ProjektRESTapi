<?php

use Illuminate\Http\Requests;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PeopleController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/people', [PeopleController::class, 'index']);
Route::get('/people/{id}', [PeopleController::class, 'show']);
Route::post('/people', [PeopleController::class, 'store']);
Route::put('/people/{id}', [PeopleController::class, 'update']);
Route::delete('/people/{id}', [PeopleController::class, 'destroy']);
