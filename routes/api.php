<?php

use App\Http\Controllers\FilesController;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;

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

Route::group(['prefix' => '/files'], function (Router $router) {
    $router->get('/list', [FilesController::class, 'list']);
    $router->get('/url', [FilesController::class, 'url']);
});
