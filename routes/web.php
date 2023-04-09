<?php

use Illuminate\Contracts\Cache\Store;
use Illuminate\Support\Facades\Route;
use App\Http\Models\Barang;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\ProdukController;

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
// Route::resource('/barang', ProdukController::class);
Route::resource('/barang', \App\Http\Controllers\ProdukController::class);
// Route::delete('/barang', ProdukController::class);
// Route::get('/home', function () {
//     return view('home');
// });

// Route::get('{parh}', 'BarangController@index')->where('path', '([A-z\d-\/_.]+)?');
// Route::fallback(function () {
//     return view('barang');
// });
