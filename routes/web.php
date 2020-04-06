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

Route::get('/admin', 'AdminController@index')->name('admins.index');


Route::get('/home', 'HomeController@index')->name('home');



Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function(){

    Route::resource('/users', 'UserController');

});
////////////////////////////////

Route::get('/doctors', 'DoctorController@index')->name('doctors.index');
///////////////////////////////
Route::get('/doctors/create', 'DoctorController@create')->name('doctors.create');
Route::post('/doctors', 'DoctorController@store')->name('doctors.store');
//////////////////////////////


Route::get('/doctors/{doctor}/edit', 'DoctorController@edit')->name('doctors.edit');
    
Route::put('/doctors/{doctor}', 'DoctorController@update')->name('doctors.update');



/////////////////////////////
Route::delete('/doctors/{doctor}', 'DoctorController@destroy')->name('doctors.destroy');
////////////////////////////

Route::get('/doctors/{doctor}', 'DoctorController@show')->name('doctors.show');


Route::get('/pharmacy', 'PharmacyController@index')->name('pharmacy.index');
