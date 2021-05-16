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

/*Usuarios*/
Route::post('logout',[UsuariosController::class,'logout'])->name('logout');


Route::get('inicioSesion',[UsuariosController::class,'inicioSesionShow']);

Route::post('inicioSesion',[UsuariosController::class,'inicioSesion'])-> name('inicioSesion');

Route::get('registroUsuario', function () {
    return view('usuarios/registroUsuario');
});

Route::post('registroUsuario',[RegisterController::class,'create'])-> name('registroUsuario');

//Auth::routes();
/*
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
]);*/

Route::group(['middleware' => 'admin'], function () {

    Route::get('ejerciciosQuitar/{id}',[EjerciciosCOntroller::class,'ejerciciosQuitar'])->name('ejerciciosQuitar');

    Route::post('ejerciciosQuitar',[EjerciciosCOntroller::class,'ejerciciosQuitarStore'])->name('ejerciciosQuitarStore');


    Route::get('ejercicioCrear/{id}',[EjerciciosCOntroller::class,'ejercicioCrear'])->name('ejercicioCrear');

    Route::post('ejercicioAnadirStore',[EjerciciosCOntroller::class,'ejercicioAnadirStore'])->name('ejercicioAnadirStore');


    Route::get('ejerciciosEdicion',[EjerciciosCOntroller::class,'ejerciciosEdicion'])->name('ejerciciosEdicion');

    Route::post('ejerciciosEdicionStore',[EjerciciosCOntroller::class,'ejerciciosEdicionStore'])->name('ejerciciosEdicionStore');


    Route::get('estadosEdicion',[EstadosController::class,'estadosEdicion'])->name('estadosEdicion');

    Route::post('estadosEdicion',[EstadosController::class,'estadoCrear'])->name('estadoCrearStore');


    Route::post('estadosEliminar',[EstadosController::class,'estadosEliminar'])->name('estadosEliminar');


    Route::get('editar/{id}',[EstadosController::class,'editar'])->name('editar');

    Route::post('editar',[EstadosController::class,'estadoEditarStore'])->name('estadoEditarStore');

});

Route::group( ['middleware' => 'auth' ], function()
{
    /*Estados y ejercícios*/
    Route::get('estados',[EjerciciosCOntroller::class, 'index'])-> name('estados');

    Route::post('estados',[EjerciciosCOntroller::class,'marcaRealizado'])-> name('marcaRealizado');


    Route::get('ejerciciosRealizados',[EjerciciosCOntroller::class,'realizados'])-> name('realizados');



    Route::get('contactoEmergencia',[UsuariosController::class,'contactoEmergenciaView'])->name('contactoEmergenciaView');
    Route::post('contactoEmergencia',[UsuariosController::class,'contactoEmergenciaStore'])->name('contactoEmergenciaStore');
    Route::post('contactoEliminarStore',[UsuariosController::class,'contactoEliminarStore'])->name('contactoEliminarStore');

});