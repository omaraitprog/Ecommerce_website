<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
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
Route::get('/home', [PostController::class, 'home'])->name('home');

Route::get('/index/{user}', [PostController::class, 'index'])->name('index');


Route::post('/home/verify', [PostController::class, 'verify'])->name('verify');

Route::get('/home/create', [PostController::class, 'create'])->name('create');

Route::post('/home/create/store', [PostController::class, 'store'])->name('store');
Route::get('/index/{user}/buy/{product}', [PostController::class, 'buy'])->name('buy');
Route::get('/index/{user}/{product}/show', [PostController::class, 'show'])->name('show');