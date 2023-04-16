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

use App\support\storage\Contracts\StorageInterface;

Route::get('/','HomeController@index')->name('dashboard');

Route::group(['prefix' => 'auth', 'namespace' => 'Auth'], function () {
    Route::get('login', 'LoginController@showLoginForm')->name('auth.login.form');
    Route::post('login', 'LoginController@login')->name('auth.login');
    Route::get('logout', 'LoginController@logout')->name('auth.logout');
    Route::get('login/code', 'LoginController@showCodeForm')->name('auth.login.code.form');
    Route::post('login/code', 'LoginController@confirmCode')->name('auth.login.code');
    Route::get('two-factor/resent', 'TwoFactorController@resent')->name('auth.two.factor.resent');
});


Route::group(['prefix' => 'admin' , 'middleware' => 'admin'],function (){

    Route::get('/dashboard','UserController@showDashboard')->name('admin.show.dashboard');

    Route::get('/usercreate','UserController@create')->name('admin.users.create');
    Route::post('/usercreate','UserController@store')->name('admin.users.store');
    Route::get('/users','UserController@show')->name('admin.users.show');
    Route::get('/users/{user}/edit','UserController@edit')->name('admin.users.edit');
    Route::post('/users/{user}/edit','UserController@update')->name('admin.users.update');
    Route::get('/users/wallet','UserController@wallet')->name('admin.users.wallet');
    Route::post('/users/wallet','UserController@wallet')->name('admin.users.type');
    Route::post('/users/charge','UserController@charger')->name('admin.users.charger');


    Route::get('/locationcreate','LocationController@create')->name('admin.location.create');
    Route::get('/getLocation','LocationController@getLocation')->name('admin.location.create');
    Route::post('/locationcreate','LocationController@store')->name('admin.location.store');


    Route::get('/maelcreate','mealController@create')->name('admin.meal.create');
    Route::post('/maelcreate','mealController@store')->name('admin.meal.store');

    Route::get('/foodcreate','FoodController@create')->name('admin.food.create');
    Route::post('/foodcreate','FoodController@store')->name('admin.food.store');

    Route::get('/menucreate','MenuController@create')->name('admin.menu.create');
    Route::post('/menucreate','MenuController@store')->name('admin.menu.store');
});

Route::get('getbasket','BasketController@getBasket');
Route::get('basket', 'BasketController@index')->name('basket');
Route::post('addBasket', 'BasketController@add')->name('basket.add');
Route::post('deleteBasket','BasketController@delete')->name('basket.delete');
Route::get('checkout','BasketController@checkoutForm')->name('basket.checkout.form');
Route::post('checkout','BasketController@checkout')->name('basket.checkout');
Route::post('orderSubmit','BasketController@orderRegist')->name('order.submit');
Route::post('payment/{gateway}/callback','PaymentController@verify')->name('payment.verify');


Route::get('/getMenu','HomeController@getMenu')->name('getMenu');
Route::get('/orderShow','HomeController@index')->name('order.show');
Route::get('/itemsReserved','HomeController@getItemResrved')->name('order.items');
Route::get('/orderEdit','HomeController@edit')->name('order.edit.form');
Route::post('/order/edit','HomeController@update')->name('order.edit.loc');
Route::post('/order/delete', 'HomeController@destroy')->name('order.delete');



Route::get('basket/clear',function (){
    resolve(StorageInterface::class)->clear();
});

Route::get('timer',function (){
  return view('timer');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
