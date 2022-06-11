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


Route::group(['middleware'=> ['guest:api']], function () {

Route::get('/', function()
{
    return "ola";
});

Route::get('/produto', [App\Http\Controllers\ProdutoController::class, 'list'])->name('list');

Route::post('/login', [App\Http\Controllers\LoginController::class, 'login' ])->name('login');

//Route::get('/cliente', [App\Http\Controllers\ClienteController::class, 'index'])->name('home');



});//fim grupo.


Route::group(['middleware'=>'auth:api'],function(){
    Route::get('/produto', [App\Http\Controllers\ProdutoController::class, 'list'])->name('list');
    Route::get('/produto/{id}', [App\Http\Controllers\ProdutoController::class, 'show'])->name('show');

    Route::get('/carrinho', [App\Http\Controllers\CarrinhoController::class, 'list'])->name('list');
    Route::get('/carrinho/{id}', [App\Http\Controllers\CarrinhoController::class, 'show'])->name('show');
    Route::post('/carrinho/', [App\Http\Controllers\CarrinhoController::class, 'create'])->name('create');
    Route::delete('/carrinho/{id}', [App\Http\Controllers\CarrinhoController::class, 'destroy'])->name('destroy');
});


/* Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
}); */


