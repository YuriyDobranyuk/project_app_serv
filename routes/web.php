<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderSend;
use App\Http\Controllers\PostControler;

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
    return view('mainPage');
})->middleware(['auth'])->name('welcome');;

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/roles', function () {
    $currentUser = \Illuminate\Support\Facades\Auth::user();
//    $role = \App\Models\Role::where('slug', 'manager')->first();
//    return $role;
//    return $currentUser;

    $rolesJson = response()->json([
        'roles' => $currentUser->roles
    ]);
    return $rolesJson;
})->middleware(['auth'])->name('roles');

//Route::post('/', [OrderSend::class, 'store'])->name('OrderSend');
//Route::post('/post/store', [\App\Http\Controllers\PostController::class, 'store'])->name('post.store');

Route::resource('post', \App\Http\Controllers\PostController::class);

require __DIR__.'/auth.php';
