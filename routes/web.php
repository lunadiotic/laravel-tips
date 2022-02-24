<?php

use App\Http\Controllers\TaskController;
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

// Route::get('/task', [TaskController::class, 'index']);
// Route::get('/task/{task}', [TaskController::class, 'show']);
// Route::post('/task', [TaskController::class, 'Store']);


Route::controller(TaskController::class)->group(function () {
    Route::get('/task', 'index');
    Route::get('/task/{task}', 'show');
    Route::post('/task', 'store');
});
