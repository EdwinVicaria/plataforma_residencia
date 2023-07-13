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
    return view('welcome');
});


Route::resource('permissions', App\Http\Controllers\PermissionController::class);
Route::resource('roles', App\Http\Controllers\RoleController::class);
Route::resource('convocatorias',App\Http\controllers\ConvocatoriaController::class);
Route::resource('proyectos',App\Http\controllers\ProyectoController::class);

Route::get('/users/create', [App\Http\Controllers\UserController::class, 'create'])->name('users.create');
Route::post('/users', [App\Http\Controllers\UserController::class, 'store'])->name('users.store');
Route::get('/users', [App\Http\Controllers\UserController::class, 'index'])->name('users.index');
Route::get('/users/{user}', [App\Http\Controllers\UserController::class, 'show'])->name('users.show');
Route::get('/users/{user}/edit', [App\Http\Controllers\UserController::class, 'edit'])->name('users.edit');
Route::put('/users/{user}', [App\Http\Controllers\UserController::class, 'update'])->name('users.update');
Route::delete('/users/{user}', [App\Http\Controllers\UserController::class, 'destroy'])->name('users.delete');

Route::get('change_status/proyectos/{proyecto}',[App\Http\Controllers\ProyectoController::class, 'change_status'])->name('change.status.proyect');

Route::get('/proyecto/{id}', [App\Http\Controllers\ProyectoController::class, 'proyectosConv'])->name('proyectosConv');
Route::get('/pdf-proyecto/{id}', [App\Http\Controllers\ProyectoController::class, 'pdfProyecto'])->name('pdfProyecto');
Route::get('/adas/{idConv}', [App\Http\Controllers\ProyectoController::class, 'create2'])->name('proyectos.create2');
Route::get('/convocatoria/{id}',[App\Http\Controllers\ProyectoController::class, 'ins'])->name('ins');



/*rutas propias para el usuario de sus proyectos */







Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



require __DIR__.'/auth.php';
