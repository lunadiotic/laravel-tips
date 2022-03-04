<?php

use App\Enums\TaskState;
use App\Http\Controllers\TaskController;
use App\Models\Task;
use App\Models\User;
use Illuminate\Support\Facades\Blade;
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
    // dd(Task::first()->state);
    // $task = new Task();
    // $task->user_id = '1';
    // $task->title = 'Learn Laravel 1';
    // $task->detail = 'Learn Laravel 1';
    // $task->state = TaskState::Upcoming;
    // $task->save();
    // return 'done';

    $task = Task::first();
    if ($task->state === TaskState::Draft) {
        return 'it is a draft';
    }

    return Task::search('Consequatur')->get();
    // throw new \Exception('Whoops');
    // return Str::of('hey you')->append(' and everybody there');
    // return str('this is a title')->slug();
    // return str()->slug('this is a title');
    return Blade::render('{{ $greeting }}, World', ['greeting' => 'Hi']);
    return view('welcome');
})->name('home');

Route::get('/tasks/{state}', function (TaskState $state) {
    dd($state);
});

Route::get('/url', function () {
    return to_route('home');
    // return redirect()->route('home');
});

// Route::get('/task', [TaskController::class, 'index']);
// Route::get('/task/{task}', [TaskController::class, 'show']);
// Route::post('/task', [TaskController::class, 'Store']);

Route::controller(TaskController::class)->group(function () {
    Route::get('/task', 'index');
    Route::get('/task/{task}', 'show')->name('task.show');
    Route::post('/task', 'store');
});

Route::get('/users/{user}/tasks/{task}', function (User $user, Task $task) {
    return $task;
})->scopeBindings();
