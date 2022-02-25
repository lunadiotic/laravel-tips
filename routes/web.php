<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

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
    // return Str::of('hey you')->append(' and everybody there');
    // return str('this is a title')->slug();
    return str()->slug('this is a title');
    // return view('welcome');
})->name('home');

Route::get('/url', function () {
    return to_route('home');
    // return redirect()->route('home');
});

// Route::get('/task', [TaskController::class, 'index']);
// Route::get('/task/{task}', [TaskController::class, 'show']);
// Route::post('/task', [TaskController::class, 'Store']);

Route::controller(TaskController::class)->group(function () {
    Route::get('/task', 'index');
    Route::get('/task/{task}', 'show');
    Route::post('/task', 'store');
});
