<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

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

Auth::routes();

// Category Routes
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('categories', [App\Http\Controllers\Admin\CategoryController::class, 'index'])->name('all.category');
Route::post('categories/store', [App\Http\Controllers\Admin\CategoryController::class, 'store'])->name('category.store');
Route::get('/category/edit/{id}',[App\Http\Controllers\Admin\CategoryController::class,'edit']);
Route::post('/update/{id}',[App\Http\Controllers\Admin\CategoryController::class,'update'])->name('category.update');
Route::get('/delete/{id}',[App\Http\Controllers\Admin\CategoryController::class,'delete'])->name('category.delete');
Route::get('/inactive/{id}',[App\Http\Controllers\Admin\CategoryController::class,'CategoryInactive'])->name('category.inactive');
Route::get('/active/{id}',[App\Http\Controllers\Admin\CategoryController::class,'CategoryActive'])->name('category.active');


// All SubCategory Routes

Route::get('subcategories', [App\Http\Controllers\Admin\SubCategoryController::class, 'index'])->name('all.subcategory');
Route::post('subcategories/store', [App\Http\Controllers\Admin\SubCategoryController::class, 'store'])->name('subcategory.store');
Route::get('/edit/{id}',[App\Http\Controllers\Admin\SubCategoryController::class,'edit'])->name('subcategory.edit');
Route::post('/update/{id}',[App\Http\Controllers\Admin\SubCategoryController::class,'update'])->name('subcategory.update');
Route::get('/delete/{id}',[App\Http\Controllers\Admin\SubCategoryController::class,'delete'])->name('subcategory.delete');
Route::get('/inactive/{id}',[App\Http\Controllers\Admin\SubCategoryController::class,'inactive'])->name('subcategory.inactive');
Route::get('/active/{id}',[App\Http\Controllers\Admin\SubCategoryController::class,'active'])->name('subcategory.active');


Route::namespace('Admin')->group(function () {
    // Route::get('categories', 'CategoryController@index')->name('all.category');
    // Route::post('categories/store', 'CategoryController@store');
    // Route::get('/edit/{id}', 'CategoryController@edit');
    // Route::post('/update/{id}', 'CategoryController@update');
    // Route::delete('/delete/{id}', 'CategoryController@destroy');
    // Route::get('/inactive/{id}', 'CategoryController@inactive');
	// Route::get('/active/{id}', 'CategoryController@active');


});


