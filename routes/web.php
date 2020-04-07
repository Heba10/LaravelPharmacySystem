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

Route::get('/admin', 'AdminController@index')->name('admins.index');
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

//----------------------------------------------------------------------------
Route::get('/pharmacy', 'PharmacyController@index')->name('pharmacy.index');
Route::get('/pharmacy/create','PharmacyController@create')->name('pharmacy.create');
Route::post('/pharmacy','PharmacyController@store')->name('pharmacy.store');
Route::get('/pharmacy/{pharmacy}','PharmacyController@show')->name('pharmacy.show');
Route::GET('/pharmacy/{pharmacy}/edit','PharmacyController@edit')->name('pharmacy.edit');
Route::post('/pharmacy/{pharmacy}/','PharmacyController@update')->name('pharmacy.update');
Route::get('/pharmacy/{pharmacy}/delete','PharmacyController@destroy')->name('pharmacy.destory');