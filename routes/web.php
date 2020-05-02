<?php

use App\Models;
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

    return view('store.index');
});

Route::get('/admin', function () {

    return view('admin.categories.create');
})->name('admin');


Route::resource('/admin/category','Admin\AdminCategoryController')->names('admin.category');

Route::get('cancel/{rout}',function ($rout){
    return redirect()->route('admin.category.index')->with('cancelled','Operation cancelled'); ;
})->name('cancel');










Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
