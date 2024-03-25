<?php

use Illuminate\Http\Request;

use App\Http\Controllers\GameController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MissionController;
use App\Http\Controllers\RecordController;
use App\Http\Controllers\SkinController;
use App\Http\Controllers\PointController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
Route::delete('/missions/shopper', [MissionController::class, 'deleteShopper']);
Route::delete('/missions/champion', [MissionController::class, 'deleteChampion']);
Route::delete('/missions/Athlete', [MissionController::class, 'deleteAthlete']);
Route::put('/points/{id}', [PointController::class, 'update']);
Route::get('max-points', 'App\Http\Controllers\PointController@maxPoints');
Route::post('/points', [PointController::class, 'store']);
Route::post('/skins', [SkinController::class, 'store']);
Route::apiResource('skins', SkinController::class);
Route::apiResource('points', PointController::class);
Route::apiResource('games', GameController::class);
Route::apiResource('missions', MissionController::class);
Route::apiResource('records', RecordController::class);


