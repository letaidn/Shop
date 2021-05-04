<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\SizeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CommentController;



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
//login - admin
Route::get('admin/login',[UserController::class,'getLoginAdmin']);
Route::post('admin/login',[UserController::class,'postLoginAdmin']);
Route::get('admin/logout',[UserController::class,'logout']);

//login - register
Route::get('login',[PageController::class,'login']);

Route::post('login',[loginController::class,'login']);

Route::get('logout',[loginController::class,'logout']);

Route::get('register',[PageController::class,'register']);

Route::post('register',[LoginController::class,'register']);

// pages
Route::get('home',[PageController::class,'Home']);

Route::get('detail/{id}',[PageController::class,'detailPage']);

Route::get('list',[PageController::class,'listPage']);

Route::get('list/{id}',[PageController::class,'listPageByCateID']);

Route::post('listSearch',[PageController::class,'listPageBySearch']);

Route::get('contact',[PageController::class,'getContact']);

Route::group(['middleware' => 'login'],function(){
	Route::get('checkout',[CheckoutController::class,'checkout']);
	Route::post('postCheckout',[CheckoutController::class,'postCheckout']);
	Route::post('comment/{id}',[CommentController::class,'postComment']);
	Route::get('updateInfo/{id}',[PageController::class,'updateInfo']);
	Route::post('updateInfor',[UserController::class,'updateInfo']);
	Route::get('deleteOrder/{id}',[OrderController::class,'getDeleteByCustomer']);
});


//cart
Route::get('cart',[CartController::class,'showCart']);

Route::get('deleteCartLine/{id}',[CartController::class,'deleteCartLine']);

Route::get('deleteCart',[CartController::class,'deleteCart']);

Route::post('updateCartLine',[CartController::class,'updateCartLine']);

Route::post('saveCart',[CartController::class,'saveCart']);



Route::group(['prefix'=>'admin','middleware' => 'adminlogin'],function(){
	Route::group(['prefix'=>'Category'],function(){
		Route::get('list',[CategoryController::class,'getList']);

		Route::get('add',[CategoryController::class,'getAdd']);

		Route::get('update/{id}',[CategoryController::class,'getUpdate']);

		Route::get('delete/{id}',[CategoryController::class,'getDelete']);

		Route::post('add',[CategoryController::class,'postAdd']);

		Route::post('update/{id}',[CategoryController::class,'postUpdate']);
	});

	Route::group(['prefix'=>'Comment'],function(){
		Route::get('list',[CommentController::class,'getList']);

		Route::get('delete/{id}',[CommentController::class,'getDelete']);
	});

	Route::group(['prefix'=>'Order'],function(){
		Route::get('list',[OrderController::class,'getList']);

		Route::get('listOrderDetail/{id}',[OrderController::class,'getListOrderDetail']);

		Route::get('delete/{id}',[OrderController::class,'getDelete']);

		Route::get('changeStatus/{id}',[OrderController::class,'getChangeStatus']);
	});

	Route::group(['prefix'=>'Product'],function(){
		Route::get('list',[ProductController::class,'getList']);

		Route::get('add',[ProductController::class,'getAdd']);

		Route::get('update/{id}',[ProductController::class,'getUpdate']);

		Route::post('update/{id}',[ProductController::class,'postUpdate']);

		Route::get('delete/{id}',[ProductController::class,'getDelete']);

		Route::post('add',[ProductController::class,'postAdd']);

		//image
		Route::get('listImg/{id}',[ProductController::class,'getListImg']);

		Route::post('listImg/{id}',[ProductController::class,'postAddImg']);

		Route::get('deleteImg/{id}',[ProductController::class,'getDeleteImg']);


	});

	Route::group(['prefix'=>'User'],function(){
		Route::get('list',[UserController::class,'getList']);

		Route::get('add',[UserController::class,'getAdd']);

		Route::get('update/{id}',[UserController::class,'getUpdate']);

		Route::post('add',[UserController::class,'postAdd']);

		Route::get('delete/{id}',[UserController::class,'getDelete']);
	});

});
//Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

