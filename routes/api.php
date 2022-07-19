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
Route::get('/produtos/search/{id}', [App\Http\Controllers\ProdutoController::class, 'show'])->where('id', '[0-9]');

Route::get('/produtos/', [App\Http\Controllers\ProdutoController::class, 'list']);






