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
})->middleware(['auth'])->name('roles');;

require __DIR__.'/auth.php';