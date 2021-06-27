<?php

use Faker\Guesser\Name;

namespace App\Http\Controllers;
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
// Route::get('categories/{$category}/{$sub_category}/{$sub_category2}', 'CategoryController@products');
Route::get('categories/{categories}', 'ProductController@getProducts')
    ->where('categories','^[a-zA-Z0-9-_\/]+$');
Route::resource('categories', 'CategoryController');
Route::resource('products', 'ProductController');
Route::resource('shop', 'ShopController');


