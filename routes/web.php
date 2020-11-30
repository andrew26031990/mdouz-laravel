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
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::resource('timelineEvent', App\Http\Controllers\TimelineEventModelController::class);

Route::resource('user', App\Http\Controllers\UserModelController::class);

Route::resource('articleAttachmentModels', App\Http\Controllers\ArticleAttachmentController::class);

Route::resource('articleModels', App\Http\Controllers\ArticleModelController::class);

Route::resource('articleModels', App\Http\Controllers\ArticleModelController::class);

Route::resource('articleModels', App\Http\Controllers\ArticleModelController::class);

Route::resource('articleCategoryModels', App\Http\Controllers\ArticleCategoryModelController::class);

Route::resource('articleModels', App\Http\Controllers\ArticleModelController::class);

Route::resource('lang', App\Http\Controllers\LangModelController::class);

Route::resource('social', App\Http\Controllers\SocialModelController::class);

Route::resource('currency', App\Http\Controllers\CurrencyModelController::class);

Route::resource('city', App\Http\Controllers\CityModelController::class);

Route::resource('region', App\Http\Controllers\RegionController::class);

Route::resource('country', App\Http\Controllers\CountryModelController::class);

Route::get('getTemplateFields/{id}', [App\Http\Controllers\StaticPagesController::class,'getTemplateFields']);
Route::get('translit_url/{value}', [App\Http\Controllers\StaticPagesController::class,'translitUrl']);

Route::resource('staticPages', App\Http\Controllers\StaticPagesController::class);


Route::resource('articleCategories', App\Http\Controllers\ArticleCategoryController::class);

Route::resource('events', App\Http\Controllers\EventsController::class);

Route::resource('keyStorages', App\Http\Controllers\KeyStorageController::class);


Route::resource('articles', App\Http\Controllers\ArticleController::class);