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

Route::get('/', 'HomeController@welcome');
Route::get('advert/{id}', 'HomeController@getAdverts')->where([
    'id' => '[0-9]+'
]);
Route::post('advert/add', 'HomeController@addAdvert');

Route::match(['get', 'post'], 'admin/category/add', 'AdminController@addCategory');
Route::match(['get', 'post'], 'admin/category/edit/{id}', 'AdminController@editCategory')->where([
    'id' => '[0-9]+'
]);
Route::get('admin/category/delete/{id}', 'AdminController@deleteCategory')->where([
    'id' => '[0-9]+'
]);
Route::match(['get', 'post'], 'admin/advert/edit/{id}', 'AdminController@editAdvert')->where([
    'id' => '[0-9]+'
]);
Route::get('admin/advert/delete/{id}', 'AdminController@deleteAdvert')->where([
    'id' => '[0-9]+'
]);
Route::get('admin', 'AdminController@admin');
Route::get('admin/advert/all', 'AdminController@adverts');
