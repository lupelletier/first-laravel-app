<?php

use App\Models\User;
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
    return view('welcome');
});


Route::get('login', function(){
   return 'login';
})->name('login');

//Route::get('users/create', [\App\Http\Controllers\UsersController::class, 'create'])->name('users.create');
//
//Route::put('users/store', [\App\Http\Controllers\UsersController::class, 'store'])->name('users.store');
//
//Route::get('users', [\App\Http\Controllers\UsersController::class, 'index'])->name('users.index');
//
//Route::delete('users/{user}', [\App\Http\Controllers\UsersController::class, 'destroy'])->name('users.destroy');
//
//Route::get('users/{user}', [\App\Http\Controllers\UsersController::class, 'show'])->name('users.show');
//
//Route::put('users/{user}', [\App\Http\Controllers\UsersController::class, 'update'])->name('users.update');
//
//Route::get('users/{user}/edit', [\App\Http\Controllers\UsersController::class, 'edit'])->name('users.edit');

Route::resource('users', \App\Http\Controllers\UsersController::class);



//Route::get('users/{user}/edit', [\App\Http\Controllers\UsersController::class, 'editUser'])->name('users.edit-user');
