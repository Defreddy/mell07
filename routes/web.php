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

Auth::routes();

Route::get('/tasks', [App\Http\Controllers\TaskController::class, 'index'])->name('tasks');
Route::post('/tasks', [App\Http\Controllers\TaskController::class, 'create'])->name('create_task');
Route::get('/tasks/{id}/move', [App\Http\Controllers\TaskController::class, 'move_task'])->name('move_task');
Route::get('/tasks/{id}/delete', [App\Http\Controllers\TaskController::class, 'delete_task'])->name('delete_task');