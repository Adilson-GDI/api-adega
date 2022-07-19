<?php
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;

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


Route::get('/{id}', function()
{
    return "ola";
});
Route::get('/produtos/search/', [App\Http\Controllers\ProdutoController::class, 'show']);

Route::get('/produtos/', [App\Http\Controllers\ProdutoController::class, 'list']);






