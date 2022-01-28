<?php

use Illuminate\Support\Facades\Route;
use App\Models\News;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AuthorController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CommentsController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\Subscribers;
use App\Http\Controllers\Website\HomeeController;
use App\Http\Controllers\Website\SubsController;

use Fideloper\Proxy\TrustProxies;




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

// Website routes


Route::get('/',[App\Http\Controllers\Website\HomeeController::class,'getHome'])->name('getHome');

Route::get('/news/{slug}',[App\Http\Controllers\Website\HomeeController::class,'getSingleNews'])->name('getSingleNews');
Route::get('/category/{category}',[App\Http\Controllers\Website\HomeeController::class,'getCategory'])->name('getCategory');
Route::get('/author/{author}',[App\Http\Controllers\Website\HomeeController::class,'getAuthor'])->name('getAuthor');
Route::get('/searched',[App\Http\Controllers\Website\HomeeController::class,'postSearch'])->name('postSearch');
Route::post('add-comment',[App\Http\Controllers\Website\HomeeController::class,'addComment'])->name('addComment');
Route::get('/contact',[App\Http\Controllers\Website\HomeeController::class,'getContact'])->name('getContact');
Route::get('/subscriber',[App\Http\Controllers\Website\HomeeController::class,'getSubs'])->name('getSubs');
// Admin routes

Auth::routes();



Route::prefix('/cms')->middleware('auth')->group(function(){

    // news

    Route::get('/',[App\Http\Controllers\Admin\HomeController::class,'getAdminHome'])->name('getAdminHome');
    Route::get('/add-news',[App\Http\Controllers\Admin\HomeController::class,'addNews'])->name('addNews');
    Route::post('/add-news-post',[App\Http\Controllers\Admin\HomeController::class,'addNewsPost'])->name('addNewsPost'); 
    Route::get('/delete-news/{id}',[App\Http\Controllers\Admin\HomeController::class,'deleteNews'])->name('deleteNews');
    Route::get('/edit-news/{id}',[App\Http\Controllers\Admin\HomeController::class,'editNews'])->name('editNews');
    Route::post('/edit-news-post/{id}',[App\Http\Controllers\Admin\HomeController::class,'editNewsPost'])->name('editNewsPost');
   
    



    // author
    Route::prefix('/author')->group(function(){
        Route::get('/',[App\Http\Controllers\Admin\AuthorController::class,'getAdminAuthor'])->name('getAdminAuthor');
        Route::get('/add-author',[App\Http\Controllers\Admin\AuthorController::class,'addAuthor'])->name('addAuthor');
        Route::post('/add-author-post',[App\Http\Controllers\Admin\AuthorController::class,'addAuthorPost'])->name('addAuthorPost');
        Route::get('/delete-author/{id}',[App\Http\Controllers\Admin\AuthorController::class,'deleteAuthor'])->name('deleteAuthor');
        Route::get('/edit-author/{id}',[App\Http\Controllers\Admin\AuthorController::class,'editAuthor'])->name('editAuthor');
        Route::post('/edit-author-post/{id}',[App\Http\Controllers\Admin\AuthorController::class,'editAuthorPost'])->name('editAuthorPost');

    });

    // category
    Route::prefix('/category')->group(function(){
        Route::get('/',[App\Http\Controllers\Admin\CategoryController::class,'getAdminCategory'])->name('getAdminCategory');
        Route::get('/add-category',[App\Http\Controllers\Admin\CategoryController::class,'addCategory'])->name('addCategory');
        Route::post('/add-category-post',[App\Http\Controllers\Admin\CategoryController::class,'addCategoryPost'])->name('addCategoryPost');
        Route::get('/delete-category/{id}',[App\Http\Controllers\Admin\CategoryController::class,'deleteCategory'])->name('deleteCategory');
        Route::get('/edit-category/{id}',[App\Http\Controllers\Admin\CategoryController::class,'editCategory'])->name('editCategory');
        Route::post('edit-category-post/{id}',[App\Http\Controllers\Admin\CategoryController::class,'editCategoryPost'])->name('editCategoryPost');


    });


    // Admin

    Route::get('/user-admin',[App\Http\Controllers\Admin\AdminController::class,'getAdmin'])->name('getAdmin');

    // setting

    Route::prefix('/setting')->group(function(){
        Route::get('/',[App\Http\Controllers\Admin\SettingController::class,'getAdminSetting'])->name('getAdminSetting');
        Route::get('/edit-settings',[App\Http\Controllers\Admin\SettingController::class,'editSettings'])->name('editSettings');
        Route::post('/edit-settings-post',[App\Http\Controllers\Admin\SettingController::class,'editSettingsPost'])->name('editSettingsPost');

    });
    // subscribers

    Route::prefix('/sub')->group(function(){
        Route::get('/',[App\Http\Controllers\Admin\Subscribers::class,'getAdminSubs'])->name('getAdminSubs');
        Route::get('/delete-sbus/{id}',[App\Http\Controllers\Admin\Subscribers::class,'deleteSubs'])->name('deleteSubs');

    });

    // comments

    Route::prefix('/comment')->group(function(){
        Route::get('/',[App\Http\Controllers\Admin\CommentsController::class,'getComments'])->name('getComments');
        Route::get('/delete-comment/{id}',[App\Http\Controllers\Admin\CommentsController::class,'deleteComment'])->name('deleteComment');
    });
   

  


});


// Created Knyaz :)
