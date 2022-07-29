<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\MenuController;

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

Route::get('categories', [CategoryController::class, 'index'])->name('all.category');
Route::post('categories/store', [CategoryController::class, 'store'])->name('category.store');
Route::get('/category/edit/{id}',[CategoryController::class,'edit']);
Route::post('/category/update/{id}',[CategoryController::class,'update']);
Route::get('/category/delete/{id}',[CategoryController::class,'delete']);
Route::get('/category/inactive/{id}',[CategoryController::class,'CategoryInactive']);
Route::get('/category/active/{id}',[CategoryController::class,'CategoryActive']);
// All SubCategory Routes

Route::get('subcategories', [SubCategoryController::class, 'index'])->name('all.subcategory');
Route::post('subcategories/store', [SubCategoryController::class, 'store'])->name('subcategory.store');
Route::get('/edit/{id}',[SubCategoryController::class,'edit'])->name('subcategory.edit');
Route::post('/update/{id}',[SubCategoryController::class,'update'])->name('subcategory.update');
Route::get('/delete/{id}',[SubCategoryController::class,'delete'])->name('subcategory.delete');
Route::get('/inactive/{id}',[SubCategoryController::class,'inactive'])->name('subcategory.inactive');
Route::get('/active/{id}',[SubCategoryController::class,'active'])->name('subcategory.active');

// All Author Routes
Route::resource('authors', App\Http\Controllers\Admin\AuthorController::class);


Route::namespace('Admin')->group(function () {
    Route::get('categories', [CategoryController::class, 'index'])->name('all.category');
    // Route::post('categories/store', 'CategoryController@store');
    // Route::get('/edit/{id}', 'CategoryController@edit');
    // Route::post('/update/{id}', 'CategoryController@update');
    // Route::delete('/delete/{id}', 'CategoryController@destroy');
    // Route::get('/inactive/{id}', 'CategoryController@inactive');
	// Route::get('/active/{id}', 'CategoryController@active');


});


//Menu Controller
Route::get('manage-menus/{id?}',[MenuController::class,'index']);


