<?php

use Illuminate\Support\Facades\Route;

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
    return view('index');
})->name('index');

Auth::routes(['verify' => true]);
Route::middleware('verified')->group(function(){
    Route::resource('/expositor', 'App\Http\Controllers\ExpositorController')->middleware(['cadastramento']);
    Route::resource('/feira', 'App\Http\Controllers\FeiraController')->middleware(['cadastramento']);
    Route::resource('/caduser', 'App\Http\Controllers\CadUserController');
    Route::get('/gerenciar_evento', 'App\Http\Controllers\GerenciarEventoController@index')->middleware('gerenciaUser')->name('gerencia.index');
});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->middleware(['cadastramento'])->name('home');

