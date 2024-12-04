<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\HabitacionController;
use App\Http\Controllers\DataController;
 
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
    
// })->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/dashboard', [HomeController::class, 'Home'])->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


//SECCION REGISTRAR VISITA
Route::get('/registrar-visita', [RegisterController::class, 'index'])->middleware(['auth', 'verified'])->name('index_registro');
Route::post('/registrar-visita', [RegisterController::class, 'registrar'])->middleware(['auth', 'verified'])->name('visita_registrar');

Route::get('/cerrar-visita/{id}', [RegisterController::class, 'index_close'])->middleware(['auth', 'verified'])->name('index_cerrar');
Route::put('/cerrar-visita/{id}', [RegisterController::class, 'dataUpdate'])->middleware(['auth', 'verified'])->name('index_actualizar');

//SECCION CREACION DE HABITACION
Route::get('/añadir-habitacion', [HabitacionController::class, 'index'])->middleware(['auth', 'verified'])->name('index_habitacion');
Route::Post('/añadir-habitacion', [HabitacionController::class, 'registrar'])->middleware(['auth', 'verified'])->name('registrar_habitacion');

Route::get('/añadir-habitacion/crud', [HabitacionController::class, 'indexAll'])->middleware(['auth', 'verified'])->name('index_all');
Route::delete('/añadir-habitacion/crud/{id}', [HabitacionController::class, 'delete'])->middleware(['auth', 'verified'])->name('eliminar_habitacion');

//SECCION CRUD DE INFORMACION 
Route::get('/informacion', [DataController::class, 'index'])->middleware(['auth', 'verified'])->name('index_informacion');
Route::post('/informacion', [DataController::class, 'filtrar'])->middleware(['auth', 'verified'])->name('filter_data');
Route::delete('/informacion/{id}', [DataController::class, 'delete'])->middleware(['auth', 'verified'])->name('eliminar_registro');


require __DIR__.'/auth.php';
