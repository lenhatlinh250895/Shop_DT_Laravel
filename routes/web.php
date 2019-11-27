<?php

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
use App\ProductType;
use App\Product;
use App\GroupProduct;
route::get('thu',function(){
	$Product = Product::find(1);
	$GroupProduct = GroupProduct::all();
	echo $Product->Name;
	echo $Product->GroupProduct->Name;
});


route::get('admin/login','UsersController@getLoginAdmin');
route::post('admin/login','UsersController@postLoginAdmin');
route::get('admin/logout','UsersController@getLogoutAdmin');

route::group(['prefix'=>'admin','middleware' => 'adminlogin'],function(){
	route::group(['prefix'=>'trangchu'],function(){
		route::get('index','TrangChuController@gettrangchu');
	});

	route::group(['prefix'=>'ProductType'],function(){
		route::get('list','ProductTypeController@getlist');
		route::get('AddProductType','ProductTypeController@getadd');
		route::post('AddProductType','ProductTypeController@postadd');

		route::get('EditProductType/{Id}','ProductTypeController@getedit');
		route::post('EditProductType/{Id}','ProductTypeController@postedit');

		route::get('DeleteProductType/{Id}','ProductTypeController@getdelete');
	});

	route::group(['prefix'=>'GroupProduct'],function(){
		route::get('list','GroupProductController@getlist');
		route::get('AddGroupProduct','GroupProductController@getadd');
		route::post('AddGroupProduct','GroupProductController@postadd');

		route::get('EditGroupProduct/{Id}','GroupProductController@getedit');
		route::post('EditGroupProduct/{Id}','GroupProductController@postedit');

		route::get('DeleteGroupProduct/{Id}','GroupProductController@getdelete');
	});


	route::group(['prefix'=>'Product'],function(){
		route::get('list','ProductController@getAllPosts');
		route::get('AddProduct','ProductController@getadd');
		route::post('AddProduct','ProductController@postadd');

		route::get('EditProduct/{Id}','ProductController@getedit');
		route::post('EditProduct/{Id}','ProductController@postedit');

		route::get('DeleteProduct/{Id}','ProductController@getdelete');
	});

	route::group(['prefix'=>'users'],function(){
		route::get('list','UsersController@getlist');

		route::get('AddUser','UsersController@getAdd');
		route::post('AddUser','UsersController@postAdd');

		route::get('EditUser/{id}','UsersController@getEdit');
		route::post('EditUser/{id}','UsersController@postEdit');

		route::get('Delete/{id}','UsersController@getDelete');
	});

	route::group(['prefix'=>'ajax'],function(){
		route::get('GroupProduct/{ProductType_Id}','AjaxController@getGroupProduct');
	});
});

route::get('index','PagesController@Index');
route::get('shop/{id}','PagesController@Shop');

route::get('shopProduct/{id}','PagesController@shopProduct');

route::get('singleProduct/{id}','PagesController@singleProduct');

route::post('shopping/{id}','CartController@shopping');
route::get('shopping/{id}','CartController@shopping');
route::get('cart','CartController@cart')->name('cart');

route::post('delCart/{id}','CartController@delCart');
route::post('updCart','CartController@updCart');