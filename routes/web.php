<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EstadosController;
use App\Http\Controllers\EjerciciosCOntroller;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\Auth\RegisterController;

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

/*Página de inicio*/
Route::get('/ModeFk', function () {
    return view('home');
})-> name('home');

Route::get('/', function () {
    return view('home');
});

/*Estados y ejercícios*/
Route::get('estados',[EjerciciosCOntroller::class, 'index'])-> name('estados');

Route::post('estados',[EjerciciosCOntroller::class,'marcaRealizado'])-> name('marcaRealizado');


Route::get('ejerciciosRealizados',[EjerciciosCOntroller::class,'realizados'])-> name('realizados');


Route::get('ejerciciosQuitar/{id}',[EjerciciosCOntroller::class,'ejerciciosQuitar'])->name('ejerciciosQuitar');

Route::post('ejerciciosQuitar',[EjerciciosCOntroller::class,'ejerciciosQuitarStore'])->name('ejerciciosQuitarStore');


Route::get('ejercicioCrear/{id}',[EjerciciosCOntroller::class,'ejercicioCrear'])->name('ejercicioCrear');

Route::post('ejercicioAnadirStore',[EjerciciosCOntroller::class,'ejercicioAnadirStore'])->name('ejercicioAnadirStore');


Route::get('ejerciciosEdicion/{id}',[EjerciciosCOntroller::class,'ejerciciosEdicion'])->name('ejerciciosEdicion');

Route::post('ejerciciosEdicion',[EjerciciosCOntroller::class,'ejercicioCrearStore'])->name('ejercicioCrearStore');


Route::get('estadosEdicion',[EstadosController::class,'estadosEdicion'])->name('estadosEdicion');

Route::post('estadosEdicion',[EstadosController::class,'estadoCrear'])->name('estadoCrearStore');


Route::post('estadosEliminar',[EstadosController::class,'estadosEliminar'])->name('estadosEliminar');


Route::get('editar/{id}',[EstadosController::class,'editar'])->name('editar');

Route::post('editar',[EstadosController::class,'estadoEditarStore'])->name('estadoEditarStore');


Route::get('/whatsapp', function () {
    return view('whatsapp');
});

/*Route::get('ansiedad', function () {
    return view('estados/ansiedad');
})-> name('ansiedad');

Route::get('tristeza', function () {
    return view('estados/tristeza');
})-> name('tristeza');

Route::get('bienestar', function () {
    return view('estados/bienestar');
})-> name('bienestar');*/

/*Usuarios*/
Route::get('inicioSesion',[UsuariosController::class,'inicioSesionShow']);

Route::post('inicioSesion',[UsuariosController::class,'inicioSesion'])-> name('inicioSesion');

Route::get('registroUsuario', function () {
    return view('usuarios/registroUsuario');
});

Route::post('registroUsuario',[RegisterController::class,'create'])-> name('registroUsuario');

//Auth::routes();
Auth::routes([
	'ejerciciosEdicion'     => false, 
	'ejercicioCrear'        => false, 
	'realizados'            => false, 
	'estados'               => false, 
    'estadosEdicion'        => false, 
    'ejercicioCrearStore'   => false, 
    'estadoCrearStore'      => false, 
    'estadosEliminar'       => false,  
    'editar'                => false,  
    'estadoEditarStore'     => false,  
]);

/*Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');*/
