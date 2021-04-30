<?php

use Illuminate\Support\Facades\Route;

use App\Htpp\Controllers\ClientesController;


Route::get('/', function () {
    return view('welcome');
});
Route::get('/avisos', function (){
    return view('avisos', ['nome' => 'hugo', 'mostrar' =>true, 'avisos' =>[['id'=>1, 'texto'=>'Feriados agora'],['id'=>2, 'texto' =>'feriados semana que vem']]]);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'clientes'], function (){

	//Controlando o acesso com o middleware auth
	Route::get('/listar',[App\Http\Controllers\ClientesController::class, 'listar'])->middleware('auth');
});

Route::group(['middleware' => ['auth']], function(){

	Route::resource('/users',App\Http\Controllers\UserController::class);
	Route::resource('/roles',App\Http\Controllers\RoleController::class);
});