<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AlbumController;
;

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

// Route::get('/', function () {
//     return view('welcome');
// })->name('home');

Route::get('/', [AlbumController::class, 'index'])->name('home');
Route::get('/create_ablum', [AlbumController::class, 'create_ablum'])->name('album.create');
Route::post('/add_ablum', [AlbumController::class, 'add_ablum'])->name('album.add');
Route::put('/edit_ablum', [AlbumController::class, 'edit_ablum'])->name('album.edit');

