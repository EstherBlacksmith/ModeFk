<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EstadosController;

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

Route::get('/ModeFk', function () {
    return view('home');
})-> name('home');

Route::get('/', function () {
    return view('home');
});

Route::get('estados-buttons',[EstadosController::class, 'index'])-> name('estados');

Route::get('ansiedad', function () {
    return view('estados/ansiedad');
})-> name('ansiedad');

Route::get('tristeza', function () {
    return view('estados/tristeza');
})-> name('tristeza');

Route::get('bienestar', function () {
    return view('estados/bienestar');
})-> name('bienestar');
