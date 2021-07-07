<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
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

Route::get('/login', function () {
    return view('login');
});
Route::any('/login', 'UserController@login');
Route::any('/', 'ProductController@index');
Route::any('details/{id}', 'ProductController@details');
Route::any('search', 'ProductController@search');
Route::any('/cart/{pid}', 'ProductController@cart');
Route::any('/buynow/{proID}', 'ProductController@buynow');
Route::any('/logout', 'ProductController@logout');
Route::any('/deletecart/{id}', 'ProductController@deleteCart');
Route::any('/checkout/{piid}', 'ProductController@checkOut');
Route::any('/cartlist', 'ProductController@CartList');
Route::view('/admin_system', 'admin_system');
Route::any('/confirmcart','ProductController@confirmcart');
Route::any('/ordertrack', 'ProductController@orders');
Route::view('/success', 'success');
Route::any('/confirm', 'ProductController@confirm');
Route::any('/cancelorder/{orderId}', 'ProductController@cancelorder');
Route::any('/registration', 'UserController@registration');
Route::any('/register', 'UserController@register');


Route::any('/logo', 'adminController@headers');
Route::any('/allproductlist', 'adminController@productlist');
Route::any('/allorders', 'adminController@allorders');
Route::any('/copyright', 'adminController@copyright');
Route::any('/userlist', 'adminController@userlist');
Route::any('/delete-user/{du}', 'adminController@deleteUser');
Route::any('/addadmin', 'adminController@addadmin');
Route::any('/logoup', 'adminController@logoup');
Route::any('addnewproduct', 'adminController@addproduct');
Route::any('loadproduct', 'adminController@loadproduct');
Route::view('loadimage', 'loadimage');
Route::any('upimage', 'adminController@upimage');
Route::any('editproduct/{id}', 'adminController@editproduct');
Route::any('updateproduct/{id}', 'adminController@updateproduct');
Route::any('updateimage/{id}', 'adminController@updateimage');
Route::any('deletemultiple/{id}', 'adminController@deletemultiple');
Route::any('deletephoto/{id}', 'adminController@deletephoto');
Route::any('/category', 'adminController@category');
Route::any('/addcategory','adminController@addcategory');
Route::any('/slider','adminController@slider');
Route::any('/slidesave','adminController@slidesave');
Route::any('/adminlogin', 'adminController@adminlogin');
Route::any('/adminout','adminController@adminout');
Route::any('deleteproduct/{id}', 'adminController@deleteproduct');
Route::any('deleteslide/{id}', 'adminController@deleteslide');