<?php

use App\Http\Controllers\ArrangementController;
use App\Http\Controllers\DressController;
use App\Http\Controllers\FormFieldController;
use App\Http\Controllers\MeasurementController;
use App\Models\Arrangement;
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


Route::get('/dresses', [DressController::class, 'index'])->name('dresses.index');
Route::get('/dresses/{id}', [DressController::class, 'show'])->name('dresses.show');
Route::get('/dresses/{id}/edit', [DressController::class, 'updateView'])->name('dresses.showEdit');


Route::get('/arrangements', [ArrangementController::class, 'index'])->name('arrangements.index');
Route::post('/arrangements', [ArrangementController::class, 'store'])->name('arrangements.store');
Route::put('/arrangements', [ArrangementController::class, 'update'])->name('arrangements.update');
Route::get('/arrangements/create', [ArrangementController::class, 'new'])->name('arrangements.new');



Route::get('/arrangements/{id}/view', [ArrangementController::class, 'view'])->name('arrangements.view');
Route::get('/arrangements/{id}/edit', [ArrangementController::class, 'edit'])->name('arrangements.edit');

Route::post('/saveField', [FormFieldController::class, 'save'])->name('formfields.save');
Route::put('/saveField', [FormFieldController::class, 'update'])->name('formfields.update');


Route::post('/formfields/update-positions', [FormFieldController::class, 'updatePositions'])->name('formfields.updatePositions');
Route::get('/formfields/create/{arrangement}', [FormFieldController::class, 'new'])->name('formfields.new');
Route::get('/formfields/{id}', [FormFieldController::class, 'show'])->name('formfields.show');
Route::delete('/formfields/{id}', [FormFieldController::class, 'delete'])->name('formfields.delete');

Route::post('/formsubmissions', [ArrangementController::class, 'submit'])->name('arrangements.submit');









Route::get('/measurements', [MeasurementController::class, 'index'])->name('measurements.index');
Route::get('/measurements/{id}', [MeasurementController::class, 'show'])->name('measurements.show');
Route::get('/measurements/{id}/edit', [MeasurementController::class, 'updateView'])->name('measurements.showEdit');
