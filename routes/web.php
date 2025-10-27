<?php

/*las referencia de la pagina cada uno con sus controladores*/
use App\Http\Controllers\ControllersP\PostulanteController;
use App\Http\Controllers\ControllersP\EducacionController;
use App\Http\Controllers\ControllersP\ExperienciaController;
use App\Http\Controllers\ControllersP\CapacitacionController;
use App\Http\Controllers\ControllersP\ExpTecnicaController;
use App\Http\Controllers\ControllersP\AdjuntarDocumentosController; 
/*aqui termina las referencia de la pagina cada uno con sus controladores*/
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\PostulantesController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::prefix('admin')->name('admin.')->group(function () {
//     Route::resource('postulantes', PostulantesController::class);


Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('postulantes', App\Http\Controllers\admin\PostulantesController::class);
});


/* todas las rutas de la pagina*/
// Ruta principal que muestra tu formulario
Route::get('/', [PostulanteController::class, 'mostrarFormulario'])->name('inicio');

// Ruta para procesar el formulario
Route::post('/postulante/guardar', [PostulanteController::class, 'guardarPostulante'])->name('postulante.guardar');
// Si quieres mantener la ruta alternativa también
Route::get('/postulante/formulario', [PostulanteController::class, 'mostrarFormulario'])->name('postulante.formulario');


// Rutas para educación
Route::get('/educacion/formulario', [EducacionController::class, 'mostrarFormulario'])->name('educacion.formulario');
Route::post('/educacion/guardar', [EducacionController::class, 'guardarMultiples'])->name('educacion.guardar');

// Rutas para experiencia
Route::get('/experiencia/formulario', [ExperienciaController::class, 'mostrarFormulario'])->name('experiencia.formulario');
Route::post('/experiencia/guardar', [ExperienciaController::class, 'guardarTodo'])->name('experiencia.guardar');

// RUTAS NUEVAS PARA CAPACITACIÓN 
Route::get('/capacitacion/formulario', [CapacitacionController::class, 'mostrarFormulario'])->name('capacitacion.formulario');
Route::post('/capacitacion/guardar', [CapacitacionController::class, 'guardarMultiplesCapacitaciones'])->name('capacitacion.guardar');

// RUTAS NUEVAS PARA EXPERIENCIA TÉCNICA <-- AÑADIR ESTAS
Route::get('/exptecnica/formulario', [ExpTecnicaController::class, 'mostrarFormulario'])->name('exptecnica.formulario');
Route::post('/exptecnica/guardar', [ExpTecnicaController::class, 'guardarExperiencia'])->name('exptecnica.guardar');

// RUTAS NUEVAS PARA ADJUNTAR DOCUMENTOS 
Route::get('/adjuntardocumentos/formulario', [AdjuntarDocumentosController::class, 'mostrarFormulario'])->name('adjuntardocumentos.formulario');
Route::post('/adjuntardocumentos/cerrarsesion', [AdjuntarDocumentosController::class, 'cerrarSesion'])->name('adjuntardocumentos.cerrarsesion');
Route::get('/adjuntardocumentos/verificar-sesion', [AdjuntarDocumentosController::class, 'verificarSesion'])->name('adjuntardocumentos.verificarsesion');
/* aqui termina las rutas de la pagina*/
