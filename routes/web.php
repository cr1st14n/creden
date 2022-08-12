<?php

use App\Http\Controllers\credencialesController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\usuarioController;
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
    return view('auth.login');
})->middleware('guest')->name('login');

Route::any('log1', [loginController::class, 'login']);
Route::post('logout', [loginController::class, 'logout'])->name('logout');

Route::get('index', [homeController::class, 'index']);

Route::group(['prefix' => 'credenciales'], function () {
    Route::get('view_1', [credencialesController::class, 'view_1']); // * vista modal create registro
    Route::any('query_create_1', [credencialesController::class, 'queryCreate_1']); //* create 
    Route::get('queryShow_1', [credencialesController::class, 'queryShow_1']); //* lista general 
    Route::any('query_add_photo/{e}', [credencialesController::class, 'query_add_photo']); //* agregar imagen
    Route::post('query_destroy_credencial', [credencialesController::class, 'query_destroy_credencial']); //* eliminar item
    Route::post('query_edit_emp', [credencialesController::class, 'query_edit_emp']);
    Route::post('query_update_emp', [credencialesController::class, 'query_update_emp']);
    Route::get('query_buscar_A', [credencialesController::class, 'query_buscar_A']);
    Route::post('query_renovar_creden/{tipo}', [credencialesController::class, 'query_renovar_creden']);
    // * credencial formato
    Route::get('pdf_creden_emp_a/{e}/{f}/{t}', [credencialesController::class, 'pdf_creden_emp_a']);
});
Route::group(['prefix' => 'Usuarios'], function () {
    Route::get('view_2_user',[ usuarioController::class, 'view_1']);
    Route::post('create_user',[ usuarioController::class, 'create_user']);
    Route::get('query_list',[usuarioController::class,'query_list']);
    Route::post('query_destroyUser',[usuarioController::class,'query_destroyUser']);
});
