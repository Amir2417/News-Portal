<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\GeneralSettingsController;
use App\Http\Controllers\Admin\FooterSettingsController;
use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\GeneralMenuController;
use App\Http\Controllers\Admin\FooterMenuController;
use App\Http\Controllers\Admin\CkeditorController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;



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

    return view('frontend.welcome');
});

Route::get('/logout', [App\Http\Controllers\HomeController::class, 'logout'])->name('admin.logout');
Auth::routes();
Route::get('category/article/{id}', [App\Http\Controllers\HomeController::class, 'CatProduct']);
Route::get('/article/details/{id}', [App\Http\Controllers\HomeController::class, 'ArticleDetails']);
Route::get('/address', [App\Http\Controllers\HomeController::class, 'address']);

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
Route::get('subcategory/edit/{id}',[SubCategoryController::class,'edit']);
Route::post('/update/{id}',[SubCategoryController::class,'update'])->name('subcategory.update');
Route::get('subcategory/delete/{id}',[SubCategoryController::class,'delete']);
Route::get('subcategory/inactive/{id}',[SubCategoryController::class,'inactive']);
Route::get('subcategory/active/{id}',[SubCategoryController::class,'active']);

;


//General Settings
Route::get('general/settings/', [GeneralSettingsController::class, 'index'])->name('general.settings');
Route::post('general/settings/store/', [GeneralSettingsController::class, 'store'])->name('general.settings.store');
Route::post('general/settings/update/{id}', [GeneralSettingsController::class, 'update'])->name('general.settings.update');
Route::get('general/settings/edit/{id}', [GeneralSettingsController::class, 'edit']);
Route::get('general/settings/delete/{id}', [GeneralSettingsController::class, 'delete']);


//Footer Settings

Route::get('footer/settings/', [FooterSettingsController::class, 'index'])->name('footer.settings.view');
Route::get('footer/settings/create/', [FooterSettingsController::class, 'create'])->name('footer.settings.create');
Route::post('footer/settings/store', [FooterSettingsController::class, 'store'])->name('footer.settings.store');
Route::post('footer/settings/update/{id}', [FooterSettingsController::class, 'update'])->name('footer.settings.update');
Route::get('/edit/{id}', [FooterSettingsController::class, 'edit']);
Route::get('/delete/{id}', [FooterSettingsController::class, 'delete']);

//Article Routes

Route::get('articles/', [ArticleController::class, 'index'])->name('articles.index');
Route::get('articles/create', [ArticleController::class, 'create'])->name('articles.create');
Route::post('articles/store', [ArticleController::class, 'store'])->name('articles.store');
Route::get('articles/edit/{id}', [ArticleController::class, 'edit']);
Route::get('articles/view/{id}', [ArticleController::class, 'view']);
Route::post('articles/update/{id}', [ArticleController::class, 'update'])->name('articles.update');
Route::get('articles/delete/{id}', [ArticleController::class, 'delete']);
Route::get('/article/inactive/{id}',[ArticleController::class,'inactive'])->name('inactive');
Route::get('/article/active/{id}',[ArticleController::class,'active']);
Route::get('article/reject/{id}',[ArticleController::class,'reject']);
Route::get('show', [ArticleController::class, 'show'])->name('specific.articles.index');


Route::post('/ckeditor/upload/image',[ArticleController::class, 'upload'])->name('ckeditor.upload.image');


//General Menu
Route::get('general/menu/', [GeneralMenuController::class, 'index'])->name('general.menu.list');
Route::get('general/menu/show/', [GeneralMenuController::class, 'show'])->name('general.menu.show');
Route::post('general/menu/store/', [GeneralMenuController::class, 'store'])->name('general.menu.store');
Route::get('general_menu/edit/{id}', [GeneralMenuController::class, 'edit']);
Route::post('general/menu/update/{id}', [GeneralMenuController::class, 'update']);
Route::get('general_menu/delete/{id}', [GeneralMenuController::class, 'destroy']);
Route::get('general_menu/inactive/{id}', [GeneralMenuController::class, 'inactive']);
Route::get('general_menu/active/{id}', [GeneralMenuController::class, 'active']);

//Footer Menu
Route::get('footer_menu', [FooterMenuController::class, 'index'])->name('footer.menu.view');
Route::get('footer_menu/show/', [FooterMenuController::class, 'show'])->name('footer.menu.show');
Route::post('footer_menu/store/', [FooterMenuController::class, 'store']);
Route::get('footer_menu/edit/{id}', [FooterMenuController::class, 'edit']);
Route::post('footer_menu/update/{id}', [FooterMenuController::class, 'update']);
Route::get('footer_menu/delete/{id}', [FooterMenuController::class, 'destroy']);
Route::get('footer_menu/inactive/{id}', [FooterMenuController::class, 'inactive']);
Route::get('footer_menu/active/{id}', [FooterMenuController::class, 'active']);

Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('products', ProductController::class);
});

// ckeditor
// Route::get('ckeditor', [CkeditorController::class, 'index']);
// Route::post('ckeditor/upload',[CkeditorController::class, 'upload'])->name('ckeditor.upload');


