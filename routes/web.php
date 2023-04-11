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
    return view('layouts.dashboard');
});
//categories
use App\Http\Controllers\CategoryController;
// Route::get('/categories',[CategoryController::class,'index'])->name('categories');
// Route::get('/categories/create',[CategoryController::class,'create'])->name('categories.create');
// Route::post('/categories/store',[CategoryController::class,'store'])->name('categories.store');
// Route::get('/categories/show/{category}',[CategoryController::class,'show'])->name('categories.show');
// Route::get('/categories/edit/{category}',[CategoryController::class,'edit'])->name('categories.edit');
// Route::put('/categories/update/{category}',[CategoryController::class,'update'])->name('categories.update');
// Route::delete('/categories/destroy/{category}',[CategoryController::class,'destroy'])->name('categories.destroy');

Route::resource('categories', CategoryController::class);


