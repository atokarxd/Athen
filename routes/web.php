<?php

use App\Http\Controllers\CostumerController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\WorkerController;
use Illuminate\Support\Facades\Route;

//Route::get('/costumer', [CostumerController::class, 'create']);
Route::resource('costumer', CostumerController::class);
Route::post('/costumer/store', [CostumerController::class, 'store'])->name('costumer.store');
Route::get('/costumer/{costumer}/edit', [CostumerController::class, 'edit'])->name('costumer.edit');
Route::put('/costumer/{costumer}/update', [CostumerController::class, 'update'])->name('costumers.update');
Route::delete('/costumer/{costumer}/destroy', [CostumerController::class, 'destroy'])->name('costumer.destroy');


Route::resource('worker', WorkerController::class);
Route::post('/worker/store', [WorkerController::class, 'store'])->name('worker.store');
Route::get('/worker/{worker}/edit', [WorkerController::class, 'edit'])->name('worker.edit');
Route::put('/worker/{worker}/update', [WorkerController::class, 'update'])->name('workers.update');
Route::delete('/worker/{worker}/destroy', [WorkerController::class, 'destroy'])->name('worker.destroy');

Route::resource('/', TaskController::class);
Route::post('/store', [TaskController::class, 'store'])->name('task.store');
Route::get('/{task}/edit', [TaskController::class, 'edit'])->name('task.edit');
Route::put('/{task}/update', [TaskController::class, 'update'])->name('tasks.update');
Route::delete('/{task}/destroy', [TaskController::class, 'destroy'])->name('task.destroy');