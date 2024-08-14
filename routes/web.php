<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ConsultasController;
use App\Http\Controllers\PeticionesController;
use App\Http\Controllers\ComponentesController;

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

Route::get('/',[ConsultasController::class,'welcome'])->name('welcome');

Route::get('login',[ConsultasController::class,'login'])->name('login')->middleware('guest');

Route::get('dashboard',[ConsultasController::class,'dashboard'])->name('dashboard')->middleware('auth');

Route::get('gestionarCultivos',[ConsultasController::class,'gestionarCultivos'])->name('gestionarCultivos');

Route::get('registrarCultivo',[ConsultasController::class,'registrarCultivo'])->name('registrarCultivo');

Route::get('nuevaParcela',[ConsultasController::class,'nuevaParcela'])->name('nuevaParcela');

Route::get('modificarParcela',[ConsultasController::class,'modificarParcela'])->name('modificarParcela');

Route::get('registrarParcela',[ConsultasController::class,'registrarParcela'])->name('registrarParcela');

Route::get('programarLabores',[ConsultasController::class,'programarLabores'])->name('programarLabores');

Route::get('asignarRecursos',[ConsultasController::class,'asignarRecursos'])->name('asignarRecursos');

Route::get('nuevoCultivo',[ConsultasController::class,'nuevoCultivo'])->name('nuevoCultivo');

Route::get('nuevaTarea',[ConsultasController::class,'nuevaTarea'])->name('nuevaTarea');

Route::get('registrarRecurso',[ConsultasController::class,'registrarRecurso'])->name('registrarRecurso');

Route::get('nuevoRecurso',[ConsultasController::class,'nuevoRecurso'])->name('nuevoRecurso');

Route::get('nuevoAsignarRecurso',[ConsultasController::class,'nuevoAsignarRecurso'])->name('nuevoAsignarRecurso');

Route::get('programarRiego',[ConsultasController::class,'programarRiego'])->name('programarRiego');

Route::get('controlarPlagas',[ConsultasController::class,'controlarPlagas'])->name('controlarPlagas');

Route::get('registrarPlaga',[ConsultasController::class,'registrarPlaga'])->name('registrarPlaga');

Route::get('nuevaPlaga',[ConsultasController::class,'nuevaPlaga'])->name('nuevaPlaga');

Route::get('nuevoControlPlagas',[ConsultasController::class,'nuevoControlPlagas'])->name('nuevoControlPlagas');

Route::get('nuevoRiego',[ConsultasController::class,'nuevoRiego'])->name('nuevoRiego');

Route::get('registrarCosecha',[ConsultasController::class,'registrarCosecha'])->name('registrarCosecha');


//PETICIONES DE INICIO DE SESION


Route::post('login',[PeticionesController::class,'login'])->name('login');

Route::post('logout',[PeticionesController::class,'logout'])->name('logout');


// GRABAR DATOS

Route::post('grabarParcela',[PeticionesController::class,'grabarParcela'])->name('grabarParcela');

Route::post('grabarCultivo',[PeticionesController::class,'grabarCultivo'])->name('grabarCultivo');

Route::post('grabarTarea',[PeticionesController::class,'grabarTarea'])->name('grabarTarea');

Route::post('grabarRiego',[PeticionesController::class,'grabarRiego'])->name('grabarRiego');

Route::post('grabarRecurso',[PeticionesController::class,'grabarRecurso'])->name('grabarRecurso');

Route::post('grabarNuevaAsignacion',[PeticionesController::class,'grabarNuevaAsignacion'])->name('grabarNuevaAsignacion');

Route::post('grabarPlaga',[PeticionesController::class,'grabarPlaga'])->name('grabarPlaga');

Route::post('grabarNuevoControlPlaga',[PeticionesController::class,'grabarNuevoControlPlaga'])->name('grabarNuevoControlPlaga');

Route::post('grabarCosecha',[PeticionesController::class,'grabarCosecha'])->name('grabarCosecha');


// SELECCION

Route::get('buscarParcela',[ComponentesController::class,'buscarParcela'])->name('buscarParcela');
Route::post('seleccionarParcela/{idParcela}', [ComponentesController::class, 'seleccionarParcela'])->name('seleccionarParcela');
Route::get('nuevoCultivo/{idParcela}', [ComponentesController::class, 'nuevoCultivo'])->name('nuevoCultivo');

Route::get('buscarCultivo',[ComponentesController::class,'buscarCultivo'])->name('buscarCultivo');
Route::post('seleccionarCultivo/{idCultivo}', [ComponentesController::class, 'seleccionarCultivo'])->name('seleccionarCultivo');

Route::get('nuevaTarea/{idCultivo}', [ComponentesController::class, 'nuevaTarea'])->name('nuevaTarea');
Route::get('nuevoRiego/{idCultivo}', [ComponentesController::class, 'nuevoRiego'])->name('nuevoRiego');
Route::get('nuevaCosecha/{idCultivo}', [ComponentesController::class, 'nuevaCosecha'])->name('nuevaCosecha');


/// SE4LECCION DOBLE

Route::get('buscarRecurso',[ComponentesController::class,'buscarRecurso'])->name('buscarRecurso');

Route::post('seleccionarRecurso/{idCultivo}/{idRecurso}', [ComponentesController::class, 'seleccionarRecurso'])->name('seleccionarRecurso');

Route::get('nuevaAsignacionRecurso/{idCultivo}/{idRecurso}', [ComponentesController::class, 'nuevaAsignacionRecurso'])->name('nuevaAsignacionRecurso');


/// SE4LECCION DOBLE

Route::get('buscarPlaga',[ComponentesController::class,'buscarPlaga'])->name('buscarPlaga');

Route::post('seleccionarPlaga/{idCultivo}/{idPlaga}', [ComponentesController::class, 'seleccionarPlaga'])->name('seleccionarPlaga');

Route::get('nuevoControlPlaga/{idCultivo}/{idPlaga}', [ComponentesController::class, 'nuevoControlPlaga'])->name('nuevoControlPlaga');

//eliminar

Route::delete('/eliminarParcela/{id}', [PeticionesController::class, 'eliminarParcela'])->name('eliminarParcela');

Route::delete('/eliminarCultivo/{id}', [PeticionesController::class, 'eliminarCultivo'])->name('eliminarCultivo');

Route::delete('/eliminarRecurso/{id}', [PeticionesController::class, 'eliminarRecurso'])->name('eliminarRecurso');

Route::delete('/eliminarRecursoAsignado/{id}', [PeticionesController::class, 'eliminarRecursoAsignado'])->name('eliminarRecursoAsignado');

Route::delete('/eliminarRiego/{id}', [PeticionesController::class, 'eliminarRiego'])->name('eliminarRiego');

Route::delete('/eliminarPlaga/{id}', [PeticionesController::class, 'eliminarPlaga'])->name('eliminarPlaga');

Route::delete('/eliminarRegistroPlaga/{id}', [PeticionesController::class, 'eliminarRegistroPlaga'])->name('eliminarRegistroPlaga');

Route::delete('/eliminarTarea/{id}', [PeticionesController::class, 'eliminarTarea'])->name('eliminarTarea');

Route::delete('/eliminarCosecha/{id}', [PeticionesController::class, 'eliminarCosecha'])->name('eliminarCosecha');



//pdf

Route::get('/cultivo/{id}/pdf', [ComponentesController::class, 'generarPDF']);