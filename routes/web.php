<?php

use Illuminate\Support\Facades\Route;

use App\Htpp\Controllers\ClientesController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/avisos', function (){
    return view('avisos', ['nome' => 'hugo', 'mostrar' =>true, 'avisos' =>[['id'=>1, 'texto'=>'Feriados agora'],['id'=>2, 'texto' =>'feriados semana que vem']]]);
});
Route::get('/principal', function (){
    return view ('principal', ['msg' =>'Oiii', 'aviso'=>true, 'mostrar1' => 'Olha o Cachorro', 'mostrar2'=>'Olha o Gatinho']);
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'clientes'], function (){

	//Controlando o acesso com o middleware auth
	Route::get('/listar',[App\Http\Controllers\ClientesController::class, 'listar'])->middleware('auth');
    Route::get('/recado',[App\Http\Controllers\ClientesController::class, 'recado'])->middleware('auth');
        
});
   
