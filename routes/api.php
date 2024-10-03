<?php

use App\Http\Controllers\Aunthentication;
use App\Http\Controllers\ModelToolsController;
use App\Http\Controllers\ToolsController;
use App\Models\model_tools;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/logout', [Aunthentication::class, 'logout']);
    Route::get('/me', [Aunthentication::class, 'me']);
    Route::post('/tools', [ToolsController::class, 'storetools']);
    Route::patch('/tools/{id}', [ToolsController::class, 'updatetools'])->middleware('pemilik-tools');
    Route::delete('/tools/{id}', [ToolsController::class, 'destroytools'])->middleware('pemilik-tools');

    Route::post('/model', [ModelToolsController::class, 'store']);
    Route::patch('/model/{id}', [ModelToolsController::class, 'updatemodel'])->middleware('Pemilik-Model');
    Route::delete('/model/{id}', [ModelToolsController::class, 'destroymodel'])->middleware('Pemilik-Model');
});

Route::get('/tools', [ToolsController::class, 'indextools']);
Route::get('/tools/{id}', [ToolsController::class, 'showtools']);
Route::get('/model', [ModelToolsController::class, 'indexmodel']);

Route::post('/login', [Aunthentication::class, 'login']);
