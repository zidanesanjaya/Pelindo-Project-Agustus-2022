<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\Ship;
use Illuminate\Support\Facades\DB;

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
    $ship =DB::table('Ship')->paginate(5);
    return view('index',['ship'=>$ship]);
});

//kedatangan
Route::get('/kd', function () {
    $ship =DB::table('Ship')->paginate(5);
    return view('kedatangan',['ship'=>$ship]);
});

//keberangkatan
Route::get('/kb', function () {
    $ship =DB::table('Ship')->paginate(5);
    return view('keberangkatan',['ship'=>$ship]);
});

Auth::routes();

// Route::get('/', [App\Http\Controllers\HomeController::class, 'landing']);
Route::get('/create_page', [App\Http\Controllers\HomeController::class, 'create_page'])->name('create_page');
Route::get('/edit/{id}', [App\Http\Controllers\HomeController::class, 'edit_page'])->name('edit');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('/index', [App\Http\Controllers\ShipController::class, 'index'])->name('home');

Route::post('/store', [App\Http\Controllers\HomeController::class, 'store'])->name('store');
Route::post('/update/{id}', [App\Http\Controllers\HomeController::class, 'update'])->name('update');
Route::get('/delete/{id}', [App\Http\Controllers\HomeController::class, 'delete'])->name('delete');



