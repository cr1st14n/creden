<?php

use App\Http\Controllers\credencialesController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\loginController;
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

Route::any('log1',[loginController::class,'login']);
Route::post('logout',[loginController::class,'logout'])->name('logout');

Route::get('index',[homeController::class,'index']);

Route::group(['prefix'=>'credenciales'],function ()
{
    Route::get('view_1',[ credencialesController::class,'view_1']); // * vista modal create registro
    Route::post('query_create_1',[credencialesController::class,'queryCreate_1' ]);//* create 
    Route::get('queryShow_1',[credencialesController::class,'queryShow_1' ]);//* lista general 
    Route::any('query_add_photo/{e}',[credencialesController::class,'query_add_photo' ]);//* agregar imagen
    Route::post('query_destroy_credencial',[credencialesController::class,'query_destroy_credencial' ]);//* eliminar item
    // * credencial formato
    Route::get('pdf_creden_emp_a/{e}/{f}',[credencialesController::class,'pdf_creden_emp_a']);
});