<?php

use App\Http\Controllers\NoticiaController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\TextoController;
use App\Http\Controllers\PublicaController;
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

Route::get('/', [PublicaController::class,'index']);

Route::get('/sobre', [PublicaController::class,'sobre']);

Route::get('/contato', [PublicaController::class,'contato']);

Route::get('/noticias/{id}', [PublicaController::class , 'visualizarNoticia']);

Route::get('/principal/{id}', [PublicaController::class , 'visualizarTextoPrincipal']);

Route::get('/adm', function () {
    return view('adm.login');
});
Route::get('/adm_index', function () {
    return view('adm.index');
});

//rota para o CRUD de usuários
Route::resource('usuario', UsuarioController::class);
//rota específica para o Datatables
Route::get('usuarios.ajax', [UsuarioController::class,'paginacaoAjaxDataTables'])->name('usuarios.ajax');

//rota para o CRUD de noticias
Route::resource('noticia', NoticiaController::class);

//rota para o CRUD de videos
Route::resource('video', VideoController::class);

//rota específica para o efetuar login
Route::post('usuarios_login', [UsuarioController::class,'login'])->name('usuarios.login');

//rota específica para o efetuar logut
Route::get('usuarios_logout', [UsuarioController::class,'logout'])->name('usuarios.logout');

//rota para o CRUD de texto_principal
Route::resource('texto', TextoController::class);
