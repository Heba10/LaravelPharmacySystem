<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
//-----------------------this Route for verification
Auth::routes(['verify' => true]);
//-------------------------------------------those Routes to register and get token and then to login 
Route::post('register', 'UserController@register')->middleware('verified');
Route::post('login', 'UserController@login');
// Route::PUT('/users/{user}','UserController@update')->name('users.update');

//---------------------------this Route to show el user address
Route::group(['middleware' => ['CheckClientCredentials','auth:api']], function() {
Route::get('/addresses/{address}','Api\AddressController@show');
//---------------------------this Route to delete address
Route::delete('/addresses/{address}','Api\AddressController@destroy');
//---------------------------this Route to update address info
Route::put('/addresses/{address}','Api\AddressController@update');
//---------------------------this Route to add new address
Route::post('/addresses','Api\AddressController@store');
//---------------------------this Route to update el user info
Route::put('/users/{user}','Api\UserController@update')->middleware('verified');
//-------------------------this Route to view all orders of certain user
Route::get('/users/{user}/orders','Api\UserController@index');
//--------------------------this Route to view certain order details
Route::get('users/{user}/orders/{order}','Api\UserController@show');
//------------------------this Route to add new order 
Route::post('users/{user}/orders','Api\OrderController@store');
//-----------------------------this Route to edit order details
Route::put('users/{user}/orders/{order}','Api\OrderController@update');

});